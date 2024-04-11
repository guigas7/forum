<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
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
        // Remove data object from json response
        JsonResource::withoutWrapping();
        // Prevent lazy loading
        Model::preventLazyLoading();
        // Disable mass assignment protection
        Model::unguard();
        // Register the CommentPolicy
        Gate::policy(Comment::class, CommentPolicy::class);
    }
}
