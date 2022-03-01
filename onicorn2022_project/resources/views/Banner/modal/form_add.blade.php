<!-- Modal form add banner!-->
<div class="modal fade" id="banner_form_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
          <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('add_banner')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title"  class="form-label">{{__('Title')}}</label>
              @if ($errors->has('title'))
                  <p style="color: red">{{$errors->first('title')}}</p>
              @endif
              <input type="text" class="form-control" id="title" name="title" placeholder="title">
            </div>
            <div class="form-group">
              <label for="subtitle" class="form-label">{{__('Sub')}}</label>
              @if ($errors->has('subtitle'))
                  <p style="color: red">{{$errors->first('subtitle')}}</p>
              @endif
              <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="subtitle">
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">{{__('Photo')}}</label>
                @if ($errors->has('photo_fileUpload'))
                    <p style="color: red">{{$errors->first('photo_fileUpload')}}</p>
                @endif
                <input type="file" name="photo_fileUpload" class="form-control">
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
<!-- end modal form add banner!-->
