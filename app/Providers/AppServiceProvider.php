<?php

namespace MyTailor\Providers;

use MyTailor\View\Composers;
use MyTailor\View\ThemeViewFinder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()  {

        /*
         * Services we need for admin
         */
        $this->app['view']->composer([
            'layouts.template.admin.default',
            'layouts.template.admin.page-with-aside']
                    ,Composers\AddAdminUser::class);
        $this->app['view']->composer('layouts.upload', Composers\AddAdminUser::class);

        /*
         * Services we need for FrontEnd
         */

        $this->app['view']->composer('layouts.template.frontend.default', Composers\InjectPages::class);

        /*
         * Theme View finder service
         */
        $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }

        $this->app->singleton('theme.finder', function($app){

                $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);

                $config = $app['config']['cms.theme'];

                $finder->setBasePath($app['path.public'] .'/'. $config['folder']);

                $finder->setActiveTheme($config['active']);

                return $finder;
        });
    }
}
