@extends('admin.main')
@section('content')
    <form action="/admin/tailieu/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã tài liệu</label>
                <input type="text" name="matailieu" class="form-control"
                    id="matailieu" placeholder="Nhập mã tài liệu">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên tài liệu</label>
                <input type="text" name="tentailieu" class="form-control"
                    id="tentailieu" placeholder="Nhập tên tài liệu">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm tắt</label>
                <textarea name="tomtat" id="tomtat" rows="10" cols="80">
                Input your content!
                </textarea>
                <script>
                    CKEDITOR.replace('tomtat');
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Danh mục</label>
                <select name="madanhmuc" id="madanhmuc" class="form-control">
                    @foreach ($danhmucs as $danhmuc)
                        <option value="{{ $danhmuc->madanhmuc }}">
                            {{ $danhmuc->tendanhmuc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
