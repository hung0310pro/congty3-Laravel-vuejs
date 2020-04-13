{{ $bien2 ?? "" }}

<!-- postform1 đây là định danh của route -->
<form method="post" action="{!! route('postformupload1') !!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="file" name="myfile" id="myfile">
	<input type="submit" name="submit" value="Submit">
</form>