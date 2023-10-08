@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        飲品類型管理(中)-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.drink_type.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="type_name" class="col-2 col-form-label">類型名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="type_name" name="type_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_info" class="col-2 col-form-label">副標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="type_info" name="type_info" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="0" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
