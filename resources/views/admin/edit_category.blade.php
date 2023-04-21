@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <?php
                   $message = Session::get('message');
                   if($message){
                       echo '<span class="text-alert">'.$message.'</span>';
                       Session::put('message',null);
                   }
                   ?>
                <div class="panel-body">

                        <div class="position-center">
                            <form role="form" action="{{url('/update-category/'.$category->id_category)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$category->name_category}}" name="name_category" class="form-control" id="exampleInputEmail1" >
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Slug</label>--}}
{{--                                    <input type="text" value="" name="slug_category_product" class="form-control" id="exampleInputEmail1" >--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc_category" id="exampleInputPassword1" >{{$category->desc_category}}</textarea>
                                </div>

                                <button type="submit" name="update_category" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                        </div>

                </div>
            </section>

        </div>
@endsection
