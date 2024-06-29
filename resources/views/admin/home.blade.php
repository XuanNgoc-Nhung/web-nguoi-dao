@extends("admin.layout.app")
@section("title")
    <title>Quản lý vật phẩm</title>
@endsection
@section("content")
    <div id="app">
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-vat-pham.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
