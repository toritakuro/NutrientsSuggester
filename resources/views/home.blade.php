@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">希望の栄養素の量を入力してください</div>

                <div class="d-flex justify-content-center mt-1">
                  <form class="p-2 mx-auto mt-4" action="/result" method="post">
                    @csrf
                  　　タンパク質　
                  　　<div class="col-xs-2">
                    　　{{Form::input('number','protein',100)}} g 以上
                  　　</div>
                  　　脂質　
                  　　<div class="col-xs-2">
                  　　  {{Form::input('number','fat',100)}} g 以下
                  　　</div>
                  　　炭水化物
                  　　<div class="col-xs-2">
                  　　  {{Form::input('number','carbo',100)}} g 以下
                  　　</div>

                  　　<input class="mt-2" type="submit" value="検索" >
                </div>
                <div class="mx-auto mb-4">
                  
                  <p class="mt-4">以下の種類の中から検索</p>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', '揚げ物・フランク・焼き鳥・中華まん', true) }} 揚げ物・フランク・焼き鳥・中華まん
                  {{ Form::checkbox('type[]', 'おでん', true) }} おでん
                  {{ Form::checkbox('type[]', 'おにぎり・お寿司', true) }} おにぎり・お寿司
                  </div>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', 'パン・サンドイッチ', true) }} パン・サンドイッチ
                  {{ Form::checkbox('type[]', 'お弁当', true) }} お弁当
                  {{ Form::checkbox('type[]', 'そば・うどん・中華麺', true) }} そば・うどん・中華麺
                  </div>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', 'パスタ・スパゲッティ・グラタン・ドリア', true) }} パスタ・スパゲッティ・グラタン・ドリア
                  {{ Form::checkbox('type[]', '惣菜', true) }} 惣菜
                  {{ Form::checkbox('type[]', 'サラダ', true) }} サラダ
                  </div>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', '７プレミアム(主菜)', true) }} ７プレミアム(主菜)
                  {{ Form::checkbox('type[]', '７プレミアム(サラダ)', true) }} ７プレミアム(サラダ)
                  {{ Form::checkbox('type[]', '７プレミアム(その他)', true) }} ７プレミアム(その他)
                  </div>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', '生鮮', true) }} 生鮮
                  {{ Form::checkbox('type[]', 'インスタント・レトルト食品', true) }} インスタント・レトルト食品
                  {{ Form::checkbox('type[]', '珍味・缶詰', true) }} 珍味・缶詰
                  </div>
                  <div class="justify-content-center">
                  {{ Form::checkbox('type[]', '冷凍食品', true) }} 冷凍食品
                  </div>
                </div>

                　</form>


            </div>
        </div>
    </div>
</div>
@endsection
