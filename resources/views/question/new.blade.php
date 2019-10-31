@extends('layouts.app')

@section('js')
    <!-- <script src="{{ asset('js/question.js') }}" defer></script> -->
@endsection

@section('content')

<div class="container">
    <div class="content_header">
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <button type="submit" form="new_form" class="btn btn-primary mr-3">保存</button>
                <button type="button" class="btn btn-primary">キャンセル</button>
            </div>
        </div>
    </div>

    <div class="content_main">
        <form id="new_form" class="new_form" method="POST" action="{{ route('question.new.create') }}" >
        @csrf
            @if($errors->has('name')) 
                <span class="text-danger">{{ $errors->first('name') }}</span> 
            @endif
            <div class="row">
                <div class="form-group col-6">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
            </div>
            @if($errors->has('category')) 
                <span class="text-danger">{{ $errors->first('category') }}</span> 
            @endif
            <div class="row">
                <div class="form-group col-6">
                    <label for="category">カテゴリー</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="">
                </div>
            </div>

        </form>
    </div>
</div>
@endsection