{{-- khang --}}
<!-- List menus !-->
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">All menus</h3>
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Thêm">
                    <i class="fa fa-address-card"></i>  
                </button> --}}
                <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#menu_form_add" title="Thêm">Add
                </button>
                <!-- Modal Form Add Start-->
                @include('Menus.modal.form_add')
	            <!-- Modal Form Add End-->
                <form action="">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Enabled</th>
                                {{-- <th>Created</th>
                                <th>Updated</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->link_href }}</td>
                                    <td>{{ $data->icon }}</td>
                                    <td>{{ $data->enabled }}</td>
                                    {{-- <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td> --}}
                                    <td>
                                        <form action="#" method="POST">
                                        
                                            {{-- {{ route('add_menus',$data->id) }} --}}
                                           
                                            <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#menu_form_edit" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                            {{-- @include('Menus.modal.form_edit') --}}
                                            @csrf
                                            @method('DELETE')
                                             <a target="blank" class="btn btn-danger" id="btnDelete" href="#" title="Xóa">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        </form>
                                            
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>                                
                </form>
            </div>
        </div>
    </div>

    <!-- Form Menu Structure !-->
        @include('Menus.partials.form_menu_structure')
    <!--end form Menu Structure !-->
</div>
<!-- end list menus !-->
