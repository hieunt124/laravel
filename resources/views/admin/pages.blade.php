<div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            <li class="paginate_button page-item previous " id="example2_previous">
                <a href="{{$users->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
            </li>
            @foreach (range(1, $users->lastPage()) as $page)
            @if ($page == $users->currentPage())
            <button class="active page-link">{{ $page }}</button>
            @else
            <a href="{{ $users->url($page) }}" class="btn page-link">{{ $page }}</a>
            @endif
            @endforeach
            <li class="paginate_button page-item next" id="example2_next">
                <a href="{{$users->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
            </li>
        </ul>
    </div>
</div>
