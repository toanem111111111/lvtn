<?php

namespace App\Http\CategoryServices;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class Category_services
{
     public function create($request){

             $data=array();
             $data['desc_category']=$request->desc_category;
             $data['name_category']=$request->name_category;
             $data['status_category']=$request->status_category;
             DB::table('tbl_category')->insert($data);
             Session::put('message','Thêm danh mục thành công');
         if($data){
             $data['desc_category']=$request->desc_category;
             $data['name_category']=$request->name_category;

             }

     }

}
