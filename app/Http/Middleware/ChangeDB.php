<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

// 注意，我们要继承的是 jwt 的 BaseMiddleware
class ChangeDB extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @throws \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth('api')->user();
        $miyao = $user->miyao;
        //数据库
        $db = DB::table('dbConect')->where('miyao', $miyao)->first();

        $conn = json_decode($db->dbconnect);

        \Config::set('database.connections.cus.host', $conn->server);
        \Config::set('database.connections.cus.port', $conn->port);
        \Config::set('database.connections.cus.database', $conn->database);
        \Config::set('database.connections.cus.username', $conn->uid);
        \Config::set('database.connections.cus.password', $conn->pwd);

        DB::purge('cus');

        return $next($request);

    }
}
