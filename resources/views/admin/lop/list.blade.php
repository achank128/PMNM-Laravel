@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-6 p-2">
            <form class="d-flex" action="/admin/lop" method="get">
                <input type="text" name="search" class="form-control mr-2"
                    placeholder="Nhập từ khóa">
                <button type="submit" class="btn btn-primary w-25">Tìm kiếm</button>
            </form>
        </div>
        <div class="col-6 p-2 text-right ">
            <a href="/admin/lop/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Mô tả</th>
                        <th>Sĩ số</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lopmonhocs as $lopmonhoc)
                        <tr>
                            <td>{{ $lopmonhoc->id }}</td>
                            <td>{{ $lopmonhoc->MaLop }}</td>
                            <td>{{ $lopmonhoc->TenLop }}</td>
                            <td>{!! $lopmonhoc->MoTa !!}</td>
                            <td>{{ $lopmonhoc->SoLuongSV }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="/admin/lop/edit/{{ $lopmonhoc->id }}">
                                    <i class="fas fa-edit"> </i>
                                </a>
                                <a onclick="removeRow({{ $lopmonhoc->id }},'/admin/lop/delete')"
                                    class="btn btn-danger" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right mr-4">
                {{ $lopmonhocs->links() }}
            </div>
        </div>
    </div>
@endsection
