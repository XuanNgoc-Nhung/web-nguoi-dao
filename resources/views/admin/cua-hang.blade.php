@extends("admin.layout.app")
@section("title")
    <title>Quản lý của hàng</title>
@endsection
@section("content")
    <div id="app">
        <admin-quan-ly-cua-hang></admin-quan-ly-cua-hang>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-cua-hang.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
