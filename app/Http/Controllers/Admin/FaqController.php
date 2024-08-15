<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use DataTables;
use Log;

class FaqController extends Controller
{
    public function __construct() 
    {
        $this->authorizeResource(Faq::class, 'faq');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Faq::query())
                ->addColumn('question', function($faq) {
                    return $faq->question ?? __('Отсутвует');
                })
                ->addColumn('answer', function($faq) {
                    return $faq->answer ?? __('Отсутвует');
                })
                ->addColumn('action', function($faq) {
                    return view('admin.blocks.control-datatables', ['title' => 'faq', 'table' => 'faqs', 'model' => $faq ])->render();
                })
                ->make(true);
        }
        return view('admin.faqs.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|array',
            'answer' => 'required|array',
        ]);

        $faq = Faq::create($request->all());
        Log::channel('db')->info('Добавлен FAQ - ID:' . $faq->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.faqs.edit', ['faq' => $faq->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq): View
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|array',
            'answer' => 'required|array',
        ]);

        $faq->update($request->all());

        Log::channel('db')->info('Обновлен FAQ - ID:' . $faq->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.faqs.edit', ['faq' => $faq->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        Log::channel('db')->info('Удалена валюта - ID:' . $faq->id);

        $faq->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.faqs.index')]);
    }
}
