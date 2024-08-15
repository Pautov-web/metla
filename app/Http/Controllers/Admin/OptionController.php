<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use DataTables;
use Log;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Option::query())
                ->addColumn('name', function($option) {
                    return $option->name;
                })
                ->addColumn('action', function($option) {
                    return view('admin.blocks.control-datatables', ['title' => 'option', 'table' => 'options', 'model' => $option ])->render();
                })
                ->make(true);
        }
        return view('admin.options.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
            'icon' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'time' => 'required|numeric|min:0',
            'min' => 'nullable|numeric|min:1',
            'max' => 'nullable|numeric|min:1',
        ]);

        $option = Option::create($request->all());

        Log::channel('db')->info('Добавлена опция услуги - ID:' . $option->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.options.edit', ['option' => $option->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option): View
    {
        return view('admin.options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option): View
    {
        return view('admin.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $option)
    {
        $request->validate([
            'name' => 'required|array',
            'icon' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'time' => 'required|numeric|min:0',
            'min' => 'nullable|numeric|min:1',
            'max' => 'nullable|numeric|min:1',
        ]);

        $option->update($request->all());

        Log::channel('db')->info('Обновлена опция услуги - ID:' . $option->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.options.edit', ['option' => $option->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        Log::channel('db')->info('Удалена опция услуги - ID:' . $option->id);

        $option->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.options.index')]);
    }
}
