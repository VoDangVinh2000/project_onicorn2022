<!-- List news !-->
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">List News</h3>
                <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#new_form_add" title="Thêm">Add
                </button>
                <!-- Modal Form Add News -->
                @include('News.modal.form_add')
	            <!-- End Modal Form Add News -->
                <form action="">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Enabled</th>
                                <th>Featured</th>
                                <th>Deleted</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="2q">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->photo_sub }}</td>
                                    <td>{{ $data->author_name }}</td>
                                    <td>{{ $data->content }}</td>
                                    <td>{{ $data->enabled }}</td>
                                    <td>{{ $data->featured	 }}</td>
                                    <td>{{ $data->deleted }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td> 
                                        <a type="button" class="btn btn-warning m-2" href="{{route('edit_new',['id'=>$data->id])}}" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </td>     
                                    <td>
                                        <form action="{{ route('destroy_new',['id'=>$data->id]) }} " method="POST">   
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger"  title="Xóa">
                                                    <i class="fa fa-times-circle"></i>
                                                </button>
                                        </form>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                                
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end list news !-->