@extends('Layouts.master')
@section('title','Page|Add')
@section('content')
<?php use \App\Http\Controllers\PageController ; ?>
<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Form Add</h4>
                        <form class="form-horizontal" method="POST" action="{{route('admin_page_add_view')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputName3" class="col-4 col-xl-3 col-form-label">Name</label>
                                <div class="col-8 col-xl-9">
                                    <input type="text" class="form-control" name="name" id="inputName3" placeholder="Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputURL3" class="col-4 col-xl-3 col-form-label">URL</label>
                                <div class="col-8 col-xl-9">
                                    <input type="text" class="form-control" name="url" id="inputURL3" placeholder="URL">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnabled5" class="col-4 col-xl-3 col-form-label">Enabled</label>
                                <div class="col-8 col-xl-9">
                                    <select name="enabled" class="form-control">
                                        @foreach (config('pages_value.array_html_option_enabled') as $key => $itemEnabled)
                                            <option value="{{$key}}">{{$itemEnabled}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-8 col-xl-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                                </div>
                            </div>
                        </form>

                    </div>  <!-- end card-body -->
                </div>  <!-- end card -->
            </div>

        </div>
    </div>
</div>



@endsection
