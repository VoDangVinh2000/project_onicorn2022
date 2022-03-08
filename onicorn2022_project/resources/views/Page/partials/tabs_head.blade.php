<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <p class="d-none">{{$i = 1}}</p>
    @if ($head_tabs->isEmpty())
        <p>There are no head.</p>
    @else
        @foreach ($head_tabs as $item)
            <li class="nav-item" role="presentation">
                <input type="hidden" name="idHead" value="{{$item->id}}">
                <button name="btnHead" class="nav-link" id="pills-head-tab"
                data-bs-toggle="pill" data-bs-target="#pills-head"
                type="button" role="tab" aria-controls="pills-head"
                aria-selected="false">Head {{$i++}} </button>
            </li>
        @endforeach
    @endif
</ul>
<div class="tab-content" id="pills-tabContent-head">

    <div id="content-tabs-head">

    </div>
    <!-- content tab !-->
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
        {{-- <div class="tab-pane fade show active" id="pills-head" role="tabpanel" aria-labelledby="pills-head-tab">
            <p>asds</p>
        </div> --}}


</div>




