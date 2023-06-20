@extends('admin.main')
@section('content')
    <form action="/admin/theloai/edit/{{ $theloai->id }}" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Thể Loại</label>
                <input type="text" value="{{ $theloai->matheloai }}"
                    name="matheloai" class="form-control" id="matheloai"
                    placeholder="Nhập mã thể loại">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên Thể loại</label>
                <input type="text" value="{{ $theloai->tentheloai }}"
                    name="tentheloai" class="form-control" id="tentheloai"
                    placeholder="Nhập tên thể loại">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="mota" id="mota" rows="10" cols="80">
                {{ $theloai->mota }}
                </textarea>
                <script>
                    CKEDITOR.replace('mota');
                </script>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
        @csrf
    </form>
@endsection
