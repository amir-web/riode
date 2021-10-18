@extends('layouts.adminLte')
@section('content')
    <section class="content-header">
        <h1>
            Изменить продукта
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            @include('admin.errors')
            <form method="post" action="{{route('upd')}}" enctype="multipart/form-data">
                @csrf

                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем продукт</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pro_name">Название</label>
                            <input type="text" name="name" class="form-control" id="pro_name" placeholder="" value="{{$edit_pro->name}}">
                        </div>



                        <div class="form-group">
                            <label>Категория</label>
                            <select name="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="{{$def_cat->id}}">{{$def_cat->title}}</option>
                                @include('admin.category._categories')
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" name="price" class="form-control" id="pro_price" placeholder="" value="{{$edit_pro->price}}">
                        </div>
                        <div class="form-group">
                            <label for="old_price">Старая Цена</label>
                            <input type="text" name="old_price" class="form-control" id="pro_old_price" placeholder="" value="{{$edit_pro->old_price}}">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{$edit_pro->description}}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" value="{{$edit_pro->content}}"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Базовое изображение</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="{{ route('uploadimage') }}" data-name="single">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 125х200</small></p>
                                        <div class="single">
                                            <img src="/public/uploads/products/{{$edit_pro->img}}" alt="" style="max-height: 150px;">
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box box-primary box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Картинки галереи</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="multi" class="btn btn-success" data-url="{{ route('uploadimage') }}" data-name="multi">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 700х1000</small></p>
                                        <div class="multi">
                                            @foreach($gallery as $item)
                                                <img src="/public/uploads/products/{{$item->img}}" alt="" style="max-height: 150px; cursor: pointer;" data-url="{{ route('delmultiimage') }}" data-id="{{$item->id}}" data-src="{{$item->img}}" class="del-item">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="number" value="{{$edit_pro->id}}" name="id" style="display: none">
                    <button class="btn btn-success pull-right" type="submit">Update</button>
                </div>

            </form>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>

    <style>
        .overlay{
            display: none;
        }
    </style>
@endsection
