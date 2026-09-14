<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Page
{
    protected static ?string $title = 'Edit Profile';
    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.admin.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'name' => auth()->user()->name,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile information')
                    ->icon('heroicon-o-user')
                    ->description('Update your personal information.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                    ]),

                Section::make('Change password')
                    ->icon('heroicon-o-lock-closed')
                    ->description('Leave empty if you do not want to change your password.')
                    ->schema([
                        TextInput::make('password')
                            ->label('New password')
                            ->password()
                            ->revealable()
                            ->confirmed()
                            ->minLength(8)
                            ->dehydrated(fn ($state): bool => filled($state)),

                        TextInput::make('password_confirmation')
                            ->label('Confirm password')
                            ->password()
                            ->revealable()
                            ->dehydrated(false),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $user = auth()->user();

        $user->name = $data['name'];

        if (filled($data['password'] ?? null)) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        $this->form->fill([
            'name' => $user->name,
        ]);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }
}
