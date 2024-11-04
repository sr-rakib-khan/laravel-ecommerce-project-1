<form action="{{route('brand.update')}}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
            <input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" placeholder="Brand Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Brand Logo</label>
            <input type="file" name="brand_logo" value="{{$data->brand_logo}}" class="form-control dropify">
            <input type="hidden" name="old_logo" value="{{$data->brand_logo}}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>