@extends('layouts.app')

@section('content')

        <div class="prose bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10 max-w-full">
                <h2>Tripoのサービス</h2>
            </div>
            <div class="hero-content text-center my-10">
            </div>
            <div class="hero-content text-center my-10">
            </div>
        </div>
        
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content my-10">
                <div class="max-w-md mb-10">
                    <h2>Tripoのサービス</h2>
                    <h3>目的地を日時を指定する</h3>
                    <p>目的地や日程、予算などの条件を指定して、検索を行います。さらに、フィルタリングオプションを使って、好みに合った宿泊施設を絞り込みます。</p>
                    {{-- アプリについてページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content my-10">
                <div class="max-w-md mb-10">
                    <h3>プランを選ぶ</h3>
                    <p>予約する際に、リアルタイムでの空室状況の確認と即時予約が可能な機能を提供します。これにより、ユーザーが素早く宿泊施設を確保することができます。</p>
                    {{-- Tripoサービスページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content my-10">
                <div class="max-w-md mb-10">
                    <h2>ご利用方法</h2>
                    <h3>目的地を日時を指定する</h3>
                    <p>目的地や日程、予算などの条件を指定して、検索を行います。さらに、フィルタリングオプションを使って、好みに合った宿泊施設を絞り込みます。</p>
                    {{-- アプリについてページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content my-10">
                <div class="max-w-md mb-10">
                    <h3>予約とメッセージング</h3>
                    <p>予約する際に、リアルタイムでの空室状況の確認と即時予約が可能な機能を提供します。これにより、ユーザーが素早く宿泊施設を確保することができます。</p>
                    {{-- Tripoサービスページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">詳しくみる</a>
                </div>
            </div>
        </div>
        
@endsection