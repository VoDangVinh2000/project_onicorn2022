<!-- List menus !-->
<div class="row">
   
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">All menus</h3>
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <h4 class="mt-0 header-title">Default Example</h4> --}}
                                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Photo</th>
                                            <th>Page ID</th>
                                            <th>Enabled</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>

                                        
                                        @foreach($banners as $banner)
                                        <tbody>
                                            <tr>
                                            <td>{{ $banner->id }}</td>
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->subtitle }}</td>
                                            <td><img height="150px" class="card-img-top" src="{{ asset('storage/uploads/' . $banner->photo) }}" alt="Card image cap"></td>
                                            <td>{{ $banner->page_id }}</td>
                                            <th>{{ $banner->enabled }}</th>
                                            <td>{{ $banner->created_at }}</td>
                                            <td>{{ $banner->updated_at }}</td>
                                            <td><a color="blue" href="{{ route('admin-banner.edit', $banner->id) }}"><i class="fas fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin-banner.destroy', $banner->id) }}" method="post" onsubmit="return confirm('Xóa banner?')">
                                                @csrf
                                               @method('DELETE')
                                             <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                               </form>
                                            </td>
                                         
                                        </tr>
                                      
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <a href="{{ route('admin-banner.create') }}">Add Banner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form add !-->
  
    <!--end form add !-->
</div>
<!-- end list menus !-->
