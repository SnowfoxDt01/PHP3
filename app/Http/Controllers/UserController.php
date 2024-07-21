<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    public function listUsers(){
        // echo "123";
        $listUsers = DB::table('users')
        ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
        ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'users.tuoi', 'phongban.ten_donvi')
        ->get();
        return view('users/listUsers')->with([
            'listUsers' => $listUsers
        ]);
    }
    public function addUsers(){
        // echo '123';
        $phongBan = DB::table('phongban')
        ->select('id', 'ten_donvi')
        ->get();
        return view('users/addUsers')->with([
            'phongBan' => $phongBan
        ]);
    }
    public function addPostUsers(Request $request){
        $data = [
            'name' => $request->name, // $request->name là lấy tên ở form
            'email' => $request->email,
            'phongban_id' => $request->phongban,
            'tuoi' => $request->tuoi,
            'created_at' => Carbon::now(), // Carbon::now() lấy time hiện tại
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->insert($data);
        
        // gọi truy cập lại cái route
        return redirect()->route('users.listUsers');
    }

    public function deleteUser($userID){
        DB::table('users')->where('id', $userID)->delete();
        return redirect()->route('users.listUsers');
    }

    public function updateUser($userID){
        $phongBan = DB::table('phongban')
        ->select('id', 'ten_donvi')
        ->get();
        $user = DB::table('users')->where('id', $userID)->first();
        return view('users/updateUser')->with([
            'phongBan' => $phongBan,
            'user' => $user

        ]);
        
    }
    public function updatePostUser(Request $request){
        $data = [
            'name' => $request->name, // $request->name là lấy tên ở form
            'email' => $request->email,
            'phongban_id' => $request->phongban,
            'tuoi' => $request->tuoi,
            'songaynghi' => $request->ngaynghi,
            'created_at' => Carbon::now(), // Carbon::now() lấy time hiện tại
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->where('id', $request->userId)->update($data);
        return redirect()->route('users.listUsers');
    }
    public function test(){
        return view('test')->with([
            'var1'=>'1'
        ]);
    }
}
