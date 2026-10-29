<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $name = config('admin.name');
        $email = config('admin.email');
        $password = config('admin.password');

        if (
            ! is_string($name) || trim($name) === ''
            || ! is_string($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false
            || ! is_string($password) || strlen($password) < 12
        ) {
            throw new RuntimeException(
                'Set ADMIN_NAME, a valid ADMIN_EMAIL, and an ADMIN_PASSWORD of at least 12 characters before seeding the administrator.'
            );
        }

        $user = User::query()->where('email', $email)->first();

        if ($user !== null) {
            if (! $user->is_admin) {
                throw new RuntimeException('The configured administrator email already belongs to a non-admin user.');
            }

            return;
        }

        $user = new User;
        $user->forceFill([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'is_admin' => true,
        ])->save();
    }
}
