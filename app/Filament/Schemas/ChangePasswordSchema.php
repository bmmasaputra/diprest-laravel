<?php

// namespace App\Filament\Schemas;

// use Filament\Forms\Components\TextInput;
// use Illuminate\Validation\Rules\Password as PasswordRule;
// use Closure;
// use Filament\Facades\Filament;
// use Illuminate\Support\Facades\Hash;

// class ChangePasswordSchema
// {
//     /**
//      * Kembalikan array komponen form (bisa dipakai di Action / Form mana pun).
//      */
//     public static function components(): array
//     {
//         return [
//             TextInput::make('current_password')
//                 ->label('Password lama')
//                 ->password()
//                 ->revealable()
//                 ->required()
//                 ->autocomplete('current-password')
//                 ->rule(function () {
//                     return function (string $attribute, $value, Closure $fail) {
//                         $user = Filament::auth()->user();
//                         if (! $user || ! Hash::check($value, $user->password)) {
//                             $fail('Password lama tidak sesuai.');
//                         }
//                     };
//                 }),

//             TextInput::make('new_password')
//                 ->label('Password baru')
//                 ->password()
//                 ->revealable()
//                 ->required()
//                 ->autocomplete('new-password')
//                 ->rules(['confirmed', PasswordRule::min(8)]),

//             TextInput::make('new_password_confirmation')
//                 ->label('Konfirmasi password baru')
//                 ->password()
//                 ->revealable()
//                 ->required()
//                 ->autocomplete('new-password'),
//         ];
//     }
// }
