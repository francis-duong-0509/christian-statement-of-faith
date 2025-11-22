<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaithCategoryResource\Pages;
use App\Filament\Resources\FaithCategoryResource\RelationManagers;
use App\Models\FaithCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FaithCategoryResource extends Resource
{
    protected static ?string $model = FaithCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Statement of Faith';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TAB for 2 languages
                Forms\Components\Tabs::make('Language')
                    ->tabs([
                        // TAB Vietnamese
                        Forms\Components\Tabs\Tab::make('Vietnamese')
                            ->schema([
                                Forms\Components\TextInput::make('name_vi')
                                    ->label('Name (Vietnamese)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug_vi', Str::slug($state));
                                        }

                                        if ($operation === 'edit') {
                                            $set('slug_vi', Str::slug($state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug_vi')
                                    ->label('Slug (Vietnamese)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->unique(FaithCategory::class, 'slug_vi', ignoreRecord: true)
                                    ->helperText('URL-friendly version. Ex: ba-ngoi'),

                                Forms\Components\Textarea::make('description_vi')
                                    ->label('Description (Vietnamese)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Forms\Components\Repeater::make('scripture_references_vi')
                                    ->label('Scripture References (Vietnamese)')
                                    ->schema([
                                        Forms\Components\TextInput::make('ref')
                                            ->label('Reference')
                                            ->placeholder('e.g., Giăng 3:16')
                                            ->required()
                                            ->helperText('Format: Book Chapter:Verse (e.g., Giăng 3:16, Romans 8:28-30)')
                                            ->columnSpan(1),

                                        Forms\Components\Textarea::make('text')
                                            ->label('Verse Text')
                                            ->placeholder('Paste the Vietnamese Bible verse here...')
                                            ->required()
                                            ->rows(3)
                                            ->helperText('The actual verse content in Vietnamese')
                                            ->columnSpan(2),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(0)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['ref'] ?? 'New Reference')
                                    ->addActionLabel('Add Scripture Reference')
                                    ->reorderable()
                                    ->columnSpanFull(),

                            ]),
                        // TAB English
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('name_en')
                                    ->label('Name (English)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug_en', Str::slug($state));
                                        }

                                        if ($operation === 'edit') {
                                            $set('slug_en', Str::slug($state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug_en')
                                    ->label('Slug (English)')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->unique(FaithCategory::class, 'slug_en', ignoreRecord: true)
                                    ->helperText('URL-friendly version. Ex: the-trinity'),

                                Forms\Components\Textarea::make('description_en')
                                    ->label('Description (English)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Forms\Components\Repeater::make('scripture_references_en')
                                    ->label('Scripture References (English)')
                                    ->schema([
                                        Forms\Components\TextInput::make('ref')
                                            ->label('Reference')
                                            ->placeholder('e.g., John 3:16')
                                            ->required()
                                            ->helperText('Format: Book Chapter:Verse (e.g., John 3:16, Romans 8:28-30)')
                                            ->columnSpan(1),

                                        Forms\Components\Textarea::make('text')
                                            ->label('Verse Text')
                                            ->placeholder('Paste the English Bible verse here...')
                                            ->required()
                                            ->rows(3)
                                            ->helperText('The actual verse content in English')
                                            ->columnSpan(2),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(0)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['ref'] ?? 'New Reference')
                                    ->addActionLabel('Add Scripture Reference')
                                    ->reorderable()
                                    ->columnSpanFull(),

                            ])
                    ])
                ->columnSpanFull(),

                Forms\Components\Section::make('Banner Image')
                    ->description('Upload a banner image for this category (recommended size: 1400x400px, aspect ratio 21:9 or 16:9)')
                    ->schema([
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('Banner Image')
                            ->disk('public_uploads')
                            ->directory('uploads')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '21:9',
                                '16:9',
                                '3:1',
                                null,  // Free aspect ratio
                            ])
                            ->maxSize(2048)  // 2MB
                            ->helperText('Recommended: 1400x400px or larger. Max file size: 2MB.')
                            ->imagePreviewHeight('200')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(false),

                // SETTINGS
                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Lower numbers are displayed first.'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active categories are visible on frontend.')
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_vi')
                    ->label('Name (VI)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name (EN)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('Banner Image')
                    ->getStateUsing(fn ($record) => $record->banner_image ? asset($record->banner_image) : null)
                    ->height(50)
                    ->width(100),

                Tables\Columns\TextColumn::make('statements_count')
                    ->label('Statements')
                    ->counts('statements') // Count related FaithStatements
                    ->alignCenter()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
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
            'index' => Pages\ListFaithCategories::route('/'),
            'create' => Pages\CreateFaithCategory::route('/create'),
            'edit' => Pages\EditFaithCategory::route('/{record}/edit'),
        ];
    }
}
