@extends('layouts.app')

@section('content')
    <div class="sm:flex sm:gap-10 flex-col">
        <div class="sm:w-full mb-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
            {{-- タブ --}}
            @include('users.navtabs')
        </div>
        <div class="sm:col-span-2 mt-4">
            <div class="mt-4">
                {{-- ユーザ一覧 --}}
                @include('users.users')
            </div>
        </div>
    </div>
@endsection