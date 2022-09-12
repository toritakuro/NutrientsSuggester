@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">希望の栄養素の量を入力してください</div>

                <div class="d-flex justify-content-center mt-1">
                  <!-- 入力フォーム -->
                  <form class="p-2 mx-auto mt-4" action="/result" method="post">
                    @csrf
                  　　タンパク質　
                  　　<div class="col-xs-2">
                    　　{{Form::input('number','protein',10)}} g 以上
                  　　</div>
                  　　脂質　
                  　　<div class="col-xs-2">
                  　　  {{Form::input('number','fat',100)}} g 以下
                  　　</div>
                  　　炭水化物
                  　　<div class="col-xs-2">
                  　　  {{Form::input('number','carbo',100)}} g 以下
                  　　</div>
                  <!-- 検索ボタン -->
                  　　<input class="mt-2" type="submit" value="検索" >
                </div>
                <div class="mx-auto mb-4">

                  <!-- 種類のチェックボタン -->
                  <p class="mt-4">以下の種類の中から検索</p>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="揚げ物・フランク・焼き鳥・中華まん">揚げ物・フランク・焼き鳥・中華まん
                      <input type="checkbox" name=type[] value="おでん">おでん
                      <input type="checkbox" name=type[] value="おにぎり・お寿司">おにぎり・お寿司
                  </div>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="パン・サンドイッチ">パン・サンドイッチ
                      <input type="checkbox" name=type[] value="お弁当">お弁当
                      <input type="checkbox" name=type[] value="そば・うどん・中華麺">そば・うどん・中華麺
                  </div>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="パスタ・スパゲッティ・グラタン・ドリア">パスタ・スパゲッティ・グラタン・ドリア
                      <input type="checkbox" name=type[] value="惣菜">惣菜
                      <input type="checkbox" name=type[] value="サラダ">サラダ
                  </div>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="７プレミアム(主菜)">７プレミアム(主菜)
                      <input type="checkbox" name=type[] value="７プレミアム(サラダ)">７プレミアム(サラダ)
                      <input type="checkbox" name=type[] value="７プレミアム(その他)">７プレミアム(その他)
                  </div>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="生鮮">生鮮
                      <input type="checkbox" name=type[] value="インスタント・レトルト食品">インスタント・レトルト食品
                      <input type="checkbox" name=type[] value="珍味・缶詰">珍味・缶詰
                  </div>
                  <div class="justify-content-center">
                      <input type="checkbox" name=type[] value="冷凍食品">冷凍食品
                      <input type="checkbox" name=type[] value="７プレミアム(副菜)">７プレミアム(副菜)
                  </div>
                </div>

                　</form>


            </div>
        </div>
    </div>
</div>
@endsection
