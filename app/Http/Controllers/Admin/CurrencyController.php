<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use DataTables;
use Log;

class CurrencyController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Currency::class, 'currency');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Currency::orderBy('id', 'DESC')->get())
                ->addColumn('name', function($currency) {
                    return $currency->name;
                })
                ->addColumn('action', function($currency) {
                    if($currency->default) 
                        return '';
                    
                    return view('admin.blocks.control-datatables', ['title' => 'currency', 'table' => 'currencies', 'model' => $currency ])->render();
                })
                ->make(true);
        }
        return view('admin.currencies.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|unique:currencies,slug|max:255',
            'name' => 'required|array',
            'symbol' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'default' => 'nullable|boolean',
        ]);

        $currency = Currency::create($request->all());
        Log::channel('db')->info('Добавлена валюта - ' . $currency->slug);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.currencies.edit', ['currency' => $currency->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency): View
    {
        return view('admin.currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency): View
    {
        return view('admin.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'slug' => ['required', 'string', 'max:255', Rule::unique('currencies')->ignore($currency->id)],
            'name' => 'required|array',
            'symbol' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'default' => 'nullable|boolean',
        ]);

        if(is_null($request->get('default')))
            $currency->update(['default' => 0]);

        $currency->update($request->all());

        if($currency->default)
           Currency::where('default', 1)->where('id', '!=', $currency->id)->update(['default' => 0]);

        Log::channel('db')->info('Обновлена валюта - ' . $currency->slug);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.currencies.edit', ['currency' => $currency->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        if($currency->default)
            return response()->json(['type' => 'error', 'msg' => __('Нельзя удалить валюту по-умолчанию')]);

        Log::channel('db')->info('Удалена валюта - ' . $currency->slug);

        $currency->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.currencies.index')]);
    }
}
