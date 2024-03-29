@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>Tripo体験記　ログイン</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">メールアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">ログイン</button>

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">はじめての方 <a class="link link-hover text-info" href="{{ route('register') }}">登録はこちら</a></p>
        </form>
    </div>
@endsection