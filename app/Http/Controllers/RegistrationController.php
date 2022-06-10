<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class RegistrationController extends Controller
{
    public function store(RegistrationRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password1;

        $user->save();
        return response()
            ->json(['success' => 'Data is successfully added']);
    }
}
