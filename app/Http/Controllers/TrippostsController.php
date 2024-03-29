<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trippost;

class TrippostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tripposts = $user->tripposts()->orderBy('created_at','desc')->paginate(10);
            $data = [
                'user' => $user,
                'tripposts' => $tripposts,
                ];
    }
    return view('dashboard', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $request->user()->tripposts()->create([
            'content' => $request->content,
            'title' => $request->title,
            'image' => $request->image,
            
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $trippost = \App\Models\Trippost::findOrFail($id);
        
        if (\Auth::id() === $trippost->user_id) {
            $trippost->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
}
