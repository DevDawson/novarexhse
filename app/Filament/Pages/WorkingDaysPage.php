<?php

namespace App\Filament\Pages;

use App\Models\WorkingDay;
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class WorkingDaysPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Working Hours';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int    $navigationSort  = 5;
    protected static string  $view            = 'filament.pages.simple-form-page';

    public ?array $data = [];

    public function mount(): void
    {
        $days = WorkingDay::orderBy('day_order')->get()->map(fn ($d) => [
            'id'          => $d->id,
            'day_name'    => $d->day_name,
            'is_open'     => (bool) $d->is_open,
            'open_time'   => $d->open_time,
            'close_time'  => $d->close_time,
            'note'        => $d->note,
        ])->toArray();

        $this->form->fill(['days' => $days]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Repeater::make('days')
                ->label('Working Days')
                ->schema([
                    TextInput::make('day_name')->label('Day')->disabled(),
                    Checkbox::make('is_open')->label('Open'),
                    TextInput::make('open_time')->label('Open Time')->placeholder('08:00'),
                    TextInput::make('close_time')->label('Close Time')->placeholder('17:00'),
                    TextInput::make('note')->label('Note')->placeholder('e.g. Closed on public holidays'),
                ])
                ->columns(5)
                ->addable(false)
                ->deletable(false)
                ->reorderable(false),
        ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [Action::make('save')->label('Save Working Hours')->action('save')];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach ($data['days'] as $row) {
            WorkingDay::where('id', $row['id'])->update([
                'is_open'    => $row['is_open'] ? 1 : 0,
                'open_time'  => $row['open_time'],
                'close_time' => $row['close_time'],
                'note'       => $row['note'],
            ]);
        }
        Notification::make()->title('Working hours saved')->success()->send();
    }
}
