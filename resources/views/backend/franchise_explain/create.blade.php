@extends('layouts.backend-template')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/franchiseeExplain.css') }}">

@endsection


@section('main')
<div class="container" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    常見問題管理
                </h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.franchise_explain.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">標題</label>
                            <div class="col-10">
                                <textarea class="form-control" id="title" rows="3" name="title" required value=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">內文</label>
                            <div class="col-10">
                                <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="english_title" class="col-2 col-form-label">標題 (英)</label>
                            <div class="col-10">
                                <textarea class="form-control" id="english_title" rows="3" name="english_title" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="english_content" class="col-2 col-form-label">內文 (英)</label>
                            <div class="col-10">
                                <textarea class="form-control" rows="3" id="english_content" name="english_content" type="text" required></textarea>
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
