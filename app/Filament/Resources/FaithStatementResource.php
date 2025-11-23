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

                                        if ($operation === 'edit') {
                                            $set('slug_vi', Str::slug($state));
                                        }
                                    })
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('slug_vi')
                                    ->label('Slug (Vietnamese)')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(FaithStatement::class, 'slug_vi', ignoreRecord: true)
                                    ->helperText('URL-friendly version. Ex: chua-cha-chua-con-chua-thanh-than'),

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

                                Forms\Components\Repeater::make('scripture_references_vi')
                                    ->label('Scripture References (Vietnamese)')
                                    ->schema([
                                        Forms\Components\TextInput::make('ref')
                                            ->label('Reference')
                                            ->placeholder('e.g., Giăng 3:16')
                                            ->required()
                                            ->helperText('Format: Book Chapter:Verse (e.g., Giăng 3:16, Rô-ma 8:28-30)')
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

                                Forms\Components\Section::make('SEO (Vietnamese)')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_vi')
                                            ->label('Meta Title')
                                            ->maxLength(60)
                                            ->helperText('For SEO. Recommended: 50-60 characters.'),

                                        Forms\Components\Textarea::make('meta_description_vi')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('For SEO. Recommended: 150-160 characters.'),
                                    ])
                                    ->columns(1)
                                    ->collapsible()
                                    ->collapsed(true),
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

                                        if ($operation === 'edit') {
                                            $set('slug_en', Str::slug($state));
                                        }
                                    })
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('slug_en')
                                    ->label('Slug (English)')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(FaithStatement::class, 'slug_en', ignoreRecord: true)
                                    ->helperText('URL-friendly version. Ex: the-father-son-and-holy-spirit'),

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

                                Forms\Components\Section::make('SEO (English)')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_en')
                                            ->label('Meta Title')
                                            ->maxLength(60)
                                            ->helperText('For SEO. Recommended: 50-60 characters.'),

                                        Forms\Components\Textarea::make('meta_description_en')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('For SEO. Recommended: 150-160 characters.'),
                                    ])
                                    ->columns(1)
                                    ->collapsible()
                                    ->collapsed(true),
                            ])
                    ])
                    ->columnSpanFull(),

                // BANNER IMAGE
                Forms\Components\Section::make('Banner Image')
                    ->description('Upload a banner image for this statement (recommended size: 1400x400px, aspect ratio 21:9 or 16:9)')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Banner Image')
                            ->disk('public_uploads')
                            ->directory('uploads/statement_of_faith')
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
                            ->helperText('Only active statements are visible on frontend.'),
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

                Tables\Columns\ImageColumn::make('image')
                    ->label('Banner')
                    ->getStateUsing(fn ($record) => $record->image ? asset($record->image) : null)
                    ->height(50)
                    ->width(100),

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
