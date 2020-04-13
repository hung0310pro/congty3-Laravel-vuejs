@if(session('thongbao'))
   {{ session('thongbao') }}
@endif

@if(session('thongbaoloi'))
   {{ session('thongbaoloi') }}
@endif

@if(count($errors) > 0)
   @foreach($errors->all() as $err)
       {{ $err }}
   @endforeach
@endif

<form method="post" action="{!! route('themloaitin') !!}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Thêm Tên</label>
	<input type="text" name="ten">
	<label>Thể Loại</label>
	<select name="theloaiid">
		<option value="0">Vui Lòng chọn thể loại</option>
		<?php foreach($listTheloai as $theloai) : ?>
			<option value="<?= $theloai->id ?>"><?= $theloai->ten ?></option>
		<?php endforeach; ?>
	</select>
	<input type="submit" name="submit" value="Submit">
</form>