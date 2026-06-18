<?php

namespace App\Filament\Pages;

use App\Services\SettingsService;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class WebsiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Website Settings';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int    $navigationSort  = 1;
    protected static string  $view            = 'filament.pages.website-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SettingsService::all());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Brand Identity')->schema([
                    TextInput::make('site_name')->label('Site Name')->required(),
                    TextInput::make('site_tagline')->label('Tagline'),
                    TextInput::make('site_description')->label('Short Description'),
                    FileUpload::make('logo_url')->label('Logo')->image()->disk('public')->directory('settings'),
                    FileUpload::make('favicon_url')->label('Favicon')->image()->disk('public')->directory('settings'),
                ])->columns(2),

                Section::make('Contact & Location')->schema([
                    TextInput::make('contact_phone')->label('Phone'),
                    TextInput::make('contact_email')->label('Email')->email(),
                    TextInput::make('contact_address')->label('Address'),
                    TextInput::make('contact_city')->label('City'),
                    TextInput::make('contact_country')->label('Country'),
                ])->columns(2),

                Section::make('Social Media')->schema([
                    TextInput::make('social_facebook')->label('Facebook URL')->url(),
                    TextInput::make('social_twitter')->label('Twitter/X URL')->url(),
                    TextInput::make('social_linkedin')->label('LinkedIn URL')->url(),
                    TextInput::make('social_instagram')->label('Instagram URL')->url(),
                    TextInput::make('social_youtube')->label('YouTube URL')->url(),
                    TextInput::make('social_whatsapp')->label('WhatsApp Number'),
                ])->columns(2),

                Section::make('GPS / Maps')->schema([
                    TextInput::make('gps_lat')->label('Latitude'),
                    TextInput::make('gps_lng')->label('Longitude'),
                    TextInput::make('maps_embed_url')->label('Google Maps Embed URL')->url()->columnSpanFull(),
                    TextInput::make('maps_search_query')->label('Maps Search Query')->columnSpanFull(),
                    TextInput::make('maps_directions_url')->label('Get Directions URL')->url()->columnSpanFull(),
                ])->columns(2),

                Section::make('Hero Section')->schema([
                    TextInput::make('hero_headline')->label('Headline')->columnSpanFull(),
                    TextInput::make('hero_subheadline')->label('Sub-headline')->columnSpanFull(),
                    TextInput::make('hero_cta_text')->label('CTA Button Text'),
                    TextInput::make('hero_cta_url')->label('CTA Button URL'),
                    FileUpload::make('hero_image_url')->label('Hero Image')->image()->disk('public')->directory('settings')->columnSpanFull(),
                ])->columns(2),

                Section::make('About Section')->schema([
                    TextInput::make('about_title')->label('Title'),
                    Textarea::make('about_body')->label('Body')->rows(5)->columnSpanFull(),
                    FileUpload::make('about_image_url')->label('Image')->image()->disk('public')->directory('settings'),
                ])->columns(2),

                Section::make('Stat Counters')->schema([
                    TextInput::make('stat1_number')->label('Stat 1 Number'),
                    TextInput::make('stat1_label')->label('Stat 1 Label'),
                    TextInput::make('stat2_number')->label('Stat 2 Number'),
                    TextInput::make('stat2_label')->label('Stat 2 Label'),
                    TextInput::make('stat3_number')->label('Stat 3 Number'),
                    TextInput::make('stat3_label')->label('Stat 3 Label'),
                    TextInput::make('stat4_number')->label('Stat 4 Number'),
                    TextInput::make('stat4_label')->label('Stat 4 Label'),
                ])->columns(2),

                Section::make('SEO')->schema([
                    TextInput::make('seo_title')->label('Default SEO Title')->columnSpanFull(),
                    Textarea::make('seo_description')->label('Default Meta Description')->rows(3)->columnSpanFull(),
                    TextInput::make('seo_keywords')->label('Keywords (comma-separated)')->columnSpanFull(),
                    TextInput::make('og_image_url')->label('Default OG Image')->columnSpanFull(),
                ]),

                Section::make('Cookie Notice')->schema([
                    Toggle::make('cookie_notice_enabled')->label('Show Cookie Notice'),
                    Textarea::make('cookie_notice_text')->label('Cookie Notice Text')->rows(3)->columnSpanFull(),
                ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        SettingsService::setMany($data);
        Notification::make()->title('Settings saved successfully')->success()->send();
    }
}
