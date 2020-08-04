<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ContactUs;
use App\Models\MetaPage;
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
        View::share('metaData', $metaData);
        View::share('comman_address', $address);
        return $next($request);
    }
}