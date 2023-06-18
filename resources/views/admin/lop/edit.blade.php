@extends('admin.main')
@section('content')
        <form action="/admin/lop/update/{{$lop->id}}" method="post">
            @include('share.error')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã lớp học</label>
                    <input 
                        type="text" 
                        value="{{$lop->MaLop}}" 
                        name="malop" 
                        class="form-control" 
                        id="malop" 
                        placeholder="Nhập mã lớp học"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên lớp học</label>
                    <input 
                        type="text" 
                        value="{{$lop->TenLop}}" 
                        name="tenlop" 
                        class="form-control" 
                        id="tenlop" 
                        placeholder="Nhập tên lớp học"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <textarea name="mota" id="mota" rows="10" cols="80">
                        {{$lop->MoTa}}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'mota' );
                    </script>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số lượng sinh viên</label>
                    <input 
                        type="number" 
                        value="{{$lop->SoLuongSV}}" 
                        name="soluongsv" 
                        class="form-control" 
                        id="soluongsv"
                        placeholder="Nhập số lượng sinh viên"
                    >
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>
@endsection
