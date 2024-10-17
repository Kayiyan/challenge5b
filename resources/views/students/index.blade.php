@extends('layouts.app')

@section('title', 'Danh sách sinh viên')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4">Danh sách sinh viên</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Thêm sinh viên</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
