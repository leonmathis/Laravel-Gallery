<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Media;
use App\Models\Album;
use Illuminate\Support\Facades\File; 

class UserController extends Controller
{
    public function edit() {
        $user = auth()->user();

        return view('edit', [
            'user' => $user, 
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required|min:1|max:255',
            'lastname' => 'required|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);

        $user = auth()->user();

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->description;

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        return redirect('/');
    }

    public function detail() {
        $users = User::all();
        $medias = Media::all();
        $albums = Album::all();

        return view('admin', [
            'users' => $users, 
            'medias' => $medias, 
            'albums' => $albums,
        ]);
    }
    
    public function deleteUser(int $userId) {
        $user = User::find( $userId );
        $media = Media::where('user_id', $userId)->get();

        if (isset($media)) {
            $filepath = "images/{$media->each->path}";
            File::delete($filepath);
            $media->each->delete();
        }

        $user->delete();

        return redirect('/admin');
    }

    public function editUser(int $userId) {
        $user = User::find( $userId );

        return view('edit', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, int $userId)
    {
        $validated = $request->validate([
            'firstname' => 'required|min:1|max:255',
            'lastname' => 'required|min:1|max:255',
            'email' => 'required|email|min:1|max:20',
            'password' => 'required|min:10',
        ]);

        $user = User::find( $userId );

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->password;

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        return redirect('/admin');
    }
}
