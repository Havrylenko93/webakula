<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
            ->select('*')
            ->orderBy('time', 'desc')
            ->paginate(env('PAGINATE_COUNT', 10));

        return view('admin', ['comments' => $comments]);
    }

    public function unpublish(Request $request)
    {
        DB::table('comments')
            ->where('id', (int)$request->id)
            ->update(['visible' => 0]);
        return redirect()->route('indexadmin');
    }

    public function publish(Request $request)
    {
        DB::table('comments')
            ->where('id', (int)$request->id)
            ->update(['visible' => 1]);
        return redirect()->route('indexadmin');
    }

    public function delete(Request $request)
    {
        DB::table('comments')->where('id', (int)$request->id)->delete();

        return redirect()->route('indexadmin');
    }
}
