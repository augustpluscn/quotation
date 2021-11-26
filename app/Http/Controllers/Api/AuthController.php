<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api;
use App\Models\UserJwt;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $miyao = request()->input('miyao');
        $username = request()->input('username');
        $password = request()->input('password');

        if (!$miyao || !$username || !$password) {
            return $this->failed('秘钥账号密码不能为空');
        }

        $user = UserJwt::where([
            ['miyao', $miyao],
            ['erpUser', $username],
            ['erpPwd', $password],
        ])->first();
        if (!$user) {
            return $this->failed('秘钥账号密码错误');
        }

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            auth('api')->logout();
        } catch (TokenExpiredException $exception) {
        }
        return $this->success(['msg' => '登出成功']);
    }

    /**
     * Refresh a token.
     * 刷新token，如果开启黑名单，以前的token便会失效。
     * 值得注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $payload = auth('api')->payload();

        return $this->success([
            'access_token' => 'bearer ' . $token,
            'token_type' => 'bearer',
            'expires' => $payload('exp'),
        ]);
    }
}
