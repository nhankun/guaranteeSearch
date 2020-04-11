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

                    <fieldset class="form-group">
                            <legend class="">Thông tin khách hàng</legend>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name">Tên:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" id="name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth">Ngày sinh:</label>
                                    <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror datetimepickers" placeholder="Enter date of birth" id="date_of_birth">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="identity_card">Số CMND:</label>
                                    <input type="text" name="identity_card" value="{{ old('identity_card') }}" class="form-control @error('identity_card') is-invalid @enderror" placeholder="Enter identity card" id="identity_card">
                                    @error('identity_card')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" id="address">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Giới tính:</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <legend>Thông tin bảo hành</legend>
                        <div class="form-group">
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
                                <label for="name_doctor">Bác sỹ thực hiện:</label>
                                <input type="text" name="name_doctor" value="{{ old('name_doctor') }}" class="form-control @error('name_doctor') is-invalid @enderror" placeholder="Enter name_doctor" id="name_doctor">
                                @error('name_doctor')
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
                        </div>
                    </fieldset>



                    <button type="submit" class="btn btn-primary btn_add_user">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
