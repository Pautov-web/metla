<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use DataTables;
use Log;

class FeedbackController extends Controller
{
    public function __construct() 
    {
        $this->authorizeResource(Feedback::class, 'feedback');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Feedback::query())
                ->addColumn('name', function($feedback) {
                    return !$feedback->read ? sprintf('<strong>%s</strong>', $feedback->name) : $feedback->name;
                })
                ->addColumn('email', function($feedback) {
                    return !$feedback->read ? sprintf('<strong>%s</strong>', $feedback->email) : $feedback->email;
                })
                ->addColumn('id', function($feedback) {
                    return !$feedback->read ? sprintf('<strong>%s</strong>', $feedback->id) : $feedback->id;
                })
                ->addColumn('action', function($feedback) {
                    return view('admin.blocks.control-datatables', ['title' => 'feedback', 'table' => 'feedback', 'model' => $feedback ])->render();
                })
                ->rawColumns(['action', 'id', 'email', 'name'])
                ->make(true);
        }
        return view('admin.feedback.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback): View
    {
        if(!$feedback->read) {
            Log::channel('db')->info('Прочитан вопрос от пользователя - ID:' . $feedback->id);
            $feedback->update(['read' => 1]);
        }
        
        return view('admin.feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback): View
    {
        if(!$feedback->read) {
            Log::channel('db')->info('Прочитан вопрос от пользователя - ID:' . $feedback->id);
            $feedback->update(['read' => 1]);
        }

        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'msg' => 'required|string|max:500',
        ]);

        $feedback->update($request->all());

        Log::channel('db')->info('Обновлен вопрос от пользователя - ID:' . $feedback->id);

        return response()->json(['type' => 'success', 'msg' => __('Сохранено'), 'route' => route('admin.feedback.edit', ['feedback' => $feedback->id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        Log::channel('db')->info('Удален вопрос от пользователя - ID:' . $feedback->id);

        $feedback->delete();
        return response()->json(['type' => 'success', 'msg' => __('Удален'), 'route' => route('admin.feedback.index')]);
    }
}
