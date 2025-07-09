<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TugasResource\Pages;
use App\Models\Tugas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Actions;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class TugasResource extends Resource
{
    protected static ?string $model = Tugas::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Menu Utama';
    protected static ?string $navigationLabel = 'Tugas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255)
                ->label('Judul Tugas'),
            Forms\Components\Select::make('mata_kuliah_id')
                ->label('Mata Kuliah')
                ->relationship('mataKuliah', 'nama')
                ->searchable()
                ->required()
                ->preload(),
            Forms\Components\DatePicker::make('deadline')
                ->required()
                ->label('Deadline'),
            Forms\Components\DatePicker::make('ingatkan_pada')
                ->label('Ingatkan Pada'),
            Forms\Components\Select::make('kategori_id')
                ->label('Kategori Tugas')
                ->relationship('kategori', 'name')
                ->searchable()
                ->preload(),
                Select::make('status')
                ->label('Status')
                ->options([
                    'baru' => '🆕 Baru',
                    'proses' => '⏳ Dalam Proses',
                    'selesai' => '✅ Selesai',
                    'batal' => '❌ Dibatalkan',
                ])
                ->default('baru')
                ->required(),
            Forms\Components\Textarea::make('deskripsi')
                ->required()
                ->maxLength(1000)
                ->label('Deskripsi Tugas'),

            Forms\Components\Hidden::make('user_id')
                ->default(auth()->id())
                ->label('User ID'), // Fitur 2: Set user_id otomatis
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Tugas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mataKuliah.nama')
                    ->label('Mata Kuliah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Tugas')
                    ->limit(50),
                TextColumn::make('deadline')
                    ->date()
                    ->label('Deadline')
                    ->sortable(),
                TextColumn::make('ingatkan_pada')
                    ->date()
                    ->label('Ingatkan Pada')
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->label('Kategori Tugas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'baru' => '🆕 Baru',
                        'proses' => '⏳ Dalam Proses',
                        'selesai' => '✅ Selesai',
                        'batal' => '❌ Dibatalkan',
                        default => '❓ Tidak Diketahui',
                    })
                    ->sortable()
                    ->searchable(),

            ])

            ->defaultSort('deadline', 'asc') // Fitur 4: sort by deadline terdekat
            ->filters([
                SelectFilter::make('mata_kuliah_id')
                    ->label('Mata Kuliah')
                    ->relationship('mataKuliah', 'nama')
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                ->successNotification(null)
                    ->after(function () {
                        Notification::make()
                            ->title('Dihapus')
                            ->body('Data Tugas berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Fitur 2: Tampilkan hanya tugas milik user (kecuali admin)
        if (auth()->user()->role === 'user') {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTugas::route('/'),
            'create' => Pages\CreateTugas::route('/create'),
            'edit' => Pages\EditTugas::route('/{record}/edit'),
        ];
    }


}
