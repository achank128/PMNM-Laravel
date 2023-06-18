@extends('admin.main')
@section('content')
    <form action="/admin/bomon/edit/{{ $bomon->id }}" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã bộ môn</label>
                <input type="text" name="mabomon" value="{{ $bomon->mabomon }}"
                    class="form-control" id="mabomon" placeholder="Nhập mã bộ môn">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên bộ môn</label>
                <input type="text" name="tenbomon" value="{{ $bomon->tenbomon }}"
                    class="form-control" id="tenbomon"
                    placeholder="Nhập tên bộ môn">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="mota" id="mota" rows="10" cols="80">
                    {{ $bomon->mota }}
                </textarea>
                <script>
                    CKEDITOR.replace('mota');
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Văn phòng</label>
                <input type="text" name="vanphong" value="{{ $bomon->vanphong }}"
                    class="form-control" id="vanphong" placeholder="Văn phòng">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
        @csrf
    </form>
@endsection
