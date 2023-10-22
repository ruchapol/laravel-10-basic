<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {

        $path = $request->file('avatar')->store('avatars', 'public');
        // Storage::disk('public')->put($path, $contents);

        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path ]);


        return response()->redirectTo(route('profile.edit'))->with('message', 'Avatar is changed.');
    }
}
