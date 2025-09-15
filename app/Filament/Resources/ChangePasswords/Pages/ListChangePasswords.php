<?php

namespace App\Filament\Resources\ChangePasswords\Pages;

use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListChangePasswords extends ListRecords
{
    protected static string $resource = ChangePasswordResource::class;

    protected function getHeaderActions(): array
    {
        // Tidak perlu tombol apa pun di list, karena kita langsung redirect ke edit
        return [];
    }

    public function mount(): void
    {
        parent::mount();

        $user = Auth::user(); // user yang sedang login (punya id_user sesuai model User kamu)

        if ($user) {
            // Arahkan ke halaman edit dengan record = user yang login
            $this->redirect(
                ChangePasswordResource::getUrl('edit', ['record' => $user])
            );
        }
    }
}
