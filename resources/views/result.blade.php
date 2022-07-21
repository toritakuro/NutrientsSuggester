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

                    // 検索結果に幅を持たせる場合の処理。$needproteinの±５の値を変数に代入
                    $topneedprotein = $needprotein + 5;
                    $underneedprotein = $needprotein - 5;

                    // 便宜上試行回数を30回までにする
                    while ($i <= 30) {
                      // $foodsからランダムにデータを取り出す
                        $randomfood = Arr::random($sevenfoods);

                      // proteinの合計値が入力された値を越えたら処理をやり直し
                        if($topneedprotein < $totalprotein + $randomfood['protein'] ||
                           $needfat < $totalfat + $randomfood['fat'] ||
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
                        $i ++;

                        // 検索結果に幅を持たせる場合の処理
                        if($totalprotein >= $underneedprotein && $totalprotein <= $topneedprotein){
                          break;
                        } elseif($totalprotein >= $topneedprotein) {
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
                     ?>
                   </div>

                     <!-- ホームボタンの設置 -->
                     　<form class="text-center" action="/home" method="post">
                       @csrf
                       <input type="submit" value="ホームに戻る" >
                       <a onclick="window.location.reload(true);">
                         <input type="button" value="再検索" >
                    　 </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
