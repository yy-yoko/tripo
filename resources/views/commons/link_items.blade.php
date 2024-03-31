@if (Auth::check())
    {{-- ユーザ一覧ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.index') }}">体験記ユーザー</a></li>
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}&#39;s マイページ</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- お知らせページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">お知らせ</a></li>
    {{-- サービスページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">サービス</a></li>
    {{-- アプリについてページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">アプリについて</a></li>
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">はじめに</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">体験記</a></li>
@endif