<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    use HasFactory;

    protected $table='tbl_category';
    public function addCategory($data){
        DB::insert('INSERT INTO tbl_category(name_category,desc_category,status_category,created_at) values (?,?,?,?)',
        $data);

    }


    public function editCategory($idcategory){
        return DB::table('tbl_category')->where('id_category',$idcategory)->get();
    }

    public function updateCategory($data,$idcategory){
        $data[]=$idcategory;
        DB::update('update tbl_category set name_category = ? ,desc_category = ? ,updated_at=? where id_category = ?',$data);
    }






//    protected $fillable =[
//        'name_category',
//        'desc_category',
//        'status_category',
//    ];

}

