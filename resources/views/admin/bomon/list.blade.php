@extends('admin.main')
@section('content')
    <div class="row p-2">
        <div class="col-6">
            <form class="d-flex">
                <input class="form-control mr-2" type="text" name="mabomon"
                    placeholder="Mã bộ môn">
                <input class="form-control mr-2" type="text" name="tenbomon"
                    placeholder="Tên bộ môn">
                <button type="submit" class="btn btn-primary w-25">
                    Tìm
                </button>
            </form>
        </div>
        <div class="col-6 text-right">
            <a href="/admin/bomon/add">
                <button class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã bộ môn</th>
                <th>Tên bộ môn</th>
                <th>Văn phòng</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bomons as $bomon)
                <tr>
                    <td>{{ $bomon->id }}</td>
                    <td>{{ $bomon->mabomon }}</td>
                    <td>{{ $bomon->tenbomon }}</td>
                    <td>{!! $bomon->mota !!}</td>
                    <td>{{ $bomon->vanphong }}</td>
                    <td>
                        <a class="btn btn-primary"
                            href="/admin/bomon/edit/{{ $bomon->id }}">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{ $bomon->id }},'/admin/bomon/delete')"
                            class="btn btn-danger" href="#">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $bomons->links() }}
@endsection
