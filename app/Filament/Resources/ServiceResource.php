<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required()->maxLength(190)->columnSpanFull(),
            TextInput::make('tag')->maxLength(120),
            TextInput::make('icon')->label('Icon class (Font Awesome)')->placeholder('fa-solid fa-layer-group')->maxLength(120),
            Select::make('accent')->options(['blue' => 'Blue', 'green' => 'Green'])->default('blue')->required(),
            Textarea::make('description')->required()->rows(4)->columnSpanFull(),
            FileUpload::make('image')->image()->disk('public')->directory('services')->maxSize(5120)->imageResizeMode('contain')->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
            Toggle::make('is_active')->label('Active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->sortable()->label('#'),
                ImageColumn::make('image')->disk('public')->size(48)->defaultImageUrl(fn () => ''),
                TextColumn::make('title')->searchable()->sortable()->limit(40),
                TextColumn::make('tag')->badge()->searchable(),
                TextColumn::make('accent')->badge()->color(fn ($state) => $state === 'green' ? 'success' : 'info'),
                ToggleColumn::make('is_active')->label('Active'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                SelectFilter::make('accent')->options(['blue' => 'Blue', 'green' => 'Green']),
            ])
            ->actions([EditAction::make(), DeleteAction::make()])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
