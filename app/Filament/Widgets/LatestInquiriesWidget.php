<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesWidget extends BaseWidget
{
    protected static ?string $heading = 'Latest Inquiries';
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Inquiry::query()->orderByDesc('id')->limit(10))
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('service')->limit(30),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Date'),
                IconColumn::make('is_read')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->actions([
                Action::make('markRead')
                    ->label('Read')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn (Inquiry $record) => $record->update(['is_read' => 1]))
                    ->visible(fn (Inquiry $record) => !$record->is_read),
            ])
            ->paginated(false);
    }
}
