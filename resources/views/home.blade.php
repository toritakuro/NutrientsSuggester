@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">希望の栄養素の量を入力してください</div>

                <div class="d-flex  justify-content-center mt-1">
                  <form class="p-5" action="/result" method="post">
                    @csrf
                  タンパク質　
                  <div class="col-xs-2">
                    {{Form::input('number','protein')}} g
                  </div>
                  脂質　
                  <div class="col-xs-2">
                    {{Form::input('number','fat')}} g 以下
                  </div>
                  炭水化物
                  <div class="col-xs-2">
                    {{Form::input('number','carbo')}} g 以下
                  </div>
                  <input class="mt-2" type="submit" value="検索" >
                </form>
                </div>
                <p class = "text-center">※タンパク質は入力された値の±５gで検索します</p>

            </div>
        </div>
    </div>
</div>
@endsection
