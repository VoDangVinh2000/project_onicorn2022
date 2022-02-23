<!-- Structure form !-->
<div class="col-md-6 mb-3">
    <div class="card">
        <div class="card-body">
            <h3 class="header-title">Menu Structure</h3>
            <form action="{{route('add_menus')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="name"  class="form-label">{{__('Name')}}</label>
                        @if ($errors->has('name'))
                            <p style="color: red">{{$errors->first('name')}}</p>
                        @endif
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="col-md-12">
                        <label for="link" class="form-label">{{__('Link')}}</label>
                        @if ($errors->has('link'))
                            <p style="color: red">{{$errors->first('link')}}</p>
                        @endif
                        <input type="text" class="form-control" id="link" name="link" placeholder="url">
                    </div>
                    <div class="col-md-12">
                        <label for="icon" class="form-label">{{__('Icon')}}</label>
                        @if ($errors->has('icon_fileUpload'))
                            <p style="color: red">{{$errors->first('icon_fileUpload')}}</p>
                        @endif
                        <input type="file" name="icon_fileUpload" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                        <select name="enabled" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-blue">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- end of structure form !-->
