@if (Auth::id() == $user->id)
    <div class="mt-4 flex">
        <div class="w-1/2 pr-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">投稿画像:</label>
                <img id="image-preview" class="hidden w-full max-h-48 mb-4">

        </div>
        <div class="w-1/2 pl-4">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
            
                <div class="form-control mt-4">
                    <input type="text" rows="2" name="title" placeholder="タイトル" class="input input-bordered w-full">
                </div>
                <div class="form-control mt-4">
                    <textarea rows="4" maxlength="200" name="content" placeholder="文章（最大200文字）" class="input input-bordered w-full h-48"></textarea>
                </div>
                {{-- 画像フォーム --}}
                <input type="file" name="image" id="image" accept="image/*" class="form-control mt-4">
                
                <button type="submit" class="btn btn-primary btn-block normal-case mt-4">投稿する</button>
            </form>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endif

