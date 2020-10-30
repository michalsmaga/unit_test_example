<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Validator;
use App\Helpers;

class ItemIdValidatorMiddleware
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
        $route = $request->route();
        $itemId = $route[2]['itemId'];

        $toValidate = ['id' => $itemId];
        $validationRules = ['id' => 'required|numeric'];
        $validator = Validator::make($toValidate, $validationRules);

        if ($validator->fails()) {
            return Helpers\ResponseHelper::make(400, $validator->errors()->__toString());
        }

        return $next($request);
    }
}
