<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

#[Signature('app:create-admin-user')]
#[Description('Create or update an administrator account for the question dashboard')]
class CreateAdminUser extends Command
{
    public function handle(): int
    {
        $name = trim($this->ask('Administrator name'));
        $email = mb_strtolower(trim($this->ask('Administrator email')));

        $validator = Validator::make(
            ['name' => $name, 'email' => $email],
            ['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'max:255']],
        );

        if ($validator->fails()) {
            $this->error($validator->errors()->first());

            return self::FAILURE;
        }

        $password = $this->secret('Password (at least 4 characters)');

        if (! is_string($password) || mb_strlen($password) < 4) {
            $this->error('The password must contain at least 4 characters.');

            return self::FAILURE;
        }

        if ($password !== $this->secret('Confirm password')) {
            $this->error('The passwords do not match.');

            return self::FAILURE;
        }

        $admin = User::firstOrNew(['email' => $email]);
        $admin->name = $name;
        $admin->password = Hash::make($password);
        $admin->is_admin = true;
        $admin->save();

        $this->info("Administrator account is ready for {$email}.");

        return self::SUCCESS;
    }
}
