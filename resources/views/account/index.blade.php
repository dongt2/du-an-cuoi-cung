@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thông tin tài khoản</h2>

    <!-- Thông tin người dùng -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Ngày tạo tài khoản: {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <!-- Form cập nhật thông tin -->
    <form action="{{ route('account.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>

    <!-- Thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Đăng xuất -->
    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Đăng xuất</a>
</div>
@endsection
