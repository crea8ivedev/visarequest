<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ContactUs;
use App\Models\MetaPage;
use App\Models\Country;
use View;

class HeaderData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $address = ContactUs::latest()->first();
        $metaData = MetaPage::first();
        $country_list = Country::get();
        View::share('metaData', $metaData);
        View::share('country_list', $country_list);
        View::share('comman_address', $address);
        return $next($request);
    }
}