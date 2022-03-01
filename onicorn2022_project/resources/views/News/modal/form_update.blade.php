<!-- Modal form add new!-->
<div class="modal fade" id="new_form_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update New</h5>
                <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- <form action="{{route('/admin-news-update-list ',['id' => request()->id])}}" method="POST" enctype="multipart/form-data"> --}}
                    <form action="{{route('update_new',['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">{{__('Title')}}</label>
                        @if ($errors->has('title'))
                        <p style="color: red">{{$errors->first('title')}}</p>
                        @endif
                        <input type="text" value="" class="form-control" id="list" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="photo_sub" class="form-label">{{__('Photo')}}</label>
                        @if ($errors->has('photo_sub_fileUpload'))
                        <p style="color: red">{{$errors->first('photo_sub_fileUpload')}}</p>
                        @endif
                        <input type="file" value="" name="photo_sub_fileUpload" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="author_name" class="form-label">{{__('Author')}}</label>
                        @if ($errors->has('author_name'))
                        <p style="color: red">{{$errors->first('author_name')}}</p>
                        @endif
                        <input type="text" value="" class="form-control" id="author_name" name="author_name"
                            placeholder="author_name">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">{{__('Content')}}</label>
                        @if ($errors->has('content'))
                        <p style="color: red">{{$errors->first('content')}}</p>
                        @endif
                        <input type="text" value="" class="form-control" id="content" name="content" placeholder="content">
                    </div>
                    <div class="form-group">
                        <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                        <select name="enabled" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featured" class="form-label">{{__('Featured')}}</label>
                        <select name="featured" class="form-control">
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deleted" class="form-label">{{__('Deleted')}}</label>
                        <select name="deleted" class="form-control">
                            <option value="0">Hoạt động</option>
                            <option value="1">Thùng rác</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelete" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal form add new!-->