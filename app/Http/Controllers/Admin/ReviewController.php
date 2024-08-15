<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use DataTables;
use Log;

class ReviewController extends Controller
{
    public function __construct() 
    {
        $this->authorizeResource(Review::class, 'review');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Review::query())
                ->addColumn('rating', function($review) {
                    return $review->instagram ? __('Отзыв в instagram') : view('admin.blocks.rating', ['rating' => $review->rating])->render();
                })
                ->addColumn('name', function($review) {
                    return $review->instagram ? __('Отзыв в instagram') : $review->name;
                })
                ->addColumn('action', function($review) {
                    return view('admin.blocks.control-datatables', ['title' => 'review', 'table' => 'reviews', 'model' => $review ])->render();
                })
                ->rawColumns(['action', 'rating'])
                ->make(true);
        }
        return view('admin.reviews.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|max:5|min:1',
            'publish' => 'required|boolean',
            'instagram' => 'required|boolean',
            'file' => 'nullable|file|image|max:4000|dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000',
        ]);

        $review = Review::create($request->except(['file']));

        if ($request->hasFile('file')) {
            $review->file = $request->file('file')->store('uploads/reviews');
            $review->save();
        }

        Log::channel('db')->info('Добавлен отзыв - ID:' . $review->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.reviews.edit', ['review' => $review->id])]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review): View
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review): View
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|max:5|min:1',
            'publish' => 'required|boolean',
            'instagram' => 'required|boolean',
            'file' => 'nullable|file|image|max:4000|dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000',
        ]);

        $review->update($request->except(['file']));

        if ($request->hasFile('file')) {
            if (!is_null($review->file)) 
                Storage::disk('public')->delete($review->file);

            $review->update([
                'file' => $request->file('file')->store('uploads/reviews'),
            ]);
        }

        Log::channel('db')->info('Обновлен отзыв - ID:' . $review->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.reviews.edit', ['review' => $review->id])]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if (!is_null($review->file)) 
            Storage::disk('public')->delete($review->file);

        Log::channel('db')->info('Удален отзыв - ID:' . $review->id);

        $review->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.reviews.index')]);
    }
}
