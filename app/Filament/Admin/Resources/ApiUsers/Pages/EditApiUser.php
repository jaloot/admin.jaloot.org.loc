<?php

namespace App\Filament\Admin\Resources\ApiUsers\Pages;

use App\Filament\Admin\Resources\ApiUsers\ApiUserResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditApiUser extends EditRecord
{
    protected static string $resource = ApiUserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['role'] = $this->record
            ->getRoleNames()
            ->first();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $role = $this->data['role'] ?? null;

        unset($data['role']);

        $record->update($data);

        if ($role) {
            $record->syncRoles([$role]);
        }

        return $record;
    }
}