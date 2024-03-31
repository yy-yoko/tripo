        <div class="sm:flex sm:gap-10 flex-col">
            <div class="sm:w-full mb-4">
                <div class="bg-white shadow-md p-4 flex items-center justify-between">
                {{-- ユーザ情報 --}}
                <div class="pr-4">
                    {{-- ユーザ名 --}}
                    <h2 class="text-lg font-semibold mb-2">{{ $user->name }}</h2>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p><a class="link link-hover text-info" href="{{ route('users.show', $user->id) }}">プロフィール</a></p>
                    </div>

                    {{-- 自己紹介情報 --}}
                    <h2 class="text-lg font-semibold mb-2">{{ $user->profile }}</h2>
                    {{-- 以下に他のユーザ情報を追加する --}}
                </div>
                <div class="pr-4">
                {{-- フォロー／アンフォローボタン --}}
                @include('user_follow.follow_button')
                </div>

                <div class="ml-auto">
                {{-- ユーザのプロフィール写真 --}}
                <img src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="Profile Picture" class="rounded-full w-24 h-24 mb-2">
                </div>
                </div>
            </div>
        </div>

