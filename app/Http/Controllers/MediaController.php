<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Media;
use App\Models\Album;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function create(Request $request, int $albumId) {
        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $userId = auth()->user()->id;

        $media = new Media();

        $media->user_id = $userId;
        $media->album_id = $albumId;
        $media->name = $request->name;
        $media->description = $request->description;
        $media->path = $newImageName;

        $media->save();

        return redirect('/album/view/'.$albumId);
    }

    public function edit(int $mediaId) {
        $media = Media::find($mediaId);

        return view('imageEdit', [
            'media' => $media, 
        ]);
    }

    public function update(Request $request, int $mediaId) {
        $validated = $request->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:1|max:255',
        ]);

        $media = Media::find( $mediaId );

        $name = $request->name;
        $description = $request->description;

        $media->name = $name;
        $media->description = $description;

        $media->save();

        return redirect('/');
    }

    public function delete(int $mediaId) {
        $image = Media::find( $mediaId );
        $filepath = "images/{$image->path}";

        File::delete($filepath);

        $image->delete();

        return redirect('/');
    }

    public function detail(int $albumId) {
        $album = Album::find($albumId);

        return view('upload', [
            'album' => $album,
        ]);
    }

    public function show(int $mediaId) {
        $media = Media::find($mediaId);

        return view('show', [
            'media' => $media,
        ]);
    }

    public function mygallery() {
        $userId = auth()->user()->id;

        $medias = Media::where('user_id', $userId)->get();

        return view('mygallery', [
            'medias' => $medias,
        ]);
    }
}
