<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Furniture;
use App\Models\Process;
use App\Models\Status;
use Blade;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.status', 'status');
        Blade::component('components.process', 'process');

        $this->registerComposers();
    }

    /**
     * @return void
     */
    protected function registerComposers()
    {
        /**
         * Статусы
         */
        view()->composer(['ticket.*', 'components.status'], function () {
            /** @var \Illuminate\Support\Collection $data */
            $data = cache()->remember('view-statuses', 10, function () {
                return Status::all()->keyBy('id')->each(function ($item) {
                    /** @var Status $item */
                    return $item->setAttribute('title', $item->getTitleAttribute());
                });
            });

            view()->share([
                'statuses' => $data,
                'statusFileds' => $data->pluck('title', 'id')->toArray(),
            ]);
        });

        /**
         * Процессы заявок
         */
        view()->composer(['processes.*', 'ticket.*', 'components.process'], function () {
            /** @var \Illuminate\Support\Collection $data */
            $data = cache()->remember('view-processes', 10, function () {
                return Process::all()->keyBy('id')->each(function ($item) {
                    /** @var Process $item */
                    return $item->setAttribute('title', $item->getTitleAttribute());
                });
            });

            view()->share([
                'processes' => $data,
                'processFileds' => $data->pluck('title', 'id')->toArray(),
            ]);
        });

        /**
         * Мебель
         */
        view()->composer(['furniture.*', 'ticket.*', 'components.furniture'], function () {
            /** @var \Illuminate\Support\Collection $data */
            $data = cache()->remember('view-furniture', 60, function () {
                return Furniture::all()->keyBy('id')->each(function ($item) {
                    /** @var Furniture $item */
                    return $item->setAttribute('title', $item->getTitleAttribute());
                });
            });

            view()->share([
                'furniture' => $data,
                'furnitureFileds' => $data->pluck('title', 'id')->toArray(),
            ]);
        });


        /**
         * Категории
         */
        view()->composer(['*'], function () {
            /** @var \Illuminate\Support\Collection $data */
            $data = cache()->remember('view-categories', 60, function () {
                /** @noinspection PhpUndefinedMethodInspection */
                return Category::all()->toTree();
            });

            view()->share(['categories' => $data]);
        });
    }
}
