<?php

// namespace App\Filament\Resources;

// use Spatie\Permission\Models\Permission;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Table;
// use Filament\Forms;
// use Filament\Forms\Form;
// use App\Filament\Resources\PermissionResource\Pages;

// class PermissionResource extends Resource
// {
//     protected static ?string $model = Permission::class;

//     protected static ?string $navigationIcon = 'heroicon-o-key';
//     protected static ?string $navigationGroup = 'Admin Management';

//     public static function form(Form $form): Form
//     {
//         return $form->schema([
//             Forms\Components\TextInput::make('name')
//                 ->required()
//                 ->label('Name'),

//             Forms\Components\Select::make('guard_name')
//                 ->label('Guard Name')
//                 ->options([
//                     'web' => 'web',
//                     'api' => 'api',
//                 ])
//                 ->default('web')
//                 ->required(),

//             Forms\Components\Select::make('roles')
//                 ->label('Roles')
//                 ->multiple()
//                 ->relationship('roles', 'name')
//                 ->preload(),
//         ]);
//     }


//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 Tables\Columns\TextColumn::make('id')
//                     ->label('ID')
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('name')
//                     ->label('Permission Name')
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('guard_name')
//                     ->label('Guard Name')
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('roles_count')
//                     ->label('Roles Count')
//                     ->counts('roles'),
//             ])
//             ->actions([
//                 Tables\Actions\EditAction::make(),
//                 Tables\Actions\DeleteAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\DeleteBulkAction::make(),
//             ]);
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListPermissions::route('/'),
//             'create' => Pages\CreatePermission::route('/create'),
//             'edit' => Pages\EditPermission::route('/{record}/edit'),
//         ];
//     }
// }
