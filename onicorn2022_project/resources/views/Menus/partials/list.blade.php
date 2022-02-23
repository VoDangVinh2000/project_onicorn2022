<!-- List menus !-->
<div class="row">
    <div class="col-md-6 mb-3">
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
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Icon</th>
                                            <th>Enabled</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td>Home</td>
                                            <td>http://happyfruits...</td>
                                            <td>...</td>
                                            <td>Hoạt động</td>
                                            <td>2011/04/25</td>
                                            <td>2022-02-22</td>
                                        </tr>
                                        <tr>
                                            <td>Home</td>
                                            <td>http://happyfruits...</td>
                                            <td>...</td>
                                            <td>Hoạt động</td>
                                            <td>2011/04/25</td>
                                            <td>2022-02-22</td>
                                        </tr> <tr>
                                            <td>Home</td>
                                            <td>http://happyfruits...</td>
                                            <td>...</td>
                                            <td>Hoạt động</td>
                                            <td>2011/04/25</td>
                                            <td>2022-02-22</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form add !-->
        @include('Menus.partials.form_add')
    <!--end form add !-->
</div>
<!-- end list menus !-->
