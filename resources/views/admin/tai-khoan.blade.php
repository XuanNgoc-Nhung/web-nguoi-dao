@extends("admin.layout.app")
@section("title")
    <title>Quản lý vật phẩm</title>
@endsection
@section("content")
    <div id="app">
        <admin-quan-ly-tai-khoan></admin-quan-ly-tai-khoan>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-tai-khoan.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
