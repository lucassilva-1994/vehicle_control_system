<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        
    ];

    public function boot(): void
    {
        Gate::before(function(User $user,$permission){
            if($user->roles->pluck('name')->contains($permission)){
                return true;
            }
        });

        Gate::define('only_admin',function(User $user){
            if($user->isAdmin){
                return true;
            }
            abort(403,'Não autorizado');
        });
    }
}
