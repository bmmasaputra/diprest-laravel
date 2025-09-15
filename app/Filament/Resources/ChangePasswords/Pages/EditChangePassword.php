<?php

namespace App\Filament\Resources\ChangePasswords\Pages;

use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EditChangePassword extends EditRecord
{
    protected static string $resource = ChangePasswordResource::class;

    protected static ?string $title = 'Ubah Password';

    // Tidak perlu aksi header (hapus Delete, dsb)
    protected function getHeaderActions(): array
    {
        return [];
    }

    /**
     * Pastikan yang diedit adalah user yang sedang login.
     * Jika URL memuat record berbeda, redirect ke record milik Auth.
     */
    /**
     * Jika {record} tidak ada / tidak valid, arahkan ke record milik user yang login.
     * Jika valid, biarkan parent memuat record tersebut.
     */
    public function mount($record): void
    {
        // Cek ada param dan memang ada di DB
        $paramKosong = empty($record);
        $tidakDitemukan = false;

        if (! $paramKosong) {
            // cek eksistensi berdasarkan route key (PK model User kamu, mis. id_user)
            $tidakDitemukan = ! User::query()->whereKey($record)->exists();
        }

        if ($paramKosong || $tidakDitemukan) {
            $user = Auth::user(); // user yang sedang login
            if ($user) {
                // Redirect ke halaman edit dengan record = user yang login
                $this->redirect(
                    ChangePasswordResource::getUrl('edit', ['record' => $user])
                );
                return;
            }

            abort(403);
        }

        // Param valid -> lanjut mount bawaan untuk memuat record
        parent::mount($record);
    }

    /**
     * Baca nilai raw (termasuk non-dehydrated), validasi, dan siapkan data.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // AMBIL RAW STATE (penting untuk field ->dehydrated(false))
        $state = $this->form->getRawState();

        // Cek ulang password lama sebagai sabuk pengaman (schema juga sudah cek)
        if (! Hash::check($state['current_password'] ?? '', $this->record->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Password lama tidak sesuai.',
            ]);
        }

        if (empty($state['new_password'])) {
            throw ValidationException::withMessages([
                'new_password' => 'Password baru wajib diisi.',
            ]);
        }

        // Isi kolom 'password' dengan hash
        $data['password'] = Hash::make($state['new_password']);

        // Bersihkan field non-DB dari payload
        unset($data['current_password'], $data['new_password'], $data['new_password_confirmation']);

        return $data;
    }

    /**
     * Pastikan update benar-benar tersimpan meskipun mass-assignment bermasalah.
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Kalau 'password' ada, set langsung ke model agar pasti tersimpan
        if (array_key_exists('password', $data)) {
            $record->password = $data['password'];
            unset($data['password']);
        }

        // Isi sisa data (jika ada) lalu simpan
        if (! empty($data)) {
            $record->fill($data);
        }

        $record->save();

        return $record;
    }

    protected function afterSave(): void
    {
        // Bersihkan input password & tampilkan notifikasi
        $this->form->fill([]);

        Notification::make()
            ->title('Password berhasil diperbarui')
            ->success()
            ->send();
    }

    /**
     * Tetap di halaman edit setelah update.
     */
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', ['record' => $this->record]);
    }
}
