@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row m-5">
        <div class="col-md-3 offset-md-9 text-right">
            <button type="button" class="btn btn-primary">作成</button>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item p-3 mb-3 text-center">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="m-0">タイトル</h3>
                </div>
                <div class="col-md-3">
                    <h3 class="m-0">問題数</h3>
                </div>
                <div class="col-md-3">
                    <h3 class="m-0">チャレンジ</h3>
                </div>
                <div class="col-md-3">
                    <h3 class="m-0">点数</h3>
                </div>
            </div>
        </li>
        <li class="list-group-item p-3 mt-3">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <p class="m-0">php</p>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <p class="m-0">10</p>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-primary">チャレンジ</button>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <p class="m-0">50点</p>
                </div>
            </div>
        </li>
    </ul>
</div>

@endsection