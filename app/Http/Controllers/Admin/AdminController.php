<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminCollection;
use App\Models\Admin;
use App\Http\Resources\Admin as AdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    private $role = ['role' => 'admins'];
    /**
     * Display a listing view of the resource.
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
     * @return AdminCollection
     */
    public function list()
    {
        return new AdminCollection(Admin::all());
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
     * @param AdminRequest $request
     * @return Response
     */
    public function store(AdminRequest $request)
    {
        Admin::create($request->validated());
        return response(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Admin  $admin
     * @return AdminResource
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Admin  $admin
     * @return Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Admin  $admin
     * @return Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
