{{-- khang --}}
<!-- List menus !-->
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">All menus</h3>
             
                <hr>
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
                                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" title="Thêm" href="{{route('add_menus',$data->id)}}"  >
                                                <i class="fa fa-address-card"></i>
                                            </a>
                                            {{-- {{ route('add_menus',$data->id) }} --}}
                                            <a target="blank" class="btn btn-info" id="btnShow" href="#" title="Show">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add</button> --}}
                                            <a target="blank" class="btn btn-primary" href="#" id="btnUpdate" title="Chỉnh sửa">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
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

<script>
    error=false
    
    function validate()
    {
        if(document.list.name.value !='' && document.custForm.email.value !='' && document.list.address.value !='')
            document.list.btnsave.disabled=false
        else
            document.list.btnsave.disabled=true
    }
    </script>

