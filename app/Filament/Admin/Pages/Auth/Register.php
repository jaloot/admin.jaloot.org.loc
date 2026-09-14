<?php

namespace App\Filament\Admin\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\Register as BaseRegister;

class Register extends BaseRegister
{

    public function getTitle(): string
    {
        return 'Free Quran Data API';
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create($data);
        $user->assignRole('publisher');
        return $user;
    }
}
