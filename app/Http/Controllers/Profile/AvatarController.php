<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {

    

        return response()->redirectTo(route('profile.edit'))->with('message', 'Avatar is changed.');
    }
}
