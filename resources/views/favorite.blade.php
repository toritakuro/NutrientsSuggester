@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('お気に入り一覧') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="lh-lg">
                    <?php
                    $counter = 1;
                    foreach ($allfavorites as $allfavorite => $value) {
                      if($value['user_id'] == $user->id){?>

                          <form class="pull-left pt-4" action="/delete" method="post">
                          {{Form::checkbox('delete[]',$value['id'])}}
                      <?php
                          echo $counter.'：'.$value['name'].'('.$value['type'].')'.'<br>'.
                          '【・タンパク質:'.$value['protein'].'g'.'・脂質:'.$value['fat'].'g'.'・炭水化物:'.$value['carbo'].'g'.'   kcal:'.$value['kcal'].'】'.'<br>';
                          $counter ++;
                      }
                    }
                    ?>
                    @csrf
                    <input class="mt-3" type="submit" value="選択した商品をお気に入りから削除" >
                  </form>

                    <form class="text-center mt-5" action="/home" method="post">
                        @csrf
                        <input type="submit" value="ホームに戻る" >
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
