@extends('admin.main')
@section('content')
    <div class="row p-2">
        <div class="col-6 text-right">
            <form class="d-flex">
                <select name="sortBy" id="sortBy" class="form-control mr-2">
                    <option value="ten_asc">Tên A-Z</option>
                    <option value="ma_asc">Mã A-Z</option>
                    <option value="ten_desc">Tên Z-A</option>
                    <option value="ma_desc">Mã Z-A</option>
                </select>
                <button class="btn btn-primary w-25">Sắp xếp</button>
            </form>
        </div>
        <div class="col-6 text-right">
            <a href="/admin/tailieu/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã tài liệu</th>
                <th>Tên tài liệu</th>
                <th>Tóm tắt</th>
                <th>Mã danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tailieus as $tailieu)
                <tr>
                    <td>{{ $tailieu->id }}</td>
                    <td>{{ $tailieu->matailieu }}</td>
                    <td>{{ $tailieu->tentailieu }}</td>
                    <td>{!! $tailieu->tomtat !!}</td>
                    <td>{{ $tailieu->madanhmuc }}</td>

                    <td>
                        <a class="btn btn-primary"
                            href="/admin/tailieu/edit/{{ $tailieu->id }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $tailieu->id }},'/admin/tailieu/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-4">
        {{ $tailieus->links() }}
    </div>
@endsection
