<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Bank;

class BanqueDimmer extends BaseDimmer
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

      $count = Bank::count();
      $string = ' Banque';

      return view('voyager::dimmer', array_merge($this->config, [
          'icon'   => 'voyager-group',
          'title'  => "{$string}",
          'text'   => 'en cours de développement',
          'button' => [
            'text' => "Voir mes {$string}",
            'link' => route('voyager.banks.index'),
          ],
          // 'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
          // 'button' => [
          //     'text' => __('voyager::dimmer.user_link_text'),
          //     'link' => route('voyager.users.index'),
          // ],
          'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
      ]));

    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
        // return Auth::user()->can('browse', \App\Contact::class );
    }
}
