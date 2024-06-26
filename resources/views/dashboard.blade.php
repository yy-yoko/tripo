@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="sm:flex sm:gap-10 flex-col">
            <div class="sm:w-full mb-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </div>
            <div class="sm:col-span-2 mt-4">
                {{-- 投稿一覧 --}}
                @include('tripposts.tripposts')
                {{-- 投稿フォーム --}}
                @include('tripposts.form')
            </div>
        </div>
    @else
        <div class="">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 mb-10 w-14">
                    <h2>旅のマッチングプラットフォーム、Tripo</h2>
                    <p>Tripoは、ユーザーがより豊かな旅行体験をするための強力なツールです。あなたの次の旅行を計画する際に、Tripoがあなたのパートナーとなり、快適で楽しい滞在をサポートします。</p>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">はじめに</a>
                </div>
                <div class="flex-1 w-64 mb-10">
                    <!--<img alt="" loading="lazy" width="1200" height="800" decoding="async" class="h-full w-full object-cover opacity-70" style="color:transparent" srcset="">-->
                </div>
            </div>
        </div>
        <div class="prose bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10 max-w-full">
                <h2>お知らせ</h2>
            </div>
            <div class="hero-content text-center my-10">
            </div>
            <div class="hero-content text-center my-10">
            </div>
        </div>
        <div class="bg-base-200">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 mb-10 w-14">
                    <h2>Tripoアプリの使い方</h2>
                    <h3>目的地を日時を指定する</h3>
                    <p>目的地や日程、予算などの条件を指定して、検索を行います。さらに、フィルタリングオプションを使って、好みに合った宿泊施設を絞り込みます。</p>
                    {{-- アプリについてページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
                <div class="flex-1 w-64 mb-10">
                </div>
            </div>
        </div>
        <div class="bg-base-200">
            <div class="flex prose hero-content my-10 mx-auto">
                <div class="flex-1 w-64 mb-10">
                </div>
                <div class="flex-1 mb-10 w-14">
                    <h3>プランを選ぶ</h3>
                    <p>予約する際に、リアルタイムでの空室状況の確認と即時予約が可能な機能を提供します。これにより、ユーザーが素早く宿泊施設を確保することができます。</p>
                    {{-- Tripoサービスページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded mt-8 lg:w-252 mb-42 my-22 md:px-6 lg:px-0 ">
            <div class="hero-content my-10">
                <div class="max-w-md mb-10">
                    <h2>Tripo体験記</h2>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
    @endif
@endsection