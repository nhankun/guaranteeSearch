@extends('admin.layouts.masters')

@section('content_main')

    <div class="container-fluid">
        <h1 class="mt-4">Phiếu bảo hành</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">Phiếu bảo hành</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('gcs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_guarantee">Mã bảo hành:</label>
                        <input type="text" name="id_guarantee" value="{{ old('id_guarantee') }}" class="form-control @error('id_guarantee') is-invalid @enderror" placeholder="Enter id_guarantee" id="id_guarantee">
                        @error('id_guarantee')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_day">Ngày bắt đầu:</label>
                        <input type="text" name="start_day" value="{{ old('start_day') }}" class="form-control @error('start_day') is-invalid @enderror datetimepickers" placeholder="Enter start_day" id="start_day">
                        @error('start_day')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_day">Ngày kết thúc:</label>
                        <input type="text" name="end_day" value="{{ old('end_day') }}" class="form-control @error('end_day') is-invalid @enderror datetimepickers" placeholder="Enter end_day" id="end_day">
                        @error('end_day')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id">Khách hàng:</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="service_id">Dịch vụ:</label>
                        <select name="service_id" class="form-control @error('service_id') is-invalid @enderror" id="service_id">
                            @foreach($services as $sevice)
                                <option value="{{ $sevice->id }}">{{ $sevice->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="doctor_id">Bác sỹ:</label>
                        <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" id="doctor_id">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tooth_unit">Đơn vị răng:</label>
                        <input type="number" name="tooth_unit" value="{{ old('tooth_unit') }}" class="form-control @error('tooth_unit') is-invalid @enderror" placeholder="Enter tooth_unit" id="tooth_unit">
                        @error('tooth_unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú:</label>
                        <input type="text" name="note" value="{{ old('note') }}" class="form-control @error('note') is-invalid @enderror" placeholder="Enter note" id="note">
                        @error('note')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image_before">Hình ảnh trước:</label>
                        <input type="file" name="image_before" value="{{ old('image_before') }}" class="form-control @error('image_before') is-invalid @enderror" placeholder="Enter image_before" id="image_before">
                        @error('image_before')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image_doing">Hình ảnh đang:</label>
                        <input type="file" name="image_doing" value="{{ old('image_doing') }}" class="form-control @error('image_doing') is-invalid @enderror" placeholder="Enter image_doing" id="image_doing">
                        @error('image_doing')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image_complete">Hình ảnh trước:</label>
                        <input type="file" name="image_complete" value="{{ old('image_complete') }}" class="form-control @error('image_complete') is-invalid @enderror" placeholder="Enter image_complete" id="image_complete">
                        @error('image_complete')
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
