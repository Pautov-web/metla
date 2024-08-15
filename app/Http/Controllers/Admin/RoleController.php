<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use DataTables;
use Log;

class RoleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Role::class, 'role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Role::orderBy('id', 'DESC')->get())
                ->addColumn('action', function($role) {
                    if(in_array($role->id, [1, 2, 3]) ) 
                        return '';
                    return view('admin.blocks.control-datatables', ['title' => 'role', 'table' => 'roles', 'model' => $role ])->render();
                })
                ->make(true);
        }
        return view('admin.roles.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = \App\Models\Permission::select('id', 'name')->get();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($request->except('permissions'));

        $role->permissions()->attach($request->get('permissions'));
        Log::channel('db')->info('Добавлена роль - ' . $role->name);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.roles.edit', ['role' => $role->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = \App\Models\Permission::select('id', 'name')->get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)],
            'permissions' => 'required|array',
        ]);

        $role->update($request->except('permissions'));

        $role->permissions()->sync($request->get('permissions'));
        Log::channel('db')->info('Обновлена роль - ' . $role->name);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.roles.edit', ['role' => $role->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Log::channel('db')->info('Удалена роль - ' . $role->name);
        $role->users()->update(['role_id' => 1]);
        $role->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.roles.index')]);
    }
}
