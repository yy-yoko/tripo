    @if (isset($tripposts))
        <div class="sm:flex sm:gap-10 flex-col">
            <div class="sm:w-full mb-4">
                {{-- 投稿一覧 --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($tripposts as $trippost)
                        <div class="bg-white shadow-md p-4">
                            {{-- 画像の表示 --}}
                            @if ($trippost->image)
                                <img src="{{ Storage::url($trippost->image) }}" alt="画像" class="max-w-full max-h-48 mb-4">
                            @endif
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($trippost->title)) !!}</p>
                            <p class="mb-0">{!! nl2br(e($trippost->content)) !!}</p>
                            <div class="flex items-center">
                                {{-- 投稿者情報 --}}
                                <div class="avatar mr-2">
                                    <div class="w-12 rounded">
                                        <img src="{{ Gravatar::get($trippost->user->email) }}" alt="" />
                                    </div>
                                </div>
                                {{-- 投稿日 --}}
                                <div>
                                    <a class="link link-hover text-info" href="{{ route('users.show', $trippost->user->id) }}">{{ $trippost->user->name }}</a>
                                    <span class="text-muted text-gray-500">投稿日 {{ $trippost->created_at }}</span>
                                </div>
                            </div>
                            {{-- 投稿削除ボタン --}}
                            @if (Auth::id() == $trippost->user_id)
                                <form method="POST" action="{{ route('tripposts.destroy', $trippost->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" onclick="return confirm('Delete id = {{ $trippost->id }} ?')">Delete</button>
                                </form>
                                @if (Auth::user()->is_favorite($trippost->id))
                                    {{-- お気に入り削除ボタンのフォーム --}}
                                    <form method="POST" action="{{ route('favorites.unfavorite', $trippost->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error btn-sm normal-case"
                                            onclick="return confirm('id = {{ $trippost->id }}のお気に入りを外します。よろしいですか？')">Unfavorite</button>
                                    </form>
                                @else
                                    {{-- お気に入りボタンのフォーム  --}}
                                    <form method="POST" action="{{ route('favorites.favorite',$trippost->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm normal-case">Favorite</button>
                                    </form>
                                @endif
                            @else
                                @if (Auth::id() != $trippost->user_id)
                                    @if (Auth::user()->is_favorite($trippost->id))
                                        {{-- お気に入り削除ボタンのフォーム --}}
                                        <form method="POST" action="{{ route('favorites.unfavorite', $trippost->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error btn-sm normal-case"
                                                onclick="return confirm('id = {{ $trippost->id }}のお気に入りを外します。よろしいですか？')">Unfavorite</button>
                                        </form>
                                    @else
                                        {{-- お気に入りボタンのフォーム  --}}
                                        <form method="POST" action="{{ route('favorites.favorite',$trippost->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm normal-case">Favorite</button>
                                        </form>
                                    @endif
                                @endif    
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- ページネーションのリンク --}}
        {{ $tripposts->links() }}
    @endif
