@extends('admin.main')
@section('content')
    <form action="/admin/sinhvien/add/store" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label>MSSV</label>
                <input type="text" name="MSSV" class="form-control" id="mssv"
                    placeholder="Nhập mã số sinh viên">
            </div>
            <div class="form-group">
                <label>Tên sinh viên</label>
                <input type="text" name="HoTen" class="form-control"
                    id="hoten" placeholder="Nhập họ tên">
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="GioiTinh"
                        id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="GioiTinh"
                        id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Nữ
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control"
                    id="diachi">
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="NgaySinh" class="form-control"
                    id="ngaysinh">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="SDT" class="form-control"
                    id="sdt">
            </div>
            <div class="form-group">
                <label>Lớp</label>
                <select name="MaLop" class="form-control" id="malop">
                    @foreach ($lops as $lop)
                        <option value="{{ $lop->id }}">{{ $lop->MaLop }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
