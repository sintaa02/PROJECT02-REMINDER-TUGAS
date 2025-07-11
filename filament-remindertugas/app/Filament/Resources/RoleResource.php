<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;
use Filament\Notifications\Notification;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationLabel = 'Role';
    protected static ?string $pluralLabel = 'Roles';
    protected static ?string $slug = 'roles';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('ID')
                    ->disabled(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Role')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('guard_name')
                    ->label('Guard Name')
                    ->default('web')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Role')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('guard_name')
                    ->label('Guard')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->successNotification(null)
                    ->after(function () {
                        Notification::make()
                            ->title('Dihapus')
                            ->body('Data Tugas berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
                ]),
            ]);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            // 'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
