<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function store(RegistrationRequest $request): JsonResponse
    {
        $request->validated();

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = $request->get('password1');

        $user->save();
        return response()
            ->json(['success' => 'User is successfully added']);
    }
}
