@extends('admin.main')
@section('content')
    <form action="/admin/theloai/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Thể Loại</label>
                <input type="text" name="matheloai" class="form-control" id="matheloai" placeholder="Nhập mã thể loại">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên Thể loại</label>
                <input type="text" name="tentheloai" class="form-control" id="tentheloai" placeholder="Nhập tên thể loại">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputPassword1">Mô tả</label>--}}
{{--                <input type="text" name="mota" class="form-control" id="mota" placeholder="Nhập mô tả">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="mota" id="mota" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace( 'mota' );
                </script>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
