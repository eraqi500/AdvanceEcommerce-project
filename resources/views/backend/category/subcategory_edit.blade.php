@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.col -->
                <!--  -----Add Brand Page -->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Add SubCategory  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('subcategory.update')}}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$subcategory->id}}">
                                    <div class="form-group">
                                        <h5> Category Select </h5>
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected  disabled>Select Your Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                  {{ ($category->id == $subcategory->category_id) ? 'selected':''}}>
                                                    {{$category->category_name_en}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub_Category Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="subcategory_name_en"
                                                   value="{{$subcategory->subcategory_name_en}}"
                                                   class="form-control"> </div>
                                        @error('subcategory_name_en')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub_Category Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="subcategory_name_ar"
                                                   value="{{$subcategory->subcategory_name_ar}}"
                                                   class="form-control"> </div>
                                        @error('subcategory_name_ar')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New"></input>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
