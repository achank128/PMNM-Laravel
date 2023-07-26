@extends('admin.main')
@section('content')
    <div class="row p-2">
        <div class="col-12 text-right">
            <a href="/admin/theloai/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Thể loại</th>
                <th>Tên Thể Loại</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($theloais as $theloai)
                <tr>
                    <td>{{ $theloai->id }}</td>
                    <td>{{ $theloai->matheloai }}</td>
                    <td>{{ $theloai->tentheloai }}</td>
                    <td>{!! $theloai->mota !!}</td>
                    <td>
                        <a class="btn btn-primary"
                            href="/admin/theloai/edit/{{ $theloai->id }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $theloai->id }},'/admin/theloai/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mr-4">
        {{ $theloais->links() }}
    </div>
@endsection
