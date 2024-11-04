 <form action="{{route('warehouse.update')}}" method="Post">
     @csrf
     <div class="modal-body">
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Warehouse Name</label>
             <input type="text" class="form-control" name="warehouse_name" value="{{$warehouse->warehouse_name}}">
             <input type="hidden" class="form-control" name="id" value="{{$warehouse->id}}">
         </div>
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Warehouse address</label>
             <input type="text" name="warehouse_address" class="form-control" value="{{$warehouse->warehouse_address}}">
         </div>
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Warehouse Phone</label>
             <input type="text" name="warehouse_phone" class="form-control" value="{{$warehouse->warehouse_phone}}">
         </div>
     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">update</button>
     </div>
 </form>