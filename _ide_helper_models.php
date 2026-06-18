<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password_hash
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $last_login
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePasswordHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $event_type
 * @property string $path
 * @property string|null $page_title
 * @property string|null $referrer
 * @property string|null $user_agent
 * @property string|null $ip_hash
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereIpHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereReferrer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyticsEvent whereUserAgent($value)
 */
	class AnalyticsEvent extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $section_key
 * @property string|null $eyebrow
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $content
 * @property string|null $button_text
 * @property string|null $button_url
 * @property string|null $image
 * @property string|null $background_image
 * @property array<array-key, mixed>|null $extra_json
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereBackgroundImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereExtraJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereEyebrow($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereSectionKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContentSection whereUpdatedAt($value)
 */
	class ContentSection extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $email
 * @property string $label
 * @property string|null $person_name
 * @property string|null $department
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail wherePersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CorporateEmail whereUpdatedAt($value)
 */
	class CorporateEmail extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $code
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property string|null $duration
 * @property string|null $price
 * @property string|null $mode
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereUpdatedAt($value)
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $icon
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feature whereUpdatedAt($value)
 */
	class Feature extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $title
 * @property string|null $category
 * @property string $image
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereUpdatedAt($value)
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $company
 * @property string $email
 * @property string|null $phone
 * @property string|null $service
 * @property string $message
 * @property bool $is_read
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inquiry whereService($value)
 */
	class Inquiry extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string $content
 * @property string|null $featured_image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post published()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string|null $icon
 * @property string|null $description
 * @property int $sort_order
 * @property bool $is_active
 * @property int $clicks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereClicks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileLink whereUrl($value)
 */
	class ProfileLink extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $icon
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sector whereUpdatedAt($value)
 */
	class Sector extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $tag
 * @property string|null $icon
 * @property string|null $image
 * @property string $accent
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereAccent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $setting_key
 * @property string|null $setting_value
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSettingKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSettingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereUpdatedAt($value)
 */
	class SiteSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $position
 * @property string|null $company
 * @property string $quote
 * @property string|null $image
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereQuote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $day_name
 * @property string|null $open_time
 * @property string|null $close_time
 * @property bool $is_open
 * @property int $sort_order
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereDayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereIsOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingDay whereUpdatedAt($value)
 */
	class WorkingDay extends \Eloquent {}
}

