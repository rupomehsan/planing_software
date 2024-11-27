<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if token exists in the request headers
        // $token = $request->header('Authorization') ?: $request->bearerToken();
        // dd( $token );
        // if (!$token) {
        //     return redirect()->route('login');
        // }

        // // Extract the token value
        // $token = str_replace('Bearer ', '', $token);

        // // Validate the token
        // $tokenRepository = app(TokenRepository::class);
        // $token = $tokenRepository->findValidToken($request->user(), $token);

        // if (!$token) {
        //     return redirect()->route('login');
        // }

        // // Authenticate the user
        // Auth::setUser($token->user);

        return $next($request);
    }
}
