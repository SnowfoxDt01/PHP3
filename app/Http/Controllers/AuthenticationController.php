<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
use App\Http\Requests\UserLoginRequest;


class AuthenticationController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(UserLoginRequest $req){
        // validate
        // cách 1 / không có tính kế thừa nên không nên
        // $req->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:6'
        // ], [
        //     'email.required' => 'Email không được để trống',
        //     'email.email' => 'Email không đúng dịnh dạng',
        //     'email.exists' => 'Email chưa được đăng ký',
        //     'password.required' => 'Password không được để trống',
        //     'password.min' => 'Password ít nhất 6 ký tự'
        // ]);



        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        $remember = $req->has('remember');

        if(Auth::attempt($dataUserLogin, $remember)){
            // // logout hết các tài khoản khác
            // Session::where('user_id', Auth::user_id())->delete();
            // // tạo phiên đăng nhập mới
            // session()->put('user_id', Auth::user_id());

            // đăng nhập thành côgn
            if(Auth::user()->role == '1' ){
                return redirect()->route('admin.products.listProduct')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }
            else{
                // đăng nhập vào user
                echo "đăng nhập vào user";
            }
        }
        else{
            // đăng nhập thất bại
            return redirect()->back()->with([
                'message' => 'Email hoặc password không đúng'
            ]);
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }

    public function register(){
        return view('register');
    }

    public function postRegister(Request $req){
        $check = User::where('email', $req->email)->exists();
        if($check){
            return redirect()->back()->with([
                'message' => 'Tài khoản email đã tồn tại'
            ]);
        }
        else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' =>Hash::Make($req->password)
            ];
            
            $newUser = User::create($data);

            // đăng ký xong tk sẽ chạy sang trang đăng nhập chứ không vào luôn
            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập lại'
            ]);


            // đăng ký xong tài khoản sẽ tự động đăng nhập luôn 
            //Auth::login($newUser); // tự động đăng nhập cho user vừa đăng ký này
            // tiếp theo cần return sang trang chủ của user nhưng đây là file học nên không hoàn thiện chỉ có của admin chứu không có trang chủ user nên chỉ đến đây thôi
        }
    }
}
