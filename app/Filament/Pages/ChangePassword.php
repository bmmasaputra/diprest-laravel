<?php

namespace App\Filament\Pages;

use Closure;
use Filament\Pages\Page;
use Filament\Facades\Filament;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Filament\Schemas\ChangePasswordSchema;
use App\Models\User as UserModel;
use BackedEnum;
use Filament\Support\Icons\Heroicon; 

class ChangePassword extends Page
{
    use InteractsWithForms;

    // >>> BackedEnum untuk navigationIcon
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Pengaturan';
    protected static ?string $title = 'Pengaturan';

    protected string $view = 'filament::filament.pages.change-password';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('changePassword')
                ->label('Ubah Password')
                ->icon('heroicon-o-key')
                ->modalHeading('Ubah Password')
                ->schema(ChangePasswordSchema::components())
                ->action(function (array $data): void {
                    /** @var UserModel|null $user */
                    $user = Filament::auth()->user();

                    if (! $user) {
                        Notification::make()->title('Tidak ada pengguna yang login.')->danger()->send();
                        return;
                    }

                    // Password lama sudah divalidasi via rule() di schema
                    $user->password = Hash::make($data['new_password']);
                    $user->save();

                    Notification::make()
                        ->title('Password berhasil diperbarui')
                        ->success()
                        ->send();
                }),
        ];
    }
}
