@extends('layout_admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        @if($errors->any())
                            <div class="alter alert-danger" > du lieu khong hop le</div>
                        @endif
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="category">Tên danh mục</label>
                                    <input type="text" name="name_category" class="form-control"  placeholder="Tên danh mục" value="{{old('name_category')}}">
                                    @error('name_category')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc_category"  >{{old('desc_category')}}</textarea>
                                    @error('desc_category')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng Thái</label>
                                      <select name="status_category" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>

                                    </select>
                                </div>

                                <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
