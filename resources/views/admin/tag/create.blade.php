@extends('admin.layouts.head')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление тэга</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Тэги</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Register content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <h5>Добавление категории</h5>
                        <div class="form-group">
                        <form action="{{route('admin.tag.store')}}" method="post" class="w-25">
                            {{csrf_field()}}
                            <label>Название</label>
                            <input type="text" class="form-control" placeholder="Название тэга" name="title">
                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-primary">Добавить тэг</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()
