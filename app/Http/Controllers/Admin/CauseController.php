<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cause;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use DataTables;
use Log;

class CauseController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Cause::class, 'cause');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Cause::orderBy('id', 'DESC')->get())
                ->addColumn('name', function($cause) {
                    return $cause->name;
                })
                ->addColumn('action', function($cause) {
                    return view('admin.blocks.control-datatables', ['title' => 'cause', 'table' => 'causes', 'model' => $cause ])->render();
                })
                ->make(true);
        }
        return view('admin.causes.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.causes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
        ]);

        $cause = Cause::create($request->all());
        Log::channel('db')->info('Добавлена причина - ID:' . $cause->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.causes.edit', ['cause' => $cause->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cause $cause): View
    {
        return view('admin.causes.show', compact('cause'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cause $cause): View
    {
        return view('admin.causes.edit', compact('cause'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cause $cause)
    {
        $request->validate([
            'name' => 'required|array',
        ]);

        $cause->update($request->all());

        Log::channel('db')->info('Обновлена причина - ID:' . $cause->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.causes.edit', ['cause' => $cause->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cause $cause)
    {
        Log::channel('db')->info('Удалена причина - ID:' . $cause->id);

        $cause->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.causes.index')]);
    }
}
