@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('結果') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="lh-lg">
                    <?php

                    // 合計値変数の初期値に０を代入
                    $totalprotein = 0;
                    $totalkcal = 0;
                    $totalfat = 0;
                    $totalcarbo = 0;


                    // 便宜上試行回数を542回までにする
                    while ($i <= 542) {
                      // $foodsからランダムにデータを取り出す
                      $randomfood = Arr::random($sevenfoods);

                      if (!(in_array('揚げ物・フランク・焼き鳥・中華まん',$type))) {
                          if($randomfood['type'] == '揚げ物・フランク・焼き鳥・中華まん'){
                              continue;
                          }
                      }
                      if (!(in_array('おでん',$type))) {
                          if($randomfood['type'] == 'おでん'){
                              continue;
                          }
                      }
                      if (!(in_array('おにぎり・お寿司',$type))) {
                          if($randomfood['type'] == 'おにぎり・お寿司'){
                              continue;
                          }
                      }
                      if (!(in_array('パン・サンドイッチ',$type))) {
                          if($randomfood['type'] == 'パン・サンドイッチ'){
                              continue;
                          }
                      }
                      if (!(in_array('お弁当',$type))) {
                          if($randomfood['type'] == 'お弁当'){
                              continue;
                          }
                      }
                      if (!(in_array('揚げ物・フランク・焼き鳥・中華まん',$type))) {
                          if($randomfood['type'] == '揚げ物・フランク・焼き鳥'){
                              continue;
                          }
                      }
                      if (!(in_array('そば・うどん・中華麺',$type))) {
                          if($randomfood['type'] == 'そば・うどん・中華麺'){
                              continue;
                          }
                      }
                      if (!(in_array('パスタ・スパゲッティ・グラタン・ドリア',$type))) {
                          if($randomfood['type'] == 'パスタ・スパゲッティ・グラタン・ドリア'){
                              continue;
                          }
                      }
                      if (!(in_array('惣菜',$type))) {
                          if($randomfood['type'] == '惣菜'){
                              continue;
                          }
                      }
                      if (!(in_array('サラダ',$type))) {
                          if($randomfood['type'] == 'サラダ'){
                              continue;
                          }
                      }if (!(in_array('７プレミアム(主菜)',$type))) {
                          if($randomfood['type'] == '７プレミアム(主菜)'){
                              continue;
                          }
                      }
                      if (!(in_array('７プレミアム(サラダ)',$type))) {
                          if($randomfood['type'] == '７プレミアム(サラダ)'){
                              continue;
                          }
                      }
                      if (!(in_array('７プレミアム(その他)',$type))) {
                          if($randomfood['type'] == '７プレミアム(その他)'){
                              continue;
                          }
                      }
                      if (!(in_array('生鮮',$type))) {
                          if($randomfood['type'] == '生鮮'){
                              continue;
                          }
                      }
                      if (!(in_array('インスタント・レトルト食品',$type))) {
                          if($randomfood['type'] == 'インスタント・レトルト食品'){
                              continue;
                          }
                      }
                      if (!(in_array('珍味・缶詰',$type))) {
                          if($randomfood['type'] == '珍味・缶詰'){
                              continue;
                          }
                      }
                      if (!(in_array('冷凍食品',$type))) {
                          if($randomfood['type'] == '冷凍食品'){
                              continue;
                          }
                      }

                      // 無限ループ対策で先に$iを加算
                      $i ++;


                      // fat,carboの合計値が入力された値を越えたら処理をやり直し
                      if($needfat < $totalfat + $randomfood['fat'] ||
                        $needcarbo < $totalcarbo + $randomfood['carbo']) {
                          continue;
                        }

                      // 取り出したデータを表示
                      echo '・'.$randomfood['name'].'('.$randomfood['type'].')';
                      echo '<br>';
                      echo '【・タンパク質:'.$randomfood['protein'].'g'.'・脂質:'.$randomfood['fat'].'g'.'・炭水化物:'.$randomfood['carbo'].'g'.'   kcal:'.$randomfood['kcal'].'】';
                      echo '<br>';

                      // 処理を行う毎にタンパク質、カロリー、脂質、炭水化物量を足していく
                      $totalprotein = $totalprotein + $randomfood['protein'];
                      $totalkcal = $totalkcal + $randomfood['kcal'];
                      $totalfat = $totalfat + $randomfood['fat'];
                      $totalcarbo = $totalcarbo + $randomfood['carbo'];

                        // proteinの値が条件を満たしたら終了
                      if($totalprotein >= $needprotein){
                        break;
                      }

                    }

                    // それぞれの合計値を表示
                    echo '<br>';
                    echo '総タンパク質量約'.$totalprotein.'g';
                    echo '<br>';
                    echo '総脂質量約'.$totalfat.'g';
                    echo '<br>';
                    echo '総炭水化物量約'.$totalcarbo.'g';
                    echo '<br>';
                    echo '総カロリー約'.$totalkcal.'kcal';
                    echo '<br>';
                    echo '<br>';

                    if ($totalprotein<$needprotein) {
                        echo "条件に合う検索結果が得られませんでした。お手数ですが、もう一度検索してください。";
                    }
                     ?>
                   　</div>

                     <!-- ホームボタンの設置 -->
                     　<form class="text-center" action="/home" method="post">
                       @csrf
                       <input type="submit" value="ホームに戻る" >
                       <a onclick="window.location.reload();">
                       <input type="button" value="再検索" >
                    　 </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
