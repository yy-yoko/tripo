@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorite($trippost->id))
        {{-- お気に入り削除ボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.unfavorite', $trippost->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-sm normal-case"
                onclick="return confirm('id = {{ $trippost->id }}のお気に入りを外します。よろしいですか？')">お気に入りをはずす</button>
        </form>
    @else
        {{-- お気に入りボタンのフォーム  --}}
        <form method="POST" action="{{ route('favorites.favorite',$trippost->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm normal-case">お気に入り</button>
        </form>
    @endif
@endif