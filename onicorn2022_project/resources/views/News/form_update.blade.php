@extends('Layouts.master')
@section('title','News|Update')
@section('content')
<div class="content-page">
    <div class="content">
{{-- Back lList --}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('admin_news') }}"> Back</a>
                </div>
            </div>
        </div>
    
 <!-- update form new !-->
    <div class="card">
        <div class="card-body">
            <h3 class="header-title">Update New</h3>
            @foreach ($list as $data)
            <form action="{{route('update_new',['id' => request()->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="title"  class="form-label">{{__('Title')}}</label>
                        @if ($errors->has('title'))
                            <p style="color: red">{{$errors->first('title')}}</p>
                        @endif
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" >
                    </div>
                    <div class="col-md-12">
                        <label for="photo_sub" class="form-label">{{__('Photo')}}</label>
                        @if ($errors->has('photo_sub_fileUpload'))
                            <p style="color: red">{{$errors->first('photo_sub_fileUpload')}}</p>
                        @endif
                        <input type="file" name="photo_sub_fileUpload" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="author_name" class="form-label">{{__('Author')}}</label>
                        @if ($errors->has('author_name'))
                            <p style="color: red">{{$errors->first('author_name')}}</p>
                        @endif
                        <input type="text" class="form-control" id="author_name" name="author_name" placeholder="author_name">
                    </div>
                    <div class="col-md-12">
                        <label for="content" class="form-label">{{__('Content')}}</label>
                        @if ($errors->has('content'))
                            <p style="color: red">{{$errors->first('content')}}</p>
                        @endif
                        <input type="text" class="form-control" id="content" name="content" placeholder="author_name">
                    </div>
                    <div class="col-md-12">
                        <label for="enabled" class="form-label">{{__('Enabled')}}</label>
                        <select name="enabled" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="featured" class="form-label">{{__('Featured')}}</label>
                        <select name="featured" class="form-control">
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="deleted" class="form-label">{{__('Deleted')}}</label>
                        <select name="deleted" class="form-control">
                            <option value="1">Thùng rác</option>
                            <option value="0">Hoạt động</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
            @endforeach
        </div>
    </div>

<!-- end of update form new!-->


</div>
</div>
@endsection


