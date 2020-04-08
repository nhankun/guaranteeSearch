<!-- The Modal -->
<div class="modal" id="AddUserModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm người dùng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('users.store') }}" method="post">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
          </div>
          <div class="form-group">
            <label for="date_of_birth">Ngày sinh:</label>
            <input type="text" name="date_of_birth" class="form-control datetimepickers" placeholder="Enter date of birth" id="date_of_birth">
          </div>
          <div class="form-group">
            <label for="identity_card">Số CMND:</label>
            <input type="text" name="identity_card" class="form-control" placeholder="Enter identity card" id="identity_card">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" class="form-control" placeholder="Enter address" id="address">
          </div>
          <div class="form-group">
            <label for="gender">Giới tính:</label>
            <select name="gender" class="form-control" id="gender">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn_add_user">Xác nhận</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </form>

    </div>
  </div>
</div>
