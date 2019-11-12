<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Stamp;


class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $userName = Session::get("account","Guest");
        return view("fronted.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $memberPassword = $request -> password;
        $memberName = $request -> name;
        $memberAccount = $request -> account;
        $email = $request -> email;
        //帳號密碼驗證需英數字6到12碼
        $pwFlag = preg_match('/^\w{6,12}$/', $memberPassword);
        $acFlag = preg_match('/^\w{6,12}$/', $memberAccount);

        $memberPassword = Hash::make($memberPassword);
        $count = User::where('Account', '=', $memberAccount)->count();
       
        
        if($count==0 && $pwFlag && $acFlag && $memberName !=""){
            $msg=User::insert([
                'Account'=>$memberAccount,
                'Password'=>$memberPassword,
                'Name'=>$memberName,
                'GameCoin'=>100
            ]);
            
            $UserID=User::where('Account',$memberAccount)->pluck('UserID');
            
            Stamp::insert([
                'UserID'=>$UserID[0],
                'GetWay'=>'Register',
                'GameCoin'=>100
                ]);

            echo "success";
            // var_dump($msg);
            // $data = User::ALL();
            // echo $data;
        } else {
            echo "fail";
            // die();
            
        }
        // return array($name,$account,$email);
        // dd($name,$account,$email);
        // dd($account);
        // dd($email);
    }

    public function login(Request $request){
        $memberAccount = $request -> account;
        $memberPassword = $request -> password;
        $count = User::where('Account', '=', $memberAccount)->count();
        if($count){
            // 帳號存在
            $user = User::where('Account', '=', $memberAccount)->firstOrFail();
            
            if (Hash::check($memberPassword, $user->Password))
            {
                // The passwords match...
                // echo 'success';
                Session::put("account",$memberAccount);
                Session::put("Permission",$user->Permission);
                // $Per=Session::get("Permission");
                // echo $Per;
                $arr["status"] = 1;
                $arr["account"] = $memberAccount;
                $arr["permission"] = $user->Permission;
                $arr["gameCoin"] = $user->GameCoin;
                echo json_encode($arr);
                // Session::put("account",$memberAccount);
            }else{
                $arr["status"] = 0;
                echo json_encode($arr);
            }
            
            // if($memberPassword === $user->memberPassword){
            //     echo 'success';
            // }else{
            //     echo 'pw not correct';
            // }
        }else{
            // 帳號不存在
            // echo 'error';
            $arr["status"] = 0;
            echo json_encode($arr);
        }
        // if( User::find($memberAccount)==true){
        //     echo 'success';
        // }else{
        //     echo "account doen't exist";
        // }
        // return $model;
        // return $model->memberPassword;
        // var_dump($model->memberPassword);
        
    }

    public function logout(Request $request){
        if(isset($request->logout) && $request->logout==1){
            // $logout= $request->logout;
            Session::pull("account");
            Session::pull("Permission");
            echo "1";
        } else {
            echo "0";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Phone = $request -> phone;
        $Address = $request -> address;
        $Account=Session::get("account");
        $msg = User::where('Account',$Account)->update(['Phone'=>$Phone,'Address'=>$Address]);
        // echo $msg;
        // dd ($msg);
        if($msg){
            echo "1";
        } else {
            echo "0";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // navbar顯示使用者有多少代幣
    public function navbar(Request $request)
    {
        $user = User::where('Account', '=', Session::get("account"))->firstOrFail();
        echo $user->GameCoin;
    }
}
