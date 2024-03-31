@extends('layouts.app')

@section('content')
        <div class="prose hero mx-auto max-w-full rounded">
            <h2>ユーザー一覧</h2>
        </div>
    {{-- ユーザ一覧 --}}
@include('users.users')
@endsection