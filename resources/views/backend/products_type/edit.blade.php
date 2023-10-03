@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品類型管理-編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/products_type/update/{{$list->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" value="{{$list->sort}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tw_name" class="col-2 col-form-label">商品種類 (中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="tw_name" name="tw_name" value="{{$list->tw_name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="en_name" class="col-2 col-form-label">商品種類 (英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="en_name" name="en_name"  value="{{$list->en_name}}" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        });
    </script>
@endsection
