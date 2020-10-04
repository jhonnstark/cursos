<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Http\Resources\TeacherCollection;
use App\Models\Teacher;
use App\Http\Resources\Teacher as TeacherResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;

class TeacherController extends Controller
{

    /**
     * Display a listing view of the resource.
     */
    private $role = ['role' => 'teacher'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.list', $this->role);
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function list()
    {
        return new TeacherCollection(Teacher::all());
    }

    /**
     * Display a register form of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.register', $this->role);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TeacherRequest $request)
    {
        $record = $request->validated();
        $record['password'] = Hash::make($record['password']);
        Teacher::create($record);
        return response()->json([
            'status' => 201,
            'message' => 'created',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Teacher $teacher
     * @return TeacherResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Teacher $teacher)
    {
        if ($request->wantsJson()) {
            return new TeacherResource($teacher);
        }
        $role = $this->role['role'];
        $id = $teacher->id;
        return view('admin.edit', compact('role', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherUpdateRequest $request
     * @param Teacher $teacher
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update admin'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher $teacher
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json([
            'status' => 204,
            'message' => 'Deleted teacher'
        ],204 );
    }
}
