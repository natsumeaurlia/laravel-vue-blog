<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

/**
 * sampleアプリケーションなので定期的にデータを削除したいがherokuだとschedulerに制限があるので
 * 外部から削除できるようにする
 *
 */
class ResetTablesController extends Controller
{
    public function clear(Request $request)
    {
        if (App::environment('heroku')) {
            return response()->json(['result' => false, 'message' => 'failed environment'], 403);
        }
        if ($request->key !== config('app.key')) {
            return response()->json(['result' => false, 'message' => 'missing key'], 403);
        }
        Artisan::call('migrate:fresh --seed');
        return response()->json(['result' => true, 'message' => 'success delete'], 200);
    }
}
