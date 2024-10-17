@extends('layouts.app')

@section('title', 'Thông tin chi tiết sinh viên')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2 class="my-4">Thông tin sinh viên</h2>
        
        <table class="table table-bordered">
            <tr>
                <th>Tên đăng nhập</th>
                <td>{{ $student->username }}</td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $student->phone }}</td>
            </tr>
        </table>

        <h3>Tin nhắn</h3>
        <!-- Form để gửi tin nhắn -->
        <form action="{{ route('messages.store', $student->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="3" placeholder="Để lại tin nhắn cho sinh viên này..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
        </form>

        
        <ul class="list-group my-4">
            @foreach($messages as $message)
                <li class="list-group-item">
                    <strong>{{ $message->user->name }}:</strong> {{ $message->content }}
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
