<form action="{{route('blog.category.update')}}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$blog_category->id}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Blog Category name</label>
            <input type="text" name="blogcategory_name" value="{{$blog_category->blog_category_name}}" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>