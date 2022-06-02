<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Media;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $loggedIn = auth()->user();
        $mediaId = $request->route()->parameter('mediaId');
        $media = Media::find($mediaId);
        $user = $media->user;

        if ($loggedIn == $user) {
            return $next($request);
        }

        return redirect('/');
    }
}
