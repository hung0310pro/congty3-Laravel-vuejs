@if(count($errors) > 0)
<div class="error">
	@foreach($errors->all() as $error)
	<p>{!! $error !!}</p>
	@endforeach
</div>
@endif
{{ $loi ?? "" }} <!-- cái này có nghĩa là nếu có $error thì show k thì k show ThanhVienController-->
<form method="post" action="{!! route('postformauthor') !!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="submit" name="submit" value="Submit">
</form>