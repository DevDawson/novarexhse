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
                    TextInput::make('website_name')->label('Full Name')->required()->columnSpanFull(),
                    TextInput::make('website_short_name')->label('Short Name (e.g. NOVAREX)')->required(),
                    TextInput::make('website_subtitle')->label('Subtitle (e.g. HSE & Sustainability Ltd)'),
                    TextInput::make('website_tagline')->label('Tagline')->columnSpanFull(),
                    FileUpload::make('logo')
                        ->label('Logo')
                        ->image()
                        ->disk('public')
                        ->directory('settings')
                        ->imagePreviewHeight('80')
                        ->helperText('Shown in navbar, footer, and browser tab. Recommended: square PNG with transparent background.'),
                    FileUpload::make('favicon')
                        ->label('Favicon')
                        ->image()
                        ->disk('public')
                        ->directory('settings')
                        ->imagePreviewHeight('80')
                        ->helperText('Browser tab icon. Falls back to logo if not set. Recommended: 32×32 ICO or PNG.'),
                ])->columns(2),

                Section::make('Contact Information')->schema([
                    TextInput::make('phone')->label('Primary Phone'),
                    TextInput::make('phone_alt')->label('Alternative Phone'),
                    TextInput::make('email')->label('Email Address')->email(),
                    TextInput::make('whatsapp')->label('WhatsApp Number (digits only, e.g. 255755676826)'),
                    TextInput::make('location')->label('City / Region (e.g. Mwanza, Tanzania)'),
                    TextInput::make('business_hours')->label('Business Hours')->columnSpanFull(),
                    Textarea::make('address')->label('Full Address')->rows(2)->columnSpanFull(),
                    Textarea::make('footer_address')->label('Footer Address (short, HTML allowed)')->rows(2)->columnSpanFull(),
                ])->columns(2),

                Section::make('Social Media')->schema([
                    TextInput::make('linkedin')->label('LinkedIn URL')->url(),
                    TextInput::make('facebook')->label('Facebook URL')->url(),
                    TextInput::make('instagram')->label('Instagram URL')->url(),
                ])->columns(2),

                Section::make('Maps & Location')->schema([
                    TextInput::make('map_latitude')->label('Latitude'),
                    TextInput::make('map_longitude')->label('Longitude'),
                    TextInput::make('map_query')->label('Maps Search Query (fallback if no coordinates)')->columnSpanFull(),
                ])->columns(2),

                Section::make('Stat Counters')->schema([
                    TextInput::make('stat_1_value')->label('Stat 1 Value'),
                    TextInput::make('stat_1_label')->label('Stat 1 Label'),
                    TextInput::make('stat_2_value')->label('Stat 2 Value'),
                    TextInput::make('stat_2_label')->label('Stat 2 Label'),
                    TextInput::make('stat_3_value')->label('Stat 3 Value'),
                    TextInput::make('stat_3_label')->label('Stat 3 Label'),
                    TextInput::make('stat_4_value')->label('Stat 4 Value'),
                    TextInput::make('stat_4_label')->label('Stat 4 Label'),
                ])->columns(2),

                Section::make('Footer')->schema([
                    Textarea::make('footer_content')->label('Footer Tagline / Description')->rows(2)->columnSpanFull(),
                ])->columns(1),

                Section::make('SEO & Meta')->schema([
                    TextInput::make('meta_title')->label('Default Page Title')->columnSpanFull(),
                    Textarea::make('meta_description')->label('Default Meta Description')->rows(3)->columnSpanFull(),
                    TextInput::make('meta_keywords')->label('Meta Keywords (comma-separated)')->columnSpanFull(),
                ])->columns(1),

                Section::make('Cookie Notice')->schema([
                    Toggle::make('cookie_enabled')->label('Show Cookie Notice')->inline(false),
                    TextInput::make('cookie_title')->label('Notice Title'),
                    Textarea::make('cookie_message')->label('Notice Message')->rows(3)->columnSpanFull(),
                ])->columns(2),

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
