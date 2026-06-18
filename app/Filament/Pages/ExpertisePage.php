<?php

namespace App\Filament\Pages;

use App\Models\ContentSection;
use App\Services\SettingsService;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ExpertisePage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Expertise Content';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int    $navigationSort  = 1;
    protected static string  $view            = 'filament.pages.simple-form-page';

    public ?array $data = [];

    public function mount(): void
    {
        $section = ContentSection::getSection('expertise');
        $this->form->fill([
            'expertise_title'   => $section['expertise_title'] ?? SettingsService::get('expertise_title', ''),
            'expertise_content' => $section['expertise_content'] ?? SettingsService::get('expertise_content', ''),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('expertise_title')->label('Section Title')->required()->columnSpanFull(),
            RichEditor::make('expertise_content')
                ->label('Section Content')
                ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'h2', 'h3', 'undo', 'redo'])
                ->columnSpanFull(),
        ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [Action::make('save')->label('Save')->action('save')];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        SettingsService::setMany($data);
        Notification::make()->title('Saved successfully')->success()->send();
    }
}
