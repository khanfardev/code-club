<?php

namespace App\Providers;

use App\Inter\LevelInterface;
use App\Repo\LevelRepo;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Inter\LevelInterface::class,
            \App\Repo\LevelRepo::class
        );
        $this->app->bind(
            \App\Inter\TopicInterface::class,
            \App\Repo\TopicRepo::class
        );
        $this->app->bind(
            \App\Inter\LessonInterface::class,
            \App\Repo\LessonRepo::class
        );
        $this->app->bind(
            \App\Inter\LadderInterface::class,
            \App\Repo\LadderRepo::class
        );
        $this->app->bind(
            \App\Inter\UserInterface::class,
            \App\Repo\UserRepo::class
        );
        $this->app->bind(
            \App\Inter\ProblemInterface::class,
            \App\Repo\ProblemRepo::class
        );
        $this->app->bind(
            \App\Inter\VenueInterface::class,
            \App\Repo\VenueRepo::class
        );
        $this->app->bind(
            \App\Inter\EventInterface::class,
            \App\Repo\EventRepo::class
        );
        $this->app->bind(
            \App\Inter\MeetingInterface::class,
            \App\Repo\MeetingRepo::class
        );
        $this->app->bind(
            \App\Inter\CategoryInterface::class,
            \App\Repo\CategoryRepo::class
        );
        $this->app->bind(
            \App\Inter\QuestionInterface::class,
            \App\Repo\QuestionRepo::class
        );
        $this->app->bind(
            \App\Inter\OptionInterface::class,
            \App\Repo\OptionRepo::class
        );
    }
}
