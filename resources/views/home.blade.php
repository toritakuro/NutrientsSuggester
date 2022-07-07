@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">タンパク質の量を入力してください</div>

                <div class="d-flex align-items-center justify-content-center m-4">
                  <form action="/result" method="post">
                    @csrf
                  {{Form::input('number','protein',0)}} g
                  <input type="submit" value="検索" >
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
