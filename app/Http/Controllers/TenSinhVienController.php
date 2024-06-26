<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenSinhVienController extends Controller
{
    public function tensinhvien(){
        $tensv = [
            [
                'id' => 'PH36050',
                'name' => 'Nguyễn Tiến Đạt',
                'age' => '20',
                'nganh' => 'Lập trình web'
            ]
        ];
        return view('thong-tin-sinh-vien')->with([
            'tensv' => $tensv
        ]);
    }
}
