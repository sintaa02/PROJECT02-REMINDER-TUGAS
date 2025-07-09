<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataKuliahResource\Pages;
use App\Models\MataKuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;


class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Menu Utama';
    protected static ?string $navigationLabel = 'Mata Kuliah';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->label('Nama Mata Kuliah')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('kode')
                ->label('Kode Mata Kuliah')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('sks')
                ->label('Jumlah SKS')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(6)
                ->placeholder('Masukkan jumlah SKS (1-6)')
                ->helperText('Jumlah SKS harus antara 1 hingga 6'),

            Forms\Components\Select::make('dosen_id')
                ->label('Dosen Pengampu')
                ->relationship('dosen', 'nama')
                ->searchable()
                ->required()
                ->preload(),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->maxLength(500)
                ->placeholder('Masukkan deskripsi mata kuliah')
                ->rows(3)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Mata Kuliah')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kode')
                    ->label('Kode Mata Kuliah')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sks')
                    ->sortable()
                    ->label('SKS'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi'),

                Tables\Columns\TextColumn::make('dosen.nama')
                    ->label('Dosen Pengampu')
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->successNotification(null)
                    ->after(function () {
                        Notification::make()
                            ->title('Dihapus')
                            ->body('Data Matakuliah berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                ->successNotification(null)
                    ->after(function () {
                        Notification::make()
                            ->title('Dihapus')
                            ->body('Data Matakuliah berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
            ]);
    }
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-book-open'; // Ganti sesuai ikon yang kamu mau
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}
