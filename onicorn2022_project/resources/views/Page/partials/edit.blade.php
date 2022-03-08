@extends('Layouts.master')
@section('title','Page|Edit')
@section('content')


<?php use \App\Http\Controllers\Page\PageController;?>
<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    {{-- <form action="/admin-page-edit/{{request()->id}}/{{request()->banner_id}}" --}}
                        <form action ="{{route('admin-page-edit',['page_id' => request()->id])}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- show data !-->

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-overview-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-overview"
                                type="button" role="tab" aria-controls="pills-overview"
                                aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-banner-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-banner"
                                type="button" role="tab" aria-controls="pills-banner"
                                aria-selected="false">Banner</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-head-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-head"
                                type="button" role="tab" aria-controls="pills-head"
                                aria-selected="false">Head</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- content overview !-->
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                                {{-- @foreach ($page_overview_tabs as $item) --}}
                                    <div class="row py-2">
                                        <div class="col-md-3">
                                            <label for="">Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="page_name" value="{{$page_overview_tabs->name}}" placeholder="{{__('Name')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-3">
                                            <label for="">Url_code</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="page_code" value="{{$page_overview_tabs->url_code}}" placeholder="{{__('Url-code')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-3">
                                            <label for="">Enabled</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="page_enabled" class="form-control">
                                                <?php echo PageController::html_option_enabled($page_overview_tabs->enabled) ?>
                                            </select>
                                        </div>
                                    </div>
                                {{-- @endforeach --}}
                            </div>

                            <!-- content banner !-->
                            <div class="tab-pane fade" id="pills-banner" role="tabpanel" aria-labelledby="pills-banner-tab">
                                {{-- <textarea name="slide_title" id="page_editor_title"></textarea> --}}
                                            @include('Page.partials.tabs_banner')

                                            {{-- <div class="row">
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="header-title">View at</h4>
                                                            <select name="choose_page_id" class="form-control">
                                                                @if ($item->id == $get_selected_page->page_id)
                                                                    <option value="{{$get_selected_page->page_id}}" selected>{{$item->name}}</option>
                                                                @endif
                                                                @foreach ($else_selected_page as $elseItem)
                                                                    <option value="{{$elseItem->id}}">{{$elseItem->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="header-title">Title</h4>
                                                            <div class="col-md">
                                                                <textarea id="data_editor_title" name="page_editor_title"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="header-title">Sub title</h4>
                                                            <div class="col-md">
                                                                <textarea name="page_editor_subtitle"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="header-title">Image</h4>
                                                            <div class="col-md">
                                                                <input type="file" name="image" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                            </div>

                            <!-- content tab !-->
                            <div class="tab-pane fade" id="pills-head" role="tabpanel" aria-labelledby="pills-head-tab">
                                @include('Page.partials.tabs_head')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            {{-- <div class="col-md-2">
                                <a href="{{}}"></a>
                            </div> --}}
                            <div class="col-md-2">
                                <a href="{{route('admin_page_list')}}" class="btn btn-secondary">Back to list</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

