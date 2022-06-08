<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Media;
use Illuminate\Support\Facades\File; 

class AlbumController extends Controller
{
    public function index() {

        $albums = Album::all();

        return view('home', [
            'albums' => $albums, 
        ]);

    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required', 
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $album = new Album();

        $userid = auth()->user()->id;

        $album->name = $request->name;
        $album->user_id = $userid;
        $album->cover = $newImageName;

        $album->save();

        return redirect('/');
    }

    public function edit(int $albumId) {
        $album = Album::find($albumId);

        return view('albumEdit', [
            'album' => $album, 
        ]);
    }

    public function update(Request $request, int $albumId) {
        $validated = $request->validate([
            'name' => 'required|min:1|max:255',
        ]);

        $album = Album::find( $albumId );

        $name = $request->name;

        $album->name = $name;

        $album->save();

        return redirect('/');
    }

    public function delete(int $albumId) {
        $image = Album::find( $albumId );
        $filepath = "images/{$image->cover}";

        File::delete($filepath);

        $image->delete();

        return redirect('/');
    }

    public function detail(int $albumId) {
        $album = Album::find($albumId);
        
        $medias = Media::where('album_id', $albumId)->get();

        return view('view', [
            'album' => $album, 
            'medias' => $medias
        ]);
    }
}
