<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('blog_category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('slug')
                                    ->required(),
                            ]),

                        Forms\Components\Select::make('author_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->default(auth()->id())
                            ->helperText('Leave empty for anonymous'),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(BlogPost::class, 'slug', ignoreRecord: true)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('excerpt')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->helperText('Short summary (leave empty to auto-generate)'),

                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'codeBlock',
                                'undo',
                                'redo',
                            ]),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->disk('public_uploads')
                            ->directory('blog/post')
                            ->maxSize(2048)
                            ->helperText('Recommended: 1200x630px'),

                        Forms\Components\FileUpload::make('og_image')
                            ->image()
                            ->disk('public_uploads')
                            ->directory('blog/post')
                            ->maxSize(2048)
                            ->helperText('For social media sharing (leave empty to use featured image)'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(60)
                            ->helperText('Leave empty to use post title'),

                        Forms\Components\Textarea::make('meta_description')
                            ->rows(2)
                            ->maxLength(160)
                            ->helperText('Leave empty to use excerpt'),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_draft')
                            ->default(true)
                            ->label('Draft')
                            ->helperText('Unpublished draft'),

                        Forms\Components\Toggle::make('is_outstanding')
                            ->label('Featured')
                            ->helperText('Show in featured section'),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->label('Active')
                            ->helperText('Show/hide on website'),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->helperText('Schedule for future publishing'),

                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->disk('public_uploads')
                    ->width(80)
                    ->height(60),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_draft')
                    ->boolean()
                    ->label('Draft')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_outstanding')
                    ->boolean()
                    ->label('Featured')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),

                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable()
                    ->label('Views'),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('blog_category_id')
                    ->relationship('category', 'name')
                    ->label('Category'),

                Tables\Filters\TernaryFilter::make('is_draft')
                    ->label('Status')
                    ->trueLabel('Drafts only')
                    ->falseLabel('Published only')
                    ->native(false),

                Tables\Filters\TernaryFilter::make('is_outstanding')
                    ->label('Featured')
                    ->native(false),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->native(false),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}