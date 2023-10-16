@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($seoes as $seo)
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        {{$seo->name}}
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form action="/admin/seo/{{$seo->id}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$seo->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="keyword" class="col-form-label">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{$seo->keyword}}" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$seo->description}}" required>
                            </div>
                            <hr>
                            <div class="offset-5 col-2 text-center">
                                <button class="btn btn-success btn-sm">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
@endsection

