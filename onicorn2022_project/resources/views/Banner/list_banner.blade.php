<!-- List Banner !-->
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">List Banner</h3>
                <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#banner_form_add" title="Thêm">Add
                </button>
                <!-- Modal Form Add bannen -->
                @include('Banner.modal.form_add')
	            <!-- End Modal Form Add banner -->
                <form action="">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Sub_Title</th>
                                <th>Photo</th>                          
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
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->subtitle }}</td>
                                    <td>{{ $data->photo }}</td>                               
                                    <td>{{ $data->enabled }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td> 
                                        <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#banner_form_update" title="Update">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>    
                                        {{-- Form Update --}}
                                        {{-- @include('Banner.modal.form_update') --}}
                                        {{-- End form update --}}
                                    </td>     
                                    <td>
                                        <form action="{{ route('destroy_banner',['id'=>$data->id]) }} " method="POST">   
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
<!-- end list Banner !-->