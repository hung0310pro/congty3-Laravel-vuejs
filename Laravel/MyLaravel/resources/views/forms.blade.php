<!-- postform1 đây là định danh của route -->

<!-- 
csrf_token : CSRF (Cross Site Request Forgery) là kỹ thuật tấn công bằng cách sử dụng quyền chứng thực của người dùng đối với một website. Kỹ thuật này tấn công vào người dùng, dựa vào đó hacker có thể thực thi những thao tác phải yêu cầu sự chứng thực. CSRF là một cuộc tấn công lừa các nạn nhân vào một trình yêu cầu độc hại. Hacker sử dụng phương pháp CSRF để lừa trình duyệt của người dùng gửi đi các câu lệnh HTTP đến các ứng dụng web.


+ Class VerifyCsrfToken middleware, bao gồm nhóm web middleware , sẽ tự động xác minh token từ request input giống với token lưu trong session.
 -->

<form method="post" action="{!! route('postform1') !!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="text" name="username">
	<input type="text" name="email">
	<input type="file" name="myfile" id="myfile">
	<input type="submit" name="submit" value="Submit">
</form>