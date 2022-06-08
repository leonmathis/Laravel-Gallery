<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Album;

class AdminController extends Controller
{
    public function detailAlbum( int $userId ) {
        $albums = Album::where('user_id', $userId)->get();

        return view('adminAlbum', [
            'albums' => $albums,
        ]);
    }
}
