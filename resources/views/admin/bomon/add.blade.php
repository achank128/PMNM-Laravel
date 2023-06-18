@extends('admin.main')
@section('content')
    <form action="/admin/bomon/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã bộ môn</label>
                <input type="text" name="mabomon" class="form-control" id="mabomon"
                    placeholder="Nhập mã bộ môn">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên bộ môn</label>
                <input type="text" name="tenbomon" class="form-control"
                    id="tenbomon" placeholder="Nhập tên bộ môn">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="mota" id="mota" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
                </textarea>
                <script>
                    CKEDITOR.replace('mota');
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Văn phòng</label>
                <input type="text" name="vanphong" class="form-control"
                    id="vanphong" placeholder="Văn phòng">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
