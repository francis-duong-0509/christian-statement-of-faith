<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Models\Subscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Subscribers';

    protected static ?string $modelLabel = 'Subscriber';

    protected static ?string $pluralModelLabel = 'Subscribers';

    /* public static function getNavigationBadge(): ?string
    {

    } */

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Subscriber Information')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->columnSpan(1),

                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'active' => 'Active',
                                'unsubscribed' => 'Unsubscribed',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false),

                        Forms\Components\Select::make('locale')
                            ->options([
                                'vi' => 'Vietnamese',
                                'en' => 'English',
                            ])
                            ->required()
                            ->default('en')
                            ->native(false),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Metadata')
                    ->schema([
                        Forms\Components\DateTimePicker::make('subscribed_at')
                            ->label('Subscribed At'),

                        Forms\Components\DateTimePicker::make('unsubscribed_at')
                            ->label('Unsubscribed At'),

                        Forms\Components\TextInput::make('ip_address')
                            ->label('IP Address')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\Textarea::make('user_agent')
                            ->label('User Agent')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsed()
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'active',
                        'danger' => 'unsubscribed',
                    ]),

                Tables\Columns\TextColumn::make('locale')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'vi' => 'info',
                        'en' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'vi' => 'VN',
                        'en' => 'EN',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('subscribed_at')
                    ->label('Subscribed')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'active' => 'Active',
                        'unsubscribed' => 'Unsubscribed',
                    ])
                    ->native(false),

                Tables\Filters\SelectFilter::make('locale')
                    ->options([
                        'vi' => 'Vietnamese',
                        'en' => 'English',
                    ])
                    ->native(false),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('activate')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn (Subscriber $record): bool => $record->status !== 'active')
                        ->requiresConfirmation()
                        ->action(fn (Subscriber $record) => $record->activate()),
                    Tables\Actions\Action::make('unsubscribe')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn (Subscriber $record): bool => $record->status === 'active')
                        ->requiresConfirmation()
                        ->action(fn (Subscriber $record) => $record->unsubscribe()),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->activate())
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('export')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function ($records) {
                            $csv = "Email,Name,Status,Locale,Subscribed At\n";
                            foreach ($records as $record) {
                                $csv .= "\"{$record->email}\",\"{$record->name}\",\"{$record->status}\",\"{$record->locale}\",\"{$record->subscribed_at}\"\n";
                            }

                            return response()->streamDownload(function () use ($csv) {
                                echo $csv;
                            }, 'subscribers-' . now()->format('Y-m-d') . '.csv');
                        }),
                ]),
            ])
            ->emptyStateHeading('No subscribers yet')
            ->emptyStateDescription('When users subscribe to your newsletter, they will appear here.')
            ->emptyStateIcon('heroicon-o-envelope');
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
            'index' => Pages\ListSubscribers::route('/'),
            'create' => Pages\CreateSubscriber::route('/create'),
            'edit' => Pages\EditSubscriber::route('/{record}/edit'),
        ];
    }
}