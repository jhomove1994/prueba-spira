<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCoursesStoreRequest;
use App\Models\Course;
use App\Models\User;
use App\Supports\MessagesResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends ApiController
{
    //
    public function index(User $user)
    {
        return $this->successResponse($user->courses()->paginate(10));
    }

    public function store(UserCoursesStoreRequest $request, User $user)
    {
        $user->courses()->sync($request->courses);

        return $this->successResponse($user->courses(), sprintf(MessagesResponse::RESOURCE_ASIGNED, 'el/los cursos', 'al usuario'), Response::HTTP_CREATED);
    }

    public function destroy(User $user, Course $course)
    {
        $user->courses()->detach($course->id);

        return $this->successResponse(null, MessagesResponse::RESOURCE_DEALLOCATED, Response::HTTP_OK);
    }

    public function me()
    {
        return $this->successResponse(Auth::user()->courses);
    }
}
