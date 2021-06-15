<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Supports\MessagesResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends ApiController
{
    
    public function index()
    {
        return $this->successResponse(Course::paginate(10));
    }

    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());
        return $this->successResponse($course, sprintf(MessagesResponse::RESOURCE_CREATED, 'el curso'), Response::HTTP_CREATED);
    }

    public function show(Course $course)
    {
        return $this->successResponse($course);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $this->successResponse(null, sprintf(MessagesResponse::RESOURCE_UPDATED, 'el curso'), Response::HTTP_OK);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return $this->successResponse(null, sprintf(MessagesResponse::RESOURCE_DELETED, 'el curso'), Response::HTTP_OK);
    }
}
