@extends('admin.main')
@section('content')
    <form action="/admin/tintuc/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Tin Tức</label>
                <input type="text" name="matintuc" class="form-control"
                    id="matintuc" placeholder="Nhập mã tin tức">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tiêu đề</label>
                <input type="text" name="tieude" class="form-control"
                    id="tieude" placeholder="Nhập tiêu đề">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="noidung" id="noidung" rows="10" cols="80">
                Input your content!
                </textarea>
                <script>
                    CKEDITOR.replace('noidung');
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thể loại</label>
                <select name="matheloai" id="matheloai">
                    @foreach ($theloais as $theloai)
                        <option value="{{ $theloai->matheloai }}">
                            {{ $theloai->tentheloai }}</option>
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
