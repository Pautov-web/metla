<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Logger;
use DataTables;

class LoggerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Logger::query())
                ->addColumn('user_id', function($logger) {
                    return is_null($logger->user_id) ? __('Отсутсвует') : 'ID:' . $logger->user_id;
                })
                ->make(true);
        }
        return view('admin.loggers');
    }
}
