@extends('layouts.adminLte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('category.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 175px;">ID</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Название: activate to sort column ascending" style="width: 388px;">Название</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Действия: activate to sort column ascending" style="width: 385px;">Действия</th></tr>
                    </thead>
                    <tbody>


                    @if(count($cat))
                        @foreach($cat as $item)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$item->id}}</td>
                                <td>{{$item->title}}
                                </td>
                                <td style="display: flex">
                                    <a href="{{ route('category.edit', ['category' => $item->id]) }}" class="fa fa-pencil"></a>
                                    <form action="{{ route('category.destroy', ['category' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="border: none;background: none;color: #3c8dbc;" type="submit" class="fa fa-remove"></button>
                                    </form>
                                    {{--<a href="{{ route('category.destroy', ['category' => $item->id]) }}" class="fa fa-remove"></a>--}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h2>Empty ;(</h2>
                    @endif
                    {{--<tr role="row" class="even">
                        <td class="sorting_1">2</td>
                        <td>Работа</td>
                        <td><a href="edit.html" class="fa fa-pencil"></a> <a href="#" class="fa fa-remove"></a></td>
                    </tr>--}}
                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
