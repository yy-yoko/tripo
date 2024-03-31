@if (isset($users))
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach ($users as $user)
            {{-- ユーザ情報 --}}
            @include('users.card')
        @endforeach
    </div>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif