<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // バリデーションルールを定義
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'about' => 'required|string|max:1000',
        ];

        // バリデーションを実行
        $request->validate($rules);

        // バリデーションが成功した場合は、フォームの入力値を取得
        $name = $request->input('name');
        $email = $request->input('email');
        $about = $request->input('about');

        // ここでフォームの入力値を使って何らかの処理を行います

        // フォーム送信後にリダイレクトする場合は、リダイレクト先を指定します
        return redirect()->back()->with('success', 'お問い合わせを受け付けました。ありがとうございます！');
    }
}
