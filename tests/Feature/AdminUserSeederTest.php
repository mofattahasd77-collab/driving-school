<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_an_admin_once_without_resetting_existing_credentials(): void
    {
        config([
            'admin.name' => 'School Administrator',
            'admin.email' => 'admin@example.com',
            'admin.password' => 'first-secure-password',
        ]);

        $this->seed(AdminUserSeeder::class);

        $admin = User::query()->where('email', 'admin@example.com')->firstOrFail();

        $this->assertModelExists($admin);
        $this->assertTrue($admin->is_admin);
        $this->assertTrue(Hash::check('first-secure-password', $admin->password));

        config([
            'admin.name' => 'Updated Name',
            'admin.password' => 'different-secure-password',
        ]);

        $this->seed(AdminUserSeeder::class);

        $admin->refresh();

        $this->assertDatabaseCount('users', 1);
        $this->assertSame('School Administrator', $admin->name);
        $this->assertTrue(Hash::check('first-secure-password', $admin->password));
    }

    public function test_it_rejects_missing_or_invalid_admin_credentials(): void
    {
        config([
            'admin.name' => 'School Administrator',
            'admin.email' => 'invalid-email',
            'admin.password' => 'short',
        ]);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Set ADMIN_NAME');

        $this->seed(AdminUserSeeder::class);
    }

    public function test_it_does_not_promote_an_existing_non_admin_account(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'is_admin' => false,
        ]);

        config([
            'admin.name' => 'School Administrator',
            'admin.email' => 'admin@example.com',
            'admin.password' => 'first-secure-password',
        ]);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('already belongs to a non-admin user');

        $this->seed(AdminUserSeeder::class);
    }
}
