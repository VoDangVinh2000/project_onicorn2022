@extends('Layouts.master')
@section('title','Page|List')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-3">
                            <a target="blank" href="{{route('admin_page_add')}}" class="btn btn-success py-2">Add page</a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Enabled</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @foreach (config('pages_value.array_html_option_enabled') as $key_enabled => $item_enabled)
                                            @if ($key_enabled == $item->enabled)
                                                {{$item_enabled}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <th>{{$item->created_at}}</th>
                                    <th>{{$item->updated_at}}</th>
                                    <td>
                                        <a target="blank" href="{{$item->url_code}}" title="Xem" class="btn btn-sm btn-info">
                                            <i class="fa fa-newspaper-o"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a target="blank" href="/admin-page-list/{{$item->id}}" title="Sửa" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin_page_delete',['id' => $item->id])}}" title="Xóa" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
