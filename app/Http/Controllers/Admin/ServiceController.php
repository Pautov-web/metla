<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use DataTables;
use Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Service::query())
                ->addColumn('name', function($service) {
                    return $service->name;
                })
                ->addColumn('action', function($service) {
                    return view('admin.blocks.control-datatables', ['title' => 'service', 'table' => 'services', 'model' => $service ])->render();
                })
                ->make(true);
        }
        return view('admin.services.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
            'excerpt' => 'required|array',
            'slug' => 'required|string|max:255|regex:/^[0-9a-z\-\_]+$/i|unique:services,slug',
            'price' => 'required|numeric|min:0',
            'time' => 'required|numeric|min:0',
            'change_date' => 'required|boolean',
        ]);

        $service = Service::create($request->all());

        Log::channel('db')->info('Добавлена услуга - ID:' . $service->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.services.edit', ['service' => $service->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|array',
            'excerpt' => 'required|array',
            'slug' => ['required', 'string', 'max:255', 'regex:/^[0-9a-z\-\_]+$/i', Rule::unique('services')->ignore($service->id)],
            'price' => 'required|numeric|min:0',
            'time' => 'required|numeric|min:0',
            'change_date' => 'required|boolean',
        ]);

        $service->update($request->all());

        Log::channel('db')->info('Обновлена услуга - ID:' . $service->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.services.edit', ['service' => $service->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Log::channel('db')->info('Удалена услуга - ID:' . $service->id);

        $service->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.services.index')]);
    }
}
