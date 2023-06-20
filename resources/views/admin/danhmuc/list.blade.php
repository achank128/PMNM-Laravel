@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Danh mục</th>
                <th>Tên Danh mục</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($danhmucs as $danhmuc)
                <tr>
                    <td>{{ $danhmuc->id }}</td>
                    <td>{{ $danhmuc->madanhmuc }}</td>
                    <td>{{ $danhmuc->tendanhmuc }}</td>
                    <td>{!! $danhmuc->mota !!}</td>
                    <td>
                        <a class="btn btn-primary"
                            href="/admin/danhmuc/edit/{{ $danhmuc->id }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $danhmuc->id }},'/admin/danhmuc/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mr-4">
        {{ $danhmucs->links() }}
    </div>
@endsection
