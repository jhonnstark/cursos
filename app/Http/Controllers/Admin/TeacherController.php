<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherCollection;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
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
