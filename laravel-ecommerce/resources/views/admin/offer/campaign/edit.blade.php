<form action="{{route('campaign.update')}}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Campaign Title</label>
                    <input type="text" name="campaign_title" class="form-control" value="{{$data->campaign_title}}">
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                    <input type="date" name="start_date" value="{{$data->start_date}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">End Date</label>
                    <input type="date" name="end_date" value="{{$data->end_date}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select name="status" class="form-control form-select-sm" aria-label=".form-select-sm example">

                        <option @if($data->status == 1) selected @endif value="1">Active</option>

                        <option @if($data->status == 2) selected @endif value="2">Deactive</option>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount(%)</label>
                    <input type="text" name="discount" class="form-control" value="{{$data->discount}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Campaign Logo</label>
                <input type="file" name="campaign_logo" class="form-control">
                <input type="hidden" name="campaign_old_logo" value="{{$data->campaign_logo}}" class="form-control">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>