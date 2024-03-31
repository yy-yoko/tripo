<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<img src="{{ asset($user->img_path) }}" >
	<form method="POST" action="/" enctype="multipart/form-data">

		{{ csrf_field() }}

	<input type="file" id="file" name="file" class="form-control">


	<button type="submit">アップロード</button>

	</form>

</body>
</html>