<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiAuth
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
        $time = $request->time;
        $sign = $request->sign;
        //验证
        $key = config('api.apikey');
        $signCheck = \md5(strtolower($time . $key));
        if ($sign != $signCheck) {
            return response()->json(['code' => 400, 'msg' => 'api秘钥验证失败']);
        }

        return $next($request);
    }
}
