<?php

namespace App\Filament\Pages;

use App\Services\SettingsService;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class LegalPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Legal Content';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int    $navigationSort  = 4;
    protected static string  $view            = 'filament.pages.simple-form-page';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'terms_content'              => SettingsService::get('terms_content', ''),
            'privacy_content'            => SettingsService::get('privacy_content', ''),
            'cookie_policy_content'      => SettingsService::get('cookie_policy_content', ''),
            'workplace_policy_content'   => SettingsService::get('workplace_policy_content', ''),
        ]);
    }

    public function form(Form $form): Form
    {
        $editorButtons = ['bold', 'italic', 'bulletList', 'orderedList', 'h2', 'h3', 'blockquote', 'undo', 'redo'];

        return $form->schema([
            Section::make('Terms & Conditions')->schema([
                RichEditor::make('terms_content')->label('Content')->toolbarButtons($editorButtons)->columnSpanFull(),
            ]),
            Section::make('Privacy Policy')->schema([
                RichEditor::make('privacy_content')->label('Content')->toolbarButtons($editorButtons)->columnSpanFull(),
            ]),
            Section::make('Cookie Policy')->schema([
                RichEditor::make('cookie_policy_content')->label('Content')->toolbarButtons($editorButtons)->columnSpanFull(),
            ]),
            Section::make('Workplace Policy')->schema([
                RichEditor::make('workplace_policy_content')->label('Content')->toolbarButtons($editorButtons)->columnSpanFull(),
            ]),
        ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [Action::make('save')->label('Save Legal Content')->action('save')];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        SettingsService::setMany($data);
        Notification::make()->title('Legal content saved')->success()->send();
    }
}
