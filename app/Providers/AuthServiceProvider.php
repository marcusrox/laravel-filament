<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Bypassar autenticação em DEV
        if (config('app.env') === 'local') {
            if (Schema::hasTable('users')) {
                // $user = \App\Models\User::newModelInstance([
                //     'name' => 'Suporte ByPass',
                //     'email' => 'suporte@idevs.com.br',
                //     'password' => Hash::make('12345678'),
                // ]);
                $user = \App\Models\User::find(1);
                if ($user) {
                    Auth::login($user);
                }
            }
        }

    }
}
