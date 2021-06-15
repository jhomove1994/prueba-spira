<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Supports\MessagesResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function index()
    {
        return $this->successResponse(User::whereHas("roles", function($q){ $q->where("name", "alumno"); })->paginate(10));
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $user->assignRole(User::ROLE_STUDENT);
        return $this->successResponse($user, sprintf(MessagesResponse::RESOURCE_CREATED, 'el usuario'), Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        return $this->successResponse($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        return $this->successResponse(null, sprintf(MessagesResponse::RESOURCE_UPDATED, 'el usuario'), Response::HTTP_OK);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->successResponse(null, sprintf(MessagesResponse::RESOURCE_DELETED, 'el usuario'), Response::HTTP_OK);
    }
}
