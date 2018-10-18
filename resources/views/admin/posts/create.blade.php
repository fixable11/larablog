@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить статью
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {{Form::open([
        'route' => 'posts.store',
        'files' => true,
        ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем статью</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Лицевая картинка</label>
                        <input name="image" type="file" id="exampleInputFile">

                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach ($categories as $cat_id => $category)
                            <option value="{{$cat_id}}">{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                            @foreach ($tags as $tag_id => $tag)
                            <option value="{{$tag_id}}">{{$tag}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        <label>Дата:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="{{old('date')}}" name="date" type="text" class="form-control pull-right" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="is_featured">
                        </label>
                        <label>
                            Рекомендовать
                        </label>
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="status">
                        </label>
                        <label>
                            Черновик
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-default">Назад</button>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
    <!-- /.content -->
</div>
@endsection