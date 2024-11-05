<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;


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
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('courses')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('groups')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('students')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('teachers')
        );


        TwillNavigation::addLink(
            NavigationLink::make()->forModule('lessons')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('homeworks')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('solutions')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('grades')
        );
    }
}
