<form action="{{route('childcategory.update')}}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name/ Subcategory Name</label>
            <select class="form-select" name="subcategory_id" id="">
                @foreach($category as $catrow)
                @php
                $subcategory = DB::table('subcategories')->where('category_id', $catrow->id)->get();
                @endphp
                <option value="" disabled>{{$catrow->category_name}}</option>
                @foreach($subcategory as $subcatrow)
                <option value="{{$subcatrow->id}}" @if($subcatrow->id==$childcategory->subcategory_id) selected @endif >---{{$subcatrow->subcategory_name}}</option>
                @endforeach
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">SubCategory Name</label>
            <input type="text" name="childcategory_name" id="e_category_name" class="form-control" value="{{$childcategory->childcategory_name}}">
            <input type="hidden" name="id" value="{{$childcategory->id}}" id="e_category_id" class="form-control">
        </div>
        <p>This is subcategory name</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>