<!-- List news !-->
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">List Head</h3>
                <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#head_form_add" title="Thêm">Add
                </button>
                <!-- Modal Form Add News -->
                @include('Head.modal.form_add')
	            <!-- End Modal Form Add News -->
                <form action="">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Page</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Enabled</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->page_id }}</td>
                                    <td>{{ $data->title }}</td>    
                                    <td>{{ $data->content }}</td>
                                    <td>{{ $data->enabled }}</td>
                                    
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                   
                                    <td>
                                        <form action="{{ route('destroy_head',['id'=>$data->id]) }} " method="POST">   
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