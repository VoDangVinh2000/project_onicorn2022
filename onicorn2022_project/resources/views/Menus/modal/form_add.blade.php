<!-- Modal form add!-->

<div class="modal fade" id="menu_form_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
          <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('add_menus')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"  class="form-label">{{__('Name')}}</label>
                @if ($errors->has('name'))
                    <p style="color: red">{{$errors->first('name')}}</p>
                @endif
                <input type="text" class="form-control" id="name" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="link" class="form-label">{{__('Link')}}</label>
                @if ($errors->has('link'))
                    <p style="color: red">{{$errors->first('link')}}</p>
                @endif
                <input type="text" class="form-control" id="link" name="link" placeholder="url">
            </div>
            <div class="form-group">
                <label for="icon" class="form-label">{{__('Icon')}}</label>
                @if ($errors->has('icon_fileUpload'))
                    <p style="color: red">{{$errors->first('icon_fileUpload')}}</p>
                @endif
                <input type="file" name="icon_fileUpload" class="form-control">
            </div>
            <div class="form-group">
                <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                <select name="enabled" class="form-control">
                    <option value="1">Hoạt động</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-blue">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id ="btnDelete" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- end of add form !-->
