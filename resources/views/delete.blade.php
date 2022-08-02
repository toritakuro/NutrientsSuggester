@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('お気に入り商品') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="lh-lg">
                      <?php
                      // メッセージの表示
                          echo $empty;
                       ?>
                       <!-- ページ遷移ボタン -->
                      <div class="d-flex justify-content-center p-3">
                          <form class="text-center mr-2" action="/home" method="post">
                              @csrf
                              <input type="submit" value="ホームに戻る" >
                          </form>
                          <form class="text-center ml-2" action="/favorite" method="post">
                              @csrf
                              <input type="submit" value="一覧に戻る" >
                          </form>
                      </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
