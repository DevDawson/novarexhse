<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\Post;
use App\Services\SeoService;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->first();

        AnalyticsEvent::track('/blog/' . $slug, $post?->title ?? '');

        $settings = SettingsService::all();

        if ($post) {
            $seoTitle  = SeoService::title($post->title, $settings, false);
            $seoDesc   = $post->excerpt ?: Str::limit(strip_tags((string) $post->content), 155);
            $canonical = SeoService::canonical('blog/' . $post->slug);
            $ogImage   = !empty($post->featured_image) ? asset('storage/' . $post->featured_image) : asset('assets/logo.png');

            $seo = [
                'title'       => $seoTitle,
                'description' => $seoDesc,
                'canonical'   => $canonical,
                'metaTags'    => SeoService::ogTags([
                    'title'       => $seoTitle,
                    'description' => $seoDesc,
                    'image'       => $ogImage,
                    'canonical'   => $canonical,
                    'og_type'     => 'article',
                    'site_name'   => $settings['website_name'] ?? 'NOVAREX',
                ]),
                'jsonLd' => SeoService::jsonLd(array_merge(
                    [SeoService::schemaOrganisation($settings)],
                    SeoService::schemaArticle($post->toArray(), $settings),
                    SeoService::schemaBreadcrumb([
                        ['name' => 'Home',        'url' => SeoService::canonical('')],
                        ['name' => 'Blog & News', 'url' => SeoService::canonical('blog')],
                        ['name' => $post->title,  'url' => $canonical],
                    ])
                )),
            ];

            return theme_view('blog.show', compact('post', 'settings', 'seo'));
        }

        // Post not found — show 404 UI with HTTP 404 status
        $seo = [
            'title'       => 'Post Not Found | ' . ($settings['website_short_name'] ?? 'NOVAREX'),
            'description' => 'The requested article could not be found.',
            'canonical'   => SeoService::canonical('blog'),
            'metaTags'    => '',
            'jsonLd'      => '',
        ];

        return response(theme_view('blog.show', compact('settings', 'seo'))->with('post', null),
            404
        );
    }
}
