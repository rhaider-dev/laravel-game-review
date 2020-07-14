<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Games extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Game::count();
        $string = 'Games';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-trophy',
            'title'  => "{$count} {$string}",
            'text'   => __('You have '.$count.' games in your database. Click on button below to view all the games.', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'View all games',
                'link' => route('voyager.games.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        $game=\App\Game::first();
        return Auth::user()->can('browse',$game);
    }
}
