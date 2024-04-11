@extends('layouts.app')

@section('content')

        <div class="prose bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10 max-w-full">
                <h2>Tripoアプリについて</h2>
            </div>
            <div class="hero-content text-center my-10">
            </div>
            <div class="hero-content text-center my-10">
            </div>
        </div>
        
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 mb-10 w-14">
                    <h2>Tripoアプリについて</h2>
                    <h3>メッセージング機能</h3>
                    <p>目的地や日程、予算などの条件を指定して、検索を行います。さらに、フィルタリングオプションを使って、好みに合った宿泊施設を絞り込みます。</p>
                    {{-- アプリについてページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
                <div class="flex-1 w-64 mb-10">
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 w-64 mb-10">
                </div>
                <div class="flex-1 mb-10 w-14">
                    <h3>ユーザー評価とレビュー</h3>
                    <p>予約する際に、リアルタイムでの空室状況の確認と即時予約が可能な機能を提供します。これにより、ユーザーが素早く宿泊施設を確保することができます。</p>
                    {{-- Tripoサービスページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 mb-10 w-14">
                    <h2>ご利用可能エリア</h2>
                    <h3>地図とナビゲーション</h3>
                    <p>目的地や日程、予算などの条件を指定して、検索を行います。さらに、フィルタリングオプションを使って、好みに合った宿泊施設を絞り込みます。</p>
                    {{-- アプリについてページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
                <div class="flex-1 w-64 mb-10">
                </div>
            </div>
        </div>
        
        <div class="prose bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10 max-w-full">
                <h2>よくある質問</h2>
            </div>
            <div class="hero-content text-center my-10">
            </div>
            <div class="hero-content text-center my-10">
            </div>
        </div>
        
@endsection