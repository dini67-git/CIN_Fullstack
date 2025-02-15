<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Formation;
use App\Models\Inscription;
use App\Policies\PostPolicy;
use App\Policies\FormationPolicy;
use App\Policies\InscriptionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class=>PostPolicy::class,
        Formation::class=>FormationPolicy::class,
        Inscription::class=>InscriptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
