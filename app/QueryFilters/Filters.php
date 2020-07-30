<?php

namespace App\QueryFilters;

use Closure;

class Filters
{
    public function handle($request, Closure $next)
    {
        if (request()->has('active')) {
            $request->where('active', request()->active);
        }
        
        if (request()->has('sort')) {
            $request->orderBy('title', request()->sort);
        }

        if (request()->has('maxcount')) {
            $request->take(request()->maxcount);
        }
        
        return  $next($request);
    }
}