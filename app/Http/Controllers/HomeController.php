<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\SevenFood;
use App\Models\Favorite;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function favorite(Request $request)
    {
        // ユーザー情報の取得
        $user = $request->user();
        $user_id = $user->id;

        // 送信されたデータの取得
        $favoritefoods = $request -> input('favorite');

        //商品データの取得
        $sevenfoods = new SevenFood;
        $sevenfoods = $sevenfoods->sevenfood()->toArray();

        // インスタンス生成
        $allfavorites = new Favorite;

        // 配列の準備
        $favorites = array();

        // ユーザーからtypeリクエストがあれば処理を実行
        if(!empty($favoritefoods)){
            foreach ($favoritefoods as $favoritefood) {
                foreach ($sevenfoods as $sevenfood) {
                  // 商品のデータを配列に格納
                    if($sevenfood['name'] == $favoritefood){
                        $favorites[] = [$sevenfood['name'],$sevenfood['protein'],
                                        $sevenfood['fat'],$sevenfood['carbo'],$sevenfood['kcal'],$sevenfood['type']];
                    }
                }
            }
        }

        // favoritesテーブルに同じ商品があるか確認、なければ新規登録
        foreach($favorites as $favotite=>$value){
            if(DB::table('favorites')->where('name',$value[0])->exists()){
                continue;
            }else{
              DB::insert("insert into favorites (created_at,user_id,name,protein,fat,carbo,kcal,type) values (NOW(),".$user_id.",'".$value[0]."',".$value[1].",".$value[2].",".$value[3].",".$value[4].",'".$value[5]."')");
            }
        }


        $allfavorites = $allfavorites->favorite()->toArray();


        return view('favorite',compact('favoritefoods','sevenfoods','favorites','user','allfavorites'));
    }

    public function result(Request $request)
    {
      // フォームから送られた値をそれぞれ格納
        $needprotein = $request->protein;
        $needfat = $request->fat;
        $needcarbo = $request->carbo;
        $type = array();
        $type = $request->input('type');
        dd($request);


        $sevenfoods = new SevenFood();
        $sevenfoods = $sevenfoods->sevenfood()->toArray();
        $i = 0;

        return view('result',compact('sevenfoods','needprotein','i','needfat','needcarbo','type'));
    }


    public function delete(Request $request)
    {
       //  フォームから送信された値を変数に代入
        $deleteids = $request -> input('delete');

        $allfavorites = new Favorite;

        // チェックボタンにチェックされていればテーブルから削除
        if(empty($deleteids)){
            $empty = "※商品を選択してください";
          }else{
              $empty = "削除しました！";
              foreach($deleteids as $deleteid){
                  Favorite::where('id',$deleteid)->delete();
          }
        }


        return view('delete',compact('deleteids','empty'));
    }
}
