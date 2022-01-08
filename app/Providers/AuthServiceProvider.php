<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    //grant:'password'
    //client_id:6
    //client_secret:298Dw7s8YToVl0x67QyyfqZVpm8w6dsRMPQEwMuS
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Animal::class => AnimalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerPolicies();

        Passport::routes();

        // access_token 設定核發後15天後過期
        Passport::tokensExpireIn(now()->addDays(15));

        // refresh_token 設定核發後30天後過期
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
