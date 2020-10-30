<?php


namespace App\Http\Middleware;


use App\Models\Item;
use Closure;
use App\Helpers;

class ItemBinderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        try {
            $route = $request->route();
            $itemId = $route[2]['itemId'];
            $items = Item::withId($itemId)->get();

            if ($items->count() === 0) {
                return Helpers\ResponseHelper::make(410, 'Item does not exist.');
            } else if ($items->count() > 1) {
                return Helpers\ResponseHelper::make(409, 'To many items.');
            }

            $route[2]['item'] = $items->first();
            $request->setRouteResolver(function () use ($route) {
                return $route;
            });

            return $next($request);
        } catch (\Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }
}
