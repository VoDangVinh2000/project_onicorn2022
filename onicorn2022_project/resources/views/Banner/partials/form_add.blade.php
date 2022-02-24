<!-- Add form !-->
<div class="col-md-12 mb-3">
    <div class="card">
        <div class="card-body">
            <h3 class="header-title">Add a banner</h3>
            <form action="{{ route('admin-banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class='container'>
              <div class="row">
                    <div class="col-md-12">
                        <label for="title"  class="form-label">{{__('Title')}}</label>
                        @if ($errors->has('title'))
                            <p style="color: red">{{$errors->first('title')}}</p>
                        @endif
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="col-md-12">
                        <label for="link" class="form-label">{{__('Sub Title')}}</label>
                        @if ($errors->has('subtitle'))
                            <p style="color: red">{{$errors->first('subtitle')}}</p>
                        @endif
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="subtitle">
                    </div>
                    <div class="col-md-12">
                        <label for="icon" class="form-label">{{__('Page ID')}}</label>
                        @if ($errors->has('page_id'))
                            <p style="color: red">{{$errors->first('page_id')}}</p>
                        @endif
                        <input type="text" name="page_id" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="icon" class="form-label">{{__('photo')}}</label>
                        @if ($errors->has('photo'))
                            <p style="color: red">{{$errors->first('photo')}}</p>
                        @endif
                        <input type="file" name="photo" class="form-control">
                    </div>
                   
                    <div class="col-md-12">
                        <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                        <select name="enabled" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
              </div>
                <br>
                <button type="submit" class="btn btn-blue">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- end of add form !-->
