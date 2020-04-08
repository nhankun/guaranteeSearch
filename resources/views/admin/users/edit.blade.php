@extends('admin.layouts.masters')

@section('content_main')

    <div class="container-fluid">
        <h1 class="mt-4">Quản lý người dùng</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Quản lý người dùng</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('users.update',$user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" id="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Ngày sinh:</label>
                        <input type="text" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control @error('date_of_birth') is-invalid @enderror datetimepickers" placeholder="Enter date of birth" id="date_of_birth">
                        @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="identity_card">Số CMND:</label>
                        <input type="text" name="identity_card" value="{{ $user->identity_card }}" class="form-control @error('identity_card') is-invalid @enderror" placeholder="Enter identity card" id="identity_card">
                        @error('identity_card')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" name="address" value="{{ $user->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" id="address">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính:</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn_add_user">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
