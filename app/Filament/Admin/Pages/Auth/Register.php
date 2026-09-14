<?php

namespace App\Filament\Admin\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\Register as BaseRegister;

class Register extends BaseRegister
{

    public function getTitle(): string
    {
        return 'Sign Up for Quran API — Free - Jaloot.org Quran';
    }

    public function getHeading(): string
    {
        return 'Sign Up for Quran API — Free';
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create($data);
        $user->assignRole('publisher');
        return $user;
    }
}
