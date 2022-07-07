@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- データが受け取れているかの確認 -->
                    <?php
                      echo $needprotein;
                      foreach ($foods as $food) {
                        echo $food -> name;
                      }
                     ?>
                     <!-- ホームボタンの設置 -->
                     <form action="/home" method="post">
                       @csrf
                       <input type="submit" value="ホームに戻る" >
                     </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
