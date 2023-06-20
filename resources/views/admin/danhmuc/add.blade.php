@extends('admin.main')
@section('content')
    <form action="/admin/danhmuc/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã danh mục</label>
                <input type="text" name="madanhmuc" class="form-control"
                    id="madanhmuc" placeholder="Nhập mã danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên danh mục</label>
                <input type="text" name="tendanhmuc" class="form-control"
                    id="tendanhmuc" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="mota" id="mota" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace('mota');
                </script>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
