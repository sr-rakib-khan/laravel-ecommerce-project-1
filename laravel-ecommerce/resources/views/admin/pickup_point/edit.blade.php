<form action="{{route('pickup_point.update')}}" method="Post" id="update_pickup_point">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="pickup_point_name" class="form-label">pickup point name</label>
            <input type="text" class="form-control" name="pickup_point_name" value="{{$pickup->pickup_point_name}}">
            <input type="hidden" class="form-control" name="id" value="{{$pickup->id}}">
        </div>
        <div class="mb-3">
            <label for="pickup_point_address" class="form-label">pickup point address</label>
            <input type="text" class="form-control" name="pickup_point_address" value="{{$pickup->pickup_point_address}}">
        </div>
        <div class="mb-3">
            <label for="pickup_point_phone" class="form-label">pickup point phone</label>
            <input type="text" class="form-control" name="pickup_point_phone" value="{{$pickup->pickup_point_phone}}">
        </div>
        <div class="mb-3">
            <label for="pickup_point_phone_two" class="form-label">pickup point phone (two)</label>
            <input type="text" class="form-control" name="pickup_point_phone_two" value="{{$pickup->pickup_point_phone_two}}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>


<script type="text/javascript">
    //coupon update ajax code
    $('#update_pickup_point').submit(function(e) {
        var table = $('.ytable').DataTable();
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            data: request,
            success: function(data) {
                toastr.success(data);
                $('#update_pickup_point')[0].reset();
                $("#editModal").modal('hide');
                table.ajax.reload();
            }
        });

    });
</script>