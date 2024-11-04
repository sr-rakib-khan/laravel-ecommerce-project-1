<form action="{{route('category.update')}}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category name</label>
            <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control" placeholder="Brand Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Show Home Page</label>
            <select name="show_homepage" class="form-select" id="">
                <option @if($data->show_homepage == 1) Selected @endif value="1">Active</option>
                <option @if($data->show_homepage == 2) Selected @endif value="2">Deactive</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">category logo</label>
            <input type="hidden" name="old_logo" value="{{$data->category_logo}}" class="form-control" >
            <input type="file" name="category_logo" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>