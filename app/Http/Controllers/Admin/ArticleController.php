<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use DataTables;
use Log;

class ArticleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Article::class, 'article');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Article::query())
                ->addColumn('name', function($article) {
                    return $article->name;
                })
                ->addColumn('publish', function($article) {
                    return $article->publish ? __('Опубликовано') : __('Черновик');
                })
                ->addColumn('user_id', function($article) {
                    return is_null($article->user_id) ? __('Отсутсвует') : view('admin.blocks.link', ['href' => route('admin.users.show', ['user' => $article->user_id]), 'text' => 'USER ID:'.$article->user_id])->render();
                })
                ->addColumn('action', function($article) {
                    return view('admin.blocks.control-datatables', ['title' => 'article', 'table' => 'articles', 'model' => $article ])->render();
                })
                ->rawColumns(['action', 'user_id'])
                ->make(true);
        }
        return view('admin.articles.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
            'slug' => 'required|string|max:255|regex:/^[0-9a-z\-\_]+$/i|unique:articles,slug',
            'content' => 'required|array',
            'img' => 'required|file|image|max:4000|dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000',
            'publish' => 'required|boolean',
        ]);

        $data = $request->except(['img']);
        $data['user_id'] = $request->user()->id;

        if ($request->hasFile('img'))
            $data['img'] = $request->file('img')->store('uploads/articles');

        $article = Article::create($data);
        Log::channel('db')->info('Добавлена статья - ID:' . $article->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.articles.edit', ['article' => $article->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|array',
            'slug' => ['required', 'string', 'max:255', 'regex:/^[0-9a-z\-\_]+$/i', Rule::unique('articles')->ignore($article->id)],
            'content' => 'required|array',
            'img' => 'nullable|file|image|max:4000|dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000',
            'publish' => 'required|boolean',
        ]);

        $article->update($request->except(['img']));

        if ($request->hasFile('img')) {
            if (!is_null($article->img)) 
                Storage::disk('public')->delete($article->img);

            $article->update([
                'img' => $request->file('img')->store('uploads/articles'),
            ]);
        }

        Log::channel('db')->info('Обновлена статья - ID:' . $article->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.articles.edit', ['article' => $article->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Log::channel('db')->info('Удалена статья - ID:' . $article->id);

        $article->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.articles.index')]);

    }
}
