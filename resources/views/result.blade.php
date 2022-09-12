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
                    $resultfoods = array();

                    dd($type);


                    // 便宜上試行回数を542回までにする
                    while ($i <= 542) {
                        // 無限ループ対策で先に$iを加算
                        $i ++;

                        // $sevenfoodsからランダムにデータを取り出す
                        $randomfood = Arr::random($sevenfoods);

                        // randomfoodのtypeがユーザーの希望しないtypeだったらやり直し
                        if (!(in_array($randomfood['type'],(array)$type,true))) {

                                continue;

                        }



                      // fat,carboの合計値が入力された値を越えたら処理をやり直し
                      if($needfat < $totalfat + $randomfood['fat'] ||
                         $needcarbo < $totalcarbo + $randomfood['carbo']) {
                           continue;
                      }

                      // 配列にデータを格納
                      $resultfoods[] = [$randomfood['name'],$randomfood['protein'],$randomfood['fat'],
                                        $randomfood['carbo'],$randomfood['kcal'],$randomfood['type']];

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

                    // データ表示用にカウンター変数を準備
                    $counter = 1;

                    // データがユーザーの希望に沿っていればデータの表示
                    if ($totalprotein >= $needprotein &&
                        $totalfat <= $needfat &&
                        $totalcarbo <= $needcarbo) {
                            // 取り出したデータを表示
                            foreach ($resultfoods as $resultfood => $value) {?>
                              <form class="pull-left pt-4" action="/favorite" method="post">
                              {{Form::checkbox('favorite[]',$value[0])}}
                            <?php
                              echo $counter.'：'.$value[0].'('.$value[5].')'.'<br>'.
                              '【・タンパク質:'.$value[1].'g'.'・脂質:'.$value[2].'g'.'・炭水化物:'.$value[3].'g'.'   kcal:'.$value[4].'】'.'<br>';
                              $counter ++;
                            }?>

                              @csrf
                              <input class="mt-3" type="submit" value="選択した商品をお気に入りに登録" >
                              </form>

                          <?php
                          // それぞれの合計値を表示
                            echo '<br>';
                            echo '総タンパク質量 '.$totalprotein.'g';
                            echo '<br>';
                            echo '総脂質量 '.$totalfat.'g';
                            echo '<br>';
                            echo '総炭水化物量 '.$totalcarbo.'g';
                            echo '<br>';
                            echo '総カロリー '.$totalkcal.'kcal';
                            echo '<br>';
                            echo '<br>';
                            echo "※ブラウザの更新ボタンで再検索ができます。";
                    }

                    // 結果が希望通りにならなかった場合、メッセージの表示
                    if ($totalprotein<$needprotein) {
                        echo "条件に合う検索結果が得られませんでした。お手数ですが、もう一度検索してください。";
                        echo '<br>';
                        echo "※ブラウザの更新ボタンで再検索ができます。";
                    }


                     ?>
                    </div>


                     <!-- ホームボタンの設置 -->
                     　<form class="text-center" action="/home" method="post">
                         @csrf
                         <input type="submit" value="ホームに戻る" >
                       </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
