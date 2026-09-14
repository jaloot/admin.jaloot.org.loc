<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;

class Login extends BaseLogin
{

    public function getTitle(): string
    {
        return 'Quran API Login | Sign In to API Dashboard';
    }
}
