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
            $tripposts = $user->feed_tripposts()->orderBy('created_at','desc')->paginate(10);
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
            'content' => 'required',
            'title' => 'required|max:255',
            'image' => 'image|max:2048'
        ]);
        
        // 画像パスの初期化
        $imagePath = null;
        // 画像がアップロードされた場合の処理
        if ($request->hasFile('image')) {
            // 画像をストレージに保存
            $imagePath = $request->file('image')->store('public/img');
        }
        
        $request->user()->tripposts()->create([
            'content' => $request->content,
            'title' => $request->title,
            'image' => $imagePath,
            
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
    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'img';

        // アップロードされたファイル名を取得
        $file_name = $request->file('file')->getClientOriginalName();

        // 取得したファイル名で保存
        // storage/app/public/img任意のディレクトリ名/
        $request->file('file')->storeAs('public/img' . $dir, $file_name);

        return redirect('/');
    }
}
