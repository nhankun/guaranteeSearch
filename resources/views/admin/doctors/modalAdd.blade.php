<!-- The Modal -->
<div class="modal" id="AddUserModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm bác sỹ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('doctors.store') }}" method="post">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Xác nhận</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </form>

    </div>
  </div>
</div>
