<!-- The Modal -->
<div class="modal fade" id="AddUserModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm phiếu bảo hành</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('gcs.store') }}" method="post">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="id_guarantee">id_guarantee:</label>
                <input type="text" name="id_guarantee" class="form-control" placeholder="Enter id_guarantee" id="id_guarantee">
            </div>
            <div class="form-group">
                <label for="start_day">start_day:</label>
                <input type="text" name="start_day" class="form-control" placeholder="Enter start day" id="start_day">
            </div>
            <div class="form-group">
                <label for="end_day">end_day:</label>
                <input type="text" name="end_day" class="form-control" placeholder="Enter end day" id="end_day">
            </div>
            <div class="form-group">
                <label for="user_id">user_id:</label>
                <input type="text" name="user_id" class="form-control" placeholder="Enter user_id" id="user_id">
            </div>
            <div class="form-group">
                <label for="service_id">service_id:</label>
                <input type="text" name="service_id" class="form-control" placeholder="Enter service_id" id="service_id">
            </div>
            <div class="form-group">
                <label for="doctor_id">doctor_id:</label>
                <input type="text" name="doctor_id" class="form-control" placeholder="Enter doctor_id" id="doctor_id">
            </div>
            <div class="form-group">
                <label for="tooth_unit">tooth_unit:</label>
                <input type="text" name="tooth_unit" class="form-control" placeholder="Enter tooth_unit" id="tooth_unit">
            </div>
            <div class="form-group">
                <label for="note">note:</label>
                <input type="text" name="note" class="form-control" placeholder="Enter note" id="note">
            </div>
            <div class="form-group">
                <label for="image_before">image_before:</label>
                <input type="text" name="image_before" class="form-control" placeholder="Enter image_before" id="image_before">
            </div>
            <div class="form-group">
                <label for="image_doing">image_doing:</label>
                <input type="text" name="image_doing" class="form-control" placeholder="Enter image_doing" id="image_doing">
            </div>
            <div class="form-group">
                <label for="image_complete">image_complete:</label>
                <input type="text" name="image_complete" class="form-control" placeholder="Enter image_complete" id="image_complete">
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
