@extends("admin.layout.app")
@section("title")
    <title>Quản lý danh mục</title>
@endsection
@section("content")
    <div id="app">
        <admin-quan-ly-danh-muc></admin-quan-ly-danh-muc>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-danh-muc.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
