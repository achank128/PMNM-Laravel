@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-9 p-2">
            <form class="d-flex" action="/admin/sinhvien" method="get">
                <input class="form-control mr-2" type="text" name="search"
                    placeholder="Nhập từ khóa">
                <select class="form-control mr-2" name="MaLop"
                    class="form-control">
                    <option value="">Tất cả
                    </option>
                    @foreach ($lops as $lop)
                        <option value="{{ $lop->id }}">{{ $lop->MaLop }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-50">Tìm
                    kiếm</button>
            </form>
        </div>
        <div class="col-3 p-2 text-right">
            <a href="/admin/sinhvien/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Lớp</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sinhviens as $sihnvien)
                        <tr>
                            <td>{{ $sihnvien->id }}</td>
                            <td>{{ $sihnvien->MSSV }}</td>
                            <td>{{ $sihnvien->HoTen }}</td>
                            <td>{{ $sihnvien->GioiTinh }}</td>
                            <td>{{ $sihnvien->NgaySinh }}</td>
                            <td>{{ $sihnvien->DiaChi }}</td>
                            <td>{{ $sihnvien->SDT }}</td>
                            <td>{{ $sihnvien->MaLop }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="/admin/sinhvien/edit/{{ $sihnvien->id }}">
                                    <i class="fas fa-edit"> </i>
                                </a>
                                <a onclick="removeRow({{ $sihnvien->id }},'/admin/sinhvien/delete')"
                                    class="btn btn-danger" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right mr-4">
                {{ $sinhviens->links() }}
            </div>
        </div>
    </div>
@endsection
