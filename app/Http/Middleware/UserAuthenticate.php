<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Album;

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
        $albumId = $request->route()->parameter('albumId');

        if(isset($mediaId)) {

            $media = Media::find($mediaId);

            $userMedia = $media->user;

            if ($loggedIn == $userMedia || $loggedIn->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/');
            }

        } else if (isset($albumId)) {

            $album = Album::find($albumId);

            $userAlbum = $album->user;

            if ($loggedIn == $userAlbum || $loggedIn->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/');
            }
            
        }
    }
}
