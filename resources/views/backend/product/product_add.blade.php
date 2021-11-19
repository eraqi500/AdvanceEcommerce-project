@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="container-full">

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Product Validation</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{route('product-store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row"><!-- start 1st row -->
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <h5> Category Select </h5>
                                                      <select name="category_id" class="form-control" aria-invalid="false">
                                                          <option value="" selected  disabled>Select Your Category</option>
                                                          @foreach($categories as $category)
                                                              <option value="{{$category->id}}">
                                                                  {{$category->category_name_en}}
                                                              </option>
                                                          @endforeach
                                                      </select>
                                                      @error('category_id')
                                                      <span class="text-danger"> {{$message}} </span>
                                                      @enderror
                                                  </div>
                                              </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Brand Select </h5>
                                                        <select name="brand_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected  disabled>Select Your Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}">
                                                                    {{$brand->brand_name_en}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> SubCategory Select </h5>
                                                        <select name="subcategory_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected  disabled>Select Your SubCategory</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>  <!--end col md-4 -->
                                            </div>  <!--end 1st row -->


                                            <div class="row"><!-- start 2nd row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Sub_SubCategory Select </h5>
                                                        <select name="subsubcategory_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected  disabled>Select Your Sub_SubCategory</option>

                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Name English <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_name_en"
                                                                       class="form-control">
                                                                @error('product_name_en')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Name Arabic <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_name_ar"
                                                                       class="form-control">
                                                                @error('product_name_ar')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->
                                            </div>  <!--end 2nd row -->


                                            <div class="row"><!-- start 3nd row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Code  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_code"
                                                                       class="form-control">
                                                                @error('product_code')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Quantity  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_qty"
                                                                       class="form-control">
                                                                @error('product_qty')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Tags English  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_tags_en"
                                                                       class="form-control"
                                                                       data-role="tagsinput"
                                                                       placeholder="add tags">

                                                                @error('product_tags_en')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->
                                            </div>  <!--end 3rd row -->



                                            <div class="row"><!-- start 3nd row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Tags Arabic  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_tags_ar"
                                                                       class="form-control"
                                                                       data-role="tagsinput"
                                                                       placeholder="add tags">

                                                                @error('product_tags_ar')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Size Arabic  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_size_ar"
                                                                       class="form-control"
                                                                       value="قصير,طويل ,متوسط"
                                                                       data-role="tagsinput"
                                                                       placeholder="add tags">

                                                                @error('product_size_ar')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Size English  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_size_en"
                                                                       class="form-control"
                                                                       data-role="tagsinput"
                                                                       value="small,large,medium"
                                                                       placeholder="add tags">

                                                                @error('product_size_en')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>  <!--end 3rd row -->






                                            <div class="row"><!-- start 5th row -->
                                                <div class="col-md-4">

                                                        <div class="form-group">
                                                            <h5>Product Color Arabic  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_color_ar"
                                                                       class="form-control"
                                                                       value="الاحمر , الاخضر, الازرق"
                                                                       data-role="tagsinput"
                                                                       placeholder="add tags">

                                                                @error('product_color_ar')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <h5>Product Color English  <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                       name="product_color_en"
                                                                       class="form-control"
                                                                       value="Red,black,yellow"
                                                                       data-role="tagsinput"
                                                                       placeholder="add tags">

                                                                @error('product_color_en')
                                                                <span class="text-danger"> {{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Selling Price  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   name="selling_price"
                                                                   class="form-control"
                                                                   >
                                                            @error('selling_price')
                                                            <span class="text-danger"> {{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>  <!--end col md-4 -->
                                            </div>  <!--end 5th row -->



                                            <div class="row"><!-- start 6th row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Discount Price  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   name="discount_price"
                                                                   class="form-control"
                                                            >
                                                            @error('discount_price')
                                                            <span class="text-danger"> {{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product thambnail <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="product_thambnail" class="form-control"  onchange="mainThamUrl(this)">
                                                         <span class="text-danger">
                                                          @error('product_thambnail') {{$message}} @enderror
                                                         </span>
                                                            <img src="" id="mainTham">
                                                        </div>
                                                    </div>
                                                </div>  <!--end col md-4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Multiple  Images  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file"
                                                                   name="multi_img[]"
                                                                   class="form-control"
                                                                   multiple
                                                                   id="multiImg"
                                                            >
                                                            @error('multi_img')
                                                            <span class="text-danger"> {{$message}} </span>
                                                            @enderror
                                                            <div class="row" id="preview_img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  <!--end col md-4 -->
                                            </div>  <!--end 6th row -->


                                            <div class="row"><!-- start 7th row -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Short_description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_en" id="short_desc" class="form-control"  placeholder=" enter the Short description"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Short_description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_ar" id="long_desc_ar" class="form-control"  placeholder="ادخل تعليق قصير "></textarea>
                                                        </div>
                                                    </div>

                                                </div> <!--end col md-4 -->

                                            </div>  <!--end 7th row -->


                                            <div class="row"><!-- start 8th row -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Long_description En <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                           <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
												             </textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Long_description AR <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editor2" name="long_desc_ar" rows="10" cols="80">
												             CKEditor.</textarea>
                                                        </div>
                                                    </div>

                                                </div> <!--end col md-4 -->

                                            </div>  <!--end 8th row -->

                                            <hr>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="hot_deals" id="checkbox_2"  value="1">
                                                        <label for="checkbox_2"> Hot Deals </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" name="featured" id="checkbox_3" value="1">
                                                        <label for="checkbox_3"> Featured</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="special_offer" id="checkbox_4"  value="1">
                                                        <label for="checkbox_4"> Special Offer </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" name="special_deals" id="checkbox_5" value="1">
                                                        <label for="checkbox_5"> Special deals </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').empty().html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

    <script type="text/javascript">
        // [mainThamUrl , mainTham ]
        function mainThamUrl(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainTham').attr('src' , e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>

    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>


    @endsection
