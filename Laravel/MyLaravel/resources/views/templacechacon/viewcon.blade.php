@extends('templacechacon.viewcha');

@section('title')
tile của view con
@stop

@section('sidebar')

@parent
+Đây là phần section_ sidebar của view con dưới cái của view cha. <br>
@stop

@section('noidung')
<!-- ngang vs echo con nếu viết kiểu {!! $bien !!} thì nó sẽ bao gồm cả thẻ html bao nó nữa 
ví dụ như là $bien = <h1> aaaaaaaaaa </h1>;
thì nó sẽ bị in đậm
-->
{{ $bien ?? '' }}
<!-- dùng endsection or stop đều đc  -->
<br>
đây là view của phần con
<span class="aaaaa">Lê Mạnh Hùng</span>
@endsection