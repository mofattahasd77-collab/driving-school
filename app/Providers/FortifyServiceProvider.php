<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView(fn () => view('admin.login'));

        Fortify::authenticateUsing(function (Request $request): ?User {
            $email = Str::lower(trim($request->input(Fortify::username())));
            $user = User::query()
                ->where('email', $email)
                ->where('is_admin', true)
                ->first();

            return $user && Hash::check($request->input('password'), $user->password)
                ? $user
                : null;
        });

        RateLimiter::for('login', function (Request $request) {
            $username = $request->input(Fortify::username());
            $username = is_string($username) ? Str::lower($username) : '';
            $throttleKey = Str::transliterate($username.'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });
    }
}
