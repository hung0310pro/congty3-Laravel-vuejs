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

<form method="post" action="{!! route('themtintuc') !!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Tiêu Đề</label>
	<input type="text" name="tieude">
	<label>Nội Dung</label>
	<input type="text" name="noidung">
	<label>Thể Loại</label>
	<select name="theloaiid" id="theloaiid">
		<option value="0">Vui Lòng chọn thể loại</option>
		<?php foreach($listTheLoai as $tl) : ?>
			<option value="<?= $tl->id ?>"><?= $tl->ten ?></option>
		<?php endforeach; ?>
	</select>
	<label>Loại Tin</label>
	<select name="loaitinid" id="loaitinid">
		<option value="0">Vui Lòng chọn loại tin</option>
		<?php foreach($listLoaiTin as $lt) : ?>
			<option value="<?= $lt->id ?>"><?= $lt->ten ?></option>
		<?php endforeach; ?>
	</select>
	<label>Hình Ảnh</label>
	<input type="file" name="hinhanh">
	<input type="submit" name="submit" value="Submit">
</form>

<script src="{{ url('js/jquery-3.2.1.js') }}"></script>
<script>
	$("#theloaiid").change(function(){
        var _token = $("input[name='_token']").val();
        var url = "{{ url('/admin/tintuc/getajaxloaitin') }}";
        var theloaiid = $("#theloaiid").val();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: "JSON",
            data: {
                theloaiid: theloaiid,
                _token: _token,
            },
            success: function (data) {
                $('#loaitinid').empty();
                $('#loaitinid').append($('<option>').attr('value', 0).text('Vui Lòng chọn loại tin'));
                $.each(data, function (key, value) {
                    $('#loaitinid').append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.ten));
                });
                $('#loaitinid').trigger("chosen:updated");
            }
        });
	});
</script>
