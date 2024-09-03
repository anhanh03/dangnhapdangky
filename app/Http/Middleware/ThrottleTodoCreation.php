<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ThrottleTodoCreation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            $user = $request->user();
            $key = 'todo_creation_' . $user->id;

        if (!Cache::add($key, true, 3)) {
            return redirect()->route('dashboard')->with('status', 'Wait 3 seconds before adding a new todo.');
        }

        Cache::put($key, true, now()->addSeconds(3));

        return $next($request);
    }
}
