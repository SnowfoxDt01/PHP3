<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // public function showProduct(){
    //     // $products = [
    //     //     [
    //     //         'id' => '1',
    //     //         'name' => 'iphone14'
    //     //     ],
    //     //     [
    //     //         'id' => '2',
    //     //         'name' => 'iphone16'
    //     //     ]
    //     // ];
    //     // return view('list-product')->with([
    //     //     'products' => $products
    //     // ]);
    // // 1. Lấy danh sách toàn bộ user (select * form user)
    // // $result = DB::table('users')->get();
    //     // dd($result);

    // // 2. Lấy thông tin user có id = 4 (select * form user where id=4)
    // // cách 1
    // // $result = DB::table('users')->where('id', '=', '4')->first();
    // // // cách 2
    // // $result = DB::table('users')->find('4'); // chỉ dùng với id
    // // dd($result);

    // // 3. Lấy thuộc tính 'name' của user có id = 16 (select name * form user where id=16)
    // // $result = DB::table('users')->where('id', '=', '16')->value('name');
    // // dd($result);

    // // 4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
    // // $idPhongBan =  DB::table('phongban')
    // // ->where('ten_donvi', 'like', 'Ban giám hiệu')
    // // ->value('id');
    // // $result = DB::table('users')
    // // ->where('phongban_id', '=', $idPhongBan)
    // // ->pluck('id');
    // // dd($result);
    

    // // 5. Tìm user có độ tuổi lớn nhất trong công ty 
    // // $result = DB::table('users')
    // // ->where('tuoi', DB::table('users')->max('tuoi'))
    // // ->get();
    // // dd($result);


    // // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
    // // $result = DB::table('users')
    // // ->where('tuoi', DB::table('users')->min('tuoi'))
    // // ->get();
    // // dd($result);


    // // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
    // // $idPhongBan =  DB::table('phongban')
    // // ->where('ten_donvi', 'like', 'Ban giám hiệu')
    // // ->value('id');
    // // $result = DB::table('users')
    // // ->where('phongban_id', '=', $idPhongBan)
    // // ->count();
    // // dd($result);

    // // 8. Lấy danh sách tuổi các user 
    // // $result = DB::table('users')
    // // ->distinct()
    // // ->pluck('tuoi');
    // // dd($result);

    // // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
    // // $result = DB::table('users')
    // // ->where('name', 'like', '%Khải')
    // // ->orWhere('name', 'like', '%Thanh')
    // // ->get();
    // // dd($result);

    // // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
    // // $idPhongBan =  DB::table('phongban')
    // // ->where('ten_donvi', 'like', 'Ban đào tạo')
    // // ->value('id');
    // // $result = DB::table('users')
    // // ->where('phongban_id', '=', $idPhongBan)
    // // ->select('id', 'name', 'email') // muốn lấy trường dữ liệu nào thì select trg đấy còn muốn lấy hết thì không cần select
    // // ->get();
    // // dd($result);

    // // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
    // // $result = DB::table('users')
    // // ->where('tuoi', '>=', '30')
    // // ->orderBy('tuoi','asc') //asc là tăng dần\desc là giảm dần
    // // ->get();
    // // dd($result);

    // // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
    // // $result = DB::table('users')
    // // ->orderBy('tuoi','desc')
    // // ->offset(5) // offset để bỏ qua số lượng phần tử trong ngoặc
    // // ->limit(10)
    // // ->get();
    // // dd($result);

    // // 13. Thêm một user mới vào công ty
    // // $data = [
    // //     'name' => "Nguyễn Văn A",
    // //     'email' => "abc@gmail.com",
    // //     'phongban_id' => "1",
    // //     'songaynghi' => '0',
    // //     'tuoi' => '20',
    // //     'created_at' => Carbon::now(),
    // //     'updated_at' =>  Carbon::now(),
    // // ];
    // // // DB::table('users')->insert($data);
    // // $userID = DB::table('users')->insertGetId($data); // cái này là insert rồi trả lại cho cái id của cái vừa insert

    // // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
    // // $idPhongBan =  DB::table('phongban')
    // // ->where('ten_donvi', 'like', 'Ban đào tạo')
    // // ->value('id');
    // // $listUser = DB::table('users')
    // // ->where('phongban_id', '=', $idPhongBan)
    // // ->get();
    // // foreach($listUser as $value){
    // //     DB::table('users')->where('id', '=', $value->id)
    // //     ->update([
    // //         'name' => $value->name . ' PĐT'
    // //     ]);
    // // }

    // // 15. Xóa user nghỉ quá 15 ngày
    // // DB::table('users')->where('songaynghi', '>', '15') -> delete();

    // }
    


    // // gọi kiểu slug
    // public function getProduct($id){
    //     echo $id;
    // }
    // // hết gọi kiểu slug
    // // gọi kiểu params
    // public function updateProduct(Request $request){
    //     echo $request->id;
    //     echo $request->name;
    // }
    // // hết gọi kiểu params

    public function listProduct(){
        $listProduct = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name', 'category.name_ct as name_ct', 'products.price', 'products.view')
            ->OrderBy('view', 'desc')
            ->get();
        
        return view('products/listProduct')->with([
            'listProduct' => $listProduct
        ]);
    }
    public function addProduct(){
        $category = DB::table('category')
        ->select('id', 'name_ct')
        ->get();
        return view('products/addProduct')->with([
            'category' => $category
        ]);
    }
    public function addPostProduct(Request $request){
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'create_at' => Carbon::now(), // Carbon::now() lấy time hiện tại
            'update_at' => Carbon::now()
        ];
        DB::table('products')->insert($data);
        return redirect()->route('products.listProduct');
    }
    public function deleteProduct($productID){
        DB::table('products')->where('id', $productID)->delete();
        return redirect()->route('products.listProduct');
    }
    public function updateProduct($productID){
        $category = DB::table('category')
        ->select('id', 'name_ct')
        ->get();
        $product = DB::table('products')->where('id', $productID)->first();
        
        return view('products/updateProduct')->with([
            'category' => $category,
            'product' => $product
        ]);
    }
    public function updatePostProduct(Request $request){
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            // 'create_at' => Carbon::now(), // Carbon::now() lấy time hiện tại
            'update_at' => Carbon::now()
        ];
        DB::table('products')->where('id', $request->productID)->update($data);
        return redirect()->route('products.listProduct');
    }
}
