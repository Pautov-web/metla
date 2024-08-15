<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use DataTables;
use Log;

class UserController extends Controller
{

    public function __construct() 
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(User::query())
                ->addColumn('role_id', function($user) {
                    return $user->role->name;
                })
                ->addColumn('phone', function($user) {
                    return $user->phone ?? __('Отсутвует');
                })
                ->addColumn('email', function($user) {
                    return $user->email ?? __('Отсутвует');
                })
                ->addColumn('name', function($user) {
                    return $user->name ?? __('Отсутвует');
                })
                ->addColumn('action', function($user) {
                    return view('admin.blocks.control-datatables', ['title' => 'user', 'table' => 'users', 'model' => $user ])->render();
                })
                ->make(true);
        }
        return view('admin.users.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = \App\Models\Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->safe()->except(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']));

        foreach ($request->safe()->only(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']) as $key => $value) {
            if ($request->hasFile($key)) {
                if (!is_null($user->$key)) 
                    Storage::disk('private')->delete($user->$key);

                $value = $request->file($key)->store('', 'private');

                $user->$key = $value;
            }
        }

        $user->save();

        Log::channel('db')->info('Добавлен пользователь - ID:' . $user->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.users.edit', ['user' => $user->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = \App\Models\Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->safe()->except(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']));

        foreach ($request->safe()->only(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']) as $key => $value) {
            if ($request->hasFile($key)) {
                if (!is_null($user->$key)) 
                    Storage::disk('private')->delete($user->$key);

                $value = $request->file($key)->store('', 'private');

                $user->$key = $value;
            }
        }

        $user->save();

        Log::channel('db')->info('Обновлен пользователь - ID:' . $user->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.users.edit', ['user' => $user->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $files = ['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo'];
        foreach ($files as $value) {
            if (!is_null($user->$value)) 
                Storage::disk('private')->delete($user->$value);
        }

        Log::channel('db')->info('Удален пользователь - ID:' . $user->id);

        $user->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.users.index')]);
    }
}
