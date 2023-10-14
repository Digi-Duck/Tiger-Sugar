@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        飲品管理(中)-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.drink.store') }}" enctype="multipart/form-data"
                            id="drink_form">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="type_id" class="col-2 col-form-label">類別</label>
                                <div class="col-10">
                                    <select class="form-control" name="type_id" id="type_id" required>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="drink_name" class="col-2 col-form-label">飲品名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="drink_name" name="drink_name" required>
                                </div>
                            </div>
                            <div class="form-group row temp">
                                <label for="type_name" class="col-2 col-form-label">冷飲/熱飲</label>
                                <div class="col-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="cold" name="cold"
                                            value="1">
                                        <label class="form-check-label" for="cold">冷飲</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="hot" name="hot"
                                            value="2">
                                        <label class="form-check-label" for="hot">熱飲</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required
                                        value="{{ old('sort', $sort ?? '1') }}" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.drink.index') }}">
                                    <button type="button" class="btn btn-primary d-block">返回</button>
                                </a>
                                <button id="create-btn" type="button" class="btn btn-primary d-block">新增</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let createBtn = document.querySelector('#create-btn');
        let drinkForm = document.querySelector('#drink_form');
        let cold = document.querySelector('#cold');
        // const tempInputs = document.querySelectorAll('.temp input');

        createBtn.addEventListener('click', function() {
            let formChecked = document.querySelectorAll('.form-check-input:checked');
            console.log(formChecked);
            console.log(formChecked.length);

            cold.removeAttribute('required');
            cold.setCustomValidity('請至少勾選其一品項');
            if (formChecked.length == 0) {
                cold.setAttribute('required', 'true');
            }
            // const tempInput = document.querySelectorAll('.temp input:checked');
            // event.preventDefault();

            console.log(drinkForm.reportValidity());
            // drinkForm.submit();
            // console.log(tempInput.length);
            // if tempInput.length == 0 {

            // }

        });
    </script>
@endsection
