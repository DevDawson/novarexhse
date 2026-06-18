<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorporateEmailResource\Pages;
use App\Models\CorporateEmail;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class CorporateEmailResource extends Resource
{
    protected static ?string $model = CorporateEmail::class;
    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';
    protected static ?string $navigationLabel = 'Corporate Emails';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')->required()->email()->maxLength(190),
            TextInput::make('label')->required()->maxLength(190),
            TextInput::make('person_name')->maxLength(160),
            TextInput::make('department')->maxLength(160),
            TextInput::make('sort_order')->numeric()->default(0),
            Toggle::make('is_active')->label('Active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->sortable()->label('#'),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('label')->searchable(),
                TextColumn::make('person_name')->searchable(),
                TextColumn::make('department')->badge(),
                ToggleColumn::make('is_active')->label('Active'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([EditAction::make(), DeleteAction::make()])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCorporateEmails::route('/'),
            'create' => Pages\CreateCorporateEmail::route('/create'),
            'edit'   => Pages\EditCorporateEmail::route('/{record}/edit'),
        ];
    }
}
