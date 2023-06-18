@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
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
                    <td>{{ $tintuc->matintuc }}</td>
                    <td>{{ $tintuc->tieude }}</td>
                    <td>{!! $tintuc->noidung !!}</td>
                    <td>{{ $tintuc->matheloai }}</td>

                    <td>
                        <a class="btn btn-primary"
                            href="/admin/tintuc/edit/{{ $tintuc->matintuc }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $tintuc->matintuc }},'/admin/tintuc/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tintucs->links() }}
@endsection
