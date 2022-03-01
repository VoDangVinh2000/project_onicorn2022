<!-- Modal form add head!-->
<div class="modal fade" id="head_form_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Head</h5>
          <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('add_head')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title"  class="form-label">{{__('Title')}}</label>
              @if ($errors->has('title'))
                  <p style="color: red">{{$errors->first('title')}}</p>
              @endif
              <input type="text" class="form-control" id="title" name="title" placeholder="title">
            </div>
            <div class="form-group">
              <label for="content" class="form-label">{{__('Content')}}</label>
              @if ($errors->has('content'))
                  <p style="color: red">{{$errors->first('content')}}</p>
              @endif
              <input type="text" class="form-control" id="content" name="content" placeholder="content">
            </div>
            <div class="form-group">
                <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                <select name="enabled" class="form-control">
                    <option value="1">Hoạt động</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id ="btnDelete" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- end modal form add new!-->
