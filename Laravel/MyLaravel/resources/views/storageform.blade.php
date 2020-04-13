<form method="post" action="{!! route('storageupload') !!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="file" name="myfile" id="myfile">
	<input type="submit" name="submit" value="Submit">
</form>