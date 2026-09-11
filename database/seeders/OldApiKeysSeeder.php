<?php

namespace Database\Seeders;

use App\Models\ApiKey;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OldApiKeysSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/users.txt');

        if (! file_exists($file)) {
            $this->command->error("File not found: {$file}");

            return;
        }

        $handle = fopen($file, 'r');

        if (! $handle) {
            $this->command->error('Unable to open file.');

            return;
        }

        $count = 0;
        $skipped = 0;

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $data = str_getcsv($line, ',', "'");

            if (count($data) < 7) {
                $skipped++;

                $this->command->warn("Skipped invalid line: {$line}");

                continue;
            }

            [
                $oldId,
                $ip,
                $email,
                $sendKey,
                $secretKey,
                $agent,
                $date,
            ] = $data;

            $oldId = (int) trim($oldId);
            $ip = trim($ip);
            $email = trim($email);
            $sendKey = (int) trim($sendKey);
            $secretKey = trim($secretKey);
            $agent = trim($agent);
            $date = (int) trim($date);

            $registeredAt = $date > 0
                ? Carbon::createFromTimestamp($date)
                : now();

            /*
             * Create old user if he doesn't already exist.
             */
            $user = User::firstOrCreate(
                [
                    'email' => $email,
                ],
                [
                    'name' => $email,
                    'password' => Hash::make('Jaloot@2026'),
                    'email_verified_at' => now(),
                ]
            );

            /*
             * Give imported users the publisher role.
             * Requires Spatie Permission.
             */
            if (method_exists($user, 'assignRole')) {
                if (! $user->hasRole('publisher')) {
                    $user->assignRole('publisher');
                }
            }

            /*
             * Create / update API credentials.
             */
            ApiKey::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'api_key' => 'JALOOT-PUB-' . $oldId,
                    'api_secret_hash' => Hash::make($secretKey),
                    'ip' => $ip,
                    'email' => $email,
                    'send_key' => $sendKey,
                    'agent' => $agent,
                    'user_registered' => $registeredAt,
                ]
            );

            $count++;
        }

        fclose($handle);

        $this->command->info("Imported: {$count} users/API keys.");
        $this->command->info("Skipped: {$skipped} lines.");
    }
}