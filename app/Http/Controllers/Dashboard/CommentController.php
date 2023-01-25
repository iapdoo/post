<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CommentController extends Controller
{

    public function store(Request $request)
    {

        try {
            Comment::create($request->all());
            return redirect()->back();
        }catch (\Exception $exception){
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }


    public function destroy($id)
    {

        try {
            $comment=Comment::find($id);
            if (!$comment){
                return view('errors.404');
            }
            $comment->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }
}
