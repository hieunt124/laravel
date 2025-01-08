<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- jsGrid -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid-theme.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
    <style>
        /* Thiết lập body */
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    line-height: 1.6;*/
        /*    background-color: #f4f4f9;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*    height: 100vh;*/
        /*}*/

        /* Container cho bảng */
        .pagination .active {
            color: red;
            font-weight: bold;
        }

        /*.pagination .page-item .page-link {*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            padding: 10px;
            border-radius: 5px;
        }

        .pagination .page-link svg {
            vertical-align: middle;
            width: 16px;
            height: 16px;
        }

        .table-container {
            width: 80%;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Thiết kế bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 5px;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        tr {
            border-bottom: 1px solid #dddddd;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        /* Nút hành động */
        .btn {
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
        }
    </style>
</head>
</html>
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
