<?php

namespace TCG\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
class PostDimmer extends BaseDimmer
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
       
        $count = \TCG\Voyager\Models\Order::sum('total');
         // echo "<pre>"; print_r($order); die();

        $string = 'Doanh thu';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$string} ".Helper::Numberformat($count)." ",
            'text'   => __('voyager::dimmer.post_text', ['string' => Str::lower($string),'count' => Helper::Numberformat($count) ]),
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.orders.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}
