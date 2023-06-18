@extends('admin.main')
@section('content')
    <div class="row p-2">
        <div class="col-12 text-right">
            <a href="/admin/tintuc/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Tin Tức</th>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th>Mã Thể Loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tintucs as $tintuc)
                <tr>
                    <td>{{ $tintuc->id }}</td>
                    <td>{{ $tintuc->matintuc }}</td>
                    <td>{{ $tintuc->tieude }}</td>
                    <td>{!! $tintuc->noidung !!}</td>
                    <td>{{ $tintuc->matheloai }}</td>

                    <td>
                        <a class="btn btn-primary"
                            href="/admin/tintuc/edit/{{ $tintuc->id }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $tintuc->id }},'/admin/tintuc/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-4">
        {{ $tintucs->links() }}
    </div>
@endsection
