<form action="{{route('subcategory.update')}}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <select class="form-select" name="category_id" id="">
                @foreach($category as $row)
                <option value="{{$row->id}}" @if($row->id==$subcategory->category_id) selected @endif>{{$row->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">SubCategory Name</label>
            <input type="text" name="subcategory_name" id="e_category_name" class="form-control" value="{{$subcategory->subcategory_name}}">
            <input type="hidden" name="id" value="{{$subcategory->id}}" id="e_category_id" class="form-control">
        </div>
        <p>This is subcategory name</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>