<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FeedbackController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
            ->select('*')
            ->where('visible', 1)
            ->orderBy('time', 'desc')
            ->paginate(env('PAGINATE_COUNT', 10));

        return view('feedback', ['comments' => $comments]);
    }

    public function saveComment(Request $request)
    {
        $file = $request->file('file');
        $filename = time().$file->getClientOriginalName();
        $file->move('img', $filename);

        $result = DB::table('comments')->insert(
            ['name' => $request->name,
             'email' => $request->email,
             'text' => $request->text,
             'avatar' => $filename
            ]
        );

        if($result) {
            return "success";
        }else{
            return "error";
        }
    }
}
