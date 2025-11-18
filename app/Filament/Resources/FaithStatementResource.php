<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaithStatementResource\Pages;
use App\Filament\Resources\FaithStatementResource\RelationManagers;
use App\Models\FaithStatement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class FaithStatementResource extends Resource
{
    protected static ?string $model = FaithStatement::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Statement of Faith';
    protected static ?string $navigationLabel = 'Statements';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // CATEGORY SELECTION
                Forms\Components\Select::make('faith_category_id')
                    ->label('Category')
                    ->relationship('category', 'name_en')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->helperText('Select which category this statement belongs to')
                    ->columnSpanFull(),

                // LANGUAGE TABS
                Forms\Components\Tabs::make('Language')
                    ->tabs([
                        // VIETNAMESE TAB
                        Forms\Components\Tabs\Tab::make('Vietnamese')
                            ->schema([
                                Forms\Components\TextInput::make('title_vi')
                                    ->label('Title (Vietnamese)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug_vi', Str::slug($state));
                                        }
                                    })
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('slug_vi')
                                    ->label('Slug (Vietnamese)')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(FaithStatement::class, 'slug_vi', ignoreRecord: true),

                                Forms\Components\RichEditor::make('content_vi')
                                    ->label('Content (Vietnamese)')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                        'link',
                                    ])
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('SEO (Vietnamese)')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_vi')
                                            ->label('Meta Title')
                                            ->helperText('For SEO.'),

                                        Forms\Components\Textarea::make('meta_description_vi')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->helperText('For SEO.'),
                                    ])
                                    ->columns(1)
                                    ->collapsible(),
                            ]),
                        // ENGLISH TAB
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title (English)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug_en', Str::slug($state));
                                        }
                                    })
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('slug_en')
                                    ->label('Slug (English)')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(FaithStatement::class, 'slug_en', ignoreRecord: true),

                                Forms\Components\RichEditor::make('content_en')
                                    ->label('Content (English)')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                        'link',
                                    ])
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('SEO (Vietnamese)')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_en')
                                            ->label('Meta Title')
                                            ->helperText('For SEO.'),

                                        Forms\Components\Textarea::make('meta_description_en')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->helperText('For SEO.'),
                                    ])
                                    ->columns(1)
                                    ->collapsible(),
                            ])
                    ])
                    ->columnSpanFull(),

                // SCRIPTURE REFERENCES
                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Order')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Lower numbers are displayed first.'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name_en')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title_vi')
                    ->label('Title (VI)')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),

                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title (EN)')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('faith_category_id')
                    ->label('Category')
                    ->relationship('category', 'name_en')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaithStatements::route('/'),
            'create' => Pages\CreateFaithStatement::route('/create'),
            'edit' => Pages\EditFaithStatement::route('/{record}/edit'),
        ];
    }
}
