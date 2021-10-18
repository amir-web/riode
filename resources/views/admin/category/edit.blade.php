@extends('layouts.adminLte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Изменение категории
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <form action="{{route('category.update',['category' => $edit_cat->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="box-header with-border">
                    <h3 class="box-title">Изменение категории</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" name="cat_name" id="exampleInputEmail1" placeholder="" value="{{$edit_cat->title}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название на русском</label>
                                <input type="text" class="form-control" name="cat_ru_name" id="exampleInputEmail1" placeholder="" value="{{$edit_cat->ru_title}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название на англиском</label>
                                <input type="text" class="form-control" name="cat_en_name" id="exampleInputEmail1" placeholder="" value="{{$edit_cat->en_title}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Слаг</label>
                                <input type="text" class="form-control" name="cat_slug" id="exampleInputEmail1" placeholder="" value="{{$edit_cat->slug}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Родительская категория</label>
                                <select name="parent_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="0">-- без родительской категории --</option>
                                    @include('admin.category._categories')
                                    {{--<option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>--}}
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Сохранить</button>
                </div>
                <!-- /.box-footer-->
            </form>
        </div>
        <!-- /.box -->

    </section>
@endsection
