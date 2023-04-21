<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryCreateFormRequest;
use Illuminate\Http\Request;
use App\Http\CategoryServices\Category_services;
use Illuminate\Auth;
use App\Http\Middleware\Authenticate;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    private $category;
    public function __construct()
    {
        $this->category=new Category();
    }

    public function add_category()
    {
        return view('admin.add_category');
    }

    public function  all_category(){
        $all_category = DB::table('tbl_category')->paginate(5);
//        dd($all_category);
        $manager_category  = view('admin.all_category')->with('all_category',$all_category);
        return view('layout_admin')->with('admin.all_category', $manager_category);
//        return view('admin.all_category');
    }




    public function save_category(Request $request)
    {

        $request->validate([
           'name_category'=>'required|unique:tbl_category',
            'desc_category' => 'required'


        ], [
            'name_category.required' =>'Vui long nhap ten',
            'desc_category.required' =>'vui long nhap mo ta',
            'name_category' =>'Vui long nhap ten',
            'name_category.unique'=>'Ten bi trung'

        ]);
        $datainsert=[
          $request->name_category,
          $request->desc_category,
            $request->status_category,
            $request->created_at=Carbon::now('Asia/Ho_Chi_Minh')

        ];
        $this->category->addCategory($datainsert);
        Session::put('message','Thêm danh mục thành công');
        return redirect()->back();
    }

    public function unactive_category($idcategory){

        DB::table('tbl_category')->where('id_category',$idcategory)->update(['status_category'=>1]);
        Session::put('message','Danh mục được kích hoạt');
        return redirect()->back();

    }
    public function active_category($idcategory){

        DB::table('tbl_category')->where('id_category',$idcategory)->update(['status_category'=>0]);
        Session::put('message','Tắt Kích hoạt');
        return redirect()->back();
    }

    public function edit_category($idcategory)
    {
        $title = 'Cap nhap thong tin';
        if(!empty($idcategory)){
            $category=$this->category->editCategory($idcategory);
           if(!empty($category[0])){
               $category=$category[0];
           }else{
               Session::put('message','nguoi dung khong ton tai');
               return redirect()->back();
           }
        }else {
            return redirect()->back();
        }
        return view('admin.edit_category', compact('title', 'category'));
    }

    public function update_category(Request $request, $idcategory ){
        $request->validate([
//            'name_category'=>'exists:tbl_category,name_category',
//            'name_category'=>'unique:tbl_category,name_category,'.$idcategory,
            'name_category'=>['required', Rule::unique('tbl_category')->ignore($this->category,'id_category')],
            'desc_category' => 'required'

        ], [
            'name_category.required' =>'Vui long nhap ten',
            'desc_category.required' =>'vui long nhap mo ta',
            'name_category' =>'Vui long nhap ten',
            'name_category.unique'=>'Ten bi trung',
//            'name_category.exists'=>'tnajshfbvsdfv'
        ]);
        $dataupdate=[
            $request->name_category,
            $request->desc_category,
//            $request->updated_at=Carbon::now('Asia/Ho_Chi_Minh')
        ];
//        dd($dataupdate);
        dd($this->category->update($dataupdate));
        $this->category->update($dataupdate);
        Session::put('message','Update danh mục thành công');

        return back()->with('msg','Cap nhat danh muc');

//        return redirect()->back();

    }

    public function index(){
//        $category = DB::table('tbl_category')->paginate(5);
        dd(DB::table('tbl_category')->paginate(5));
////        $category=Category::paginate(5);
//        return view('admin.all_category', compact('category'));


//        $category = tbl_category::select('*')->paginate(10);
//        $category = $category->appends(['keyword'=>'value']);
//        return view('admin.all_category')->with(['category'=>$category]);


    }




}
