<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;//これがないとダメ!!
use App\Clear;//これがないとダメ!!
use Illuminate\Support\Facades\Auth;

class estimatorController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $musics = Music::all();

        if(Auth::check()){
            $clears = Clear::where('u_id',$user->id)->get();///getをかかないとダメ！！！
            foreach($musics as $music){
                if(Clear::where('m_id',$music->m_id)->where('u_id',$user->id)->count()==0){
                    $clear = new Clear;
                    $clear->m_id = $music->m_id;
                    $clear->u_id = $user->id;
                    $clear->info = 0;
                    $clear->save();
                }
            }
        }
        else{
            $clears=null;
        }

        if($request->method()=='POST'){
            if(Auth::check()){
                foreach($musics as $music){
                    $clear = Clear::where('m_id',$music->m_id)->where('u_id',$user->id)->first();
                    $m_id = $music->m_id;
                    $clear->info = (int)$request->$m_id;
                    //$clear->timestamps = false;
                    $clear->save();
                }
            }
            else{
                //即値で→blade側にold値を表示
            }
        }

        if(Auth::check()){
            $clears = Clear::where('u_id',$user->id)->get();
            $jiriki = array();
            foreach($clears as $clear){
                switch($clear->info){
                case 0:
                    break;
                case 1:
                    array_push($jiriki,$musics->where('m_id',$clear->m_id)->first()->e);
                    break;
                case 2:
                    array_push($jiriki,$musics->where('m_id',$clear->m_id)->first()->n);
                    break;
                case 3:
                    array_push($jiriki,$musics->where('m_id',$clear->m_id)->first()->h);
                    break;
                case 4:
                    array_push($jiriki,$musics->where('m_id',$clear->m_id)->first()->exh);
                    break;
                case 5:
                    array_push($jiriki,$musics->where('m_id',$clear->m_id)->first()->fc);
                    break;
                }
            }
        }
//ここに推定値の処理
        if(!isset($jiriki)){$jiriki=-100;}
        elseif(count($jiriki)==0){$jiriki=-100;}
        else{
            rsort($jiriki);
            $num=ceil(count($jiriki)*0.3);
            $sum=0;
            for($i=0;$i<$num;$i++){
                $sum+=$jiriki[$i];
            }
            $sum=$sum/$num;
            $jiriki=$sum;
        }

        $param = ['musics' => $musics,'user' => $user,'clears' => $clears,'jiriki' => $jiriki];
        return view('estimator.index',$param);
    }
    public function logout(){
        Auth::logout();
        return redirect()->action('estimatorController@index');
    }
}
