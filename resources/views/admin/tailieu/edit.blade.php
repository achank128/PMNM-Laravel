@extends('admin.main')
@section('content')
    <form action="/admin/tailieu/edit/{{ $tailieu->id }}" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã tài liệu</label>
                <input type="text" value="{{ $tailieu->matailieu }}"
                    name="matailieu" class="form-control" id="matailieu"
                    placeholder="Nhập mã tài liệu">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên tài liệu</label>
                <input type="text" value="{{ $tailieu->tentailieu }}"
                    name="tentailieu" class="form-control" id="tentailieu"
                    placeholder="Nhập Tên tài liệu">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm tắt</label>
                <textarea name="tomtat" id="tomtat" rows="10" cols="80">
                {{ $tailieu->tomtat }} 
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace('tomtat');
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thể loại</label>
                <select name="madanhmuc" id="madanhmuc" class="form-control">
                    @foreach ($danhmucs as $danhmuc)
                        <option value="{{ $danhmuc->madanhmuc }}"
                            {{ $danhmuc->madanhmuc == $tailieu->madanhmuc ? 'selected' : '' }}>
                            {{ $danhmuc->tendanhmuc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection
