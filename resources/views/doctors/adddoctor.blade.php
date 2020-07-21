<!-- The Modal -->
<div class="modal" id="addDoctorModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Doctor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.save.doctor') }}">
            @csrf
                <div class="form-group">
                    <label for="showroomcode">Doctor's Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Doctor's Name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="showroomcode">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Doctor's Email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="showroomcode">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Doctor's Phone Number" value="{{ old('phone') }}" required>
                </div>

                <div class="form-group">
                    <label for="showroomcode">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Doctor's Address" value="{{ old('address') }}" required>
                </div>

                <div class="form-group">
                    <label for="showroomcode">Department</label>
                    <input type="text" class="form-control" id="department" name="department" placeholder="Enter Doctor's Department" value="{{ old('department') }}" required>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>   
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>