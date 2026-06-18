<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileLinkResource\Pages;
use App\Models\ProfileLink;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProfileLinkResource extends Resource
{
    protected static ?string $model = ProfileLink::class;
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required()->maxLength(160),
            TextInput::make('url')->required()->url()->maxLength(255)->columnSpanFull(),
            TextInput::make('icon')->label('Icon class (Font Awesome)')->placeholder('fa-solid fa-link')->maxLength(120),
            TextInput::make('sort_order')->numeric()->default(0),
            TextInput::make('description')->maxLength(255)->columnSpanFull(),
            Toggle::make('is_active')->label('Active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->sortable()->label('#'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('url')->searchable()->limit(40),
                TextColumn::make('clicks')->sortable(),
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
            'index'  => Pages\ListProfileLinks::route('/'),
            'create' => Pages\CreateProfileLink::route('/create'),
            'edit'   => Pages\EditProfileLink::route('/{record}/edit'),
        ];
    }
}
