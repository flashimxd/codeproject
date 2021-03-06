<?php

namespace codeproject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \codeproject\Repositories\ClientRepository::class,
            \codeproject\Repositories\ClientRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\ProjectRepository::class,
            \codeproject\Repositories\ProjectRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\ProjectNoteRepository::class,
            \codeproject\Repositories\ProjectNoteRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\ProjectMembersRepository::class,
            \codeproject\Repositories\ProjectMembersRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\ProjectTaskRepository::class,
            \codeproject\Repositories\ProjectTaskRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\UserRepository::class,
            \codeproject\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \codeproject\Repositories\ProjectFileRepository::class,
            \codeproject\Repositories\ProjectFileRepositoryEloquent::class
        );
    }
}
