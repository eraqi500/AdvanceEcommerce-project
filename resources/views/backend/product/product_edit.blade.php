@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product Page</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('product-update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden"  name="id" value="{{$product -> id}}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row"><!-- start 1st row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Category Select </h5>
                                                    <select name="category_id" class="form-control" aria-invalid="false">
                                                        <option value="" selected  disabled>Select Your Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"
                                                            {{($category->id == $product->category_id) ? 'selected':''}}>
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
                                                            <option value="{{$brand->id}}"
                                                                {{($brand->id == $product->brand_id) ? 'selected':''}}>>
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
                                                        @foreach($subcategory as $sub)
                                                            <option value="{{$sub->id}}"
                                                                {{($sub->id == $product->subcategory_id) ? 'selected':''}}>
                                                                {{$sub->subcategory_name_en}}
                                                            </option>
                                                        @endforeach
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
                                                        @foreach($subsubcategory as $subsub)
                                                            <option value="{{$subsub->id}}"
                                                                {{($subsub->id == $product->subsubcategory_id) ? 'selected':''}}>
                                                                {{$subsub->subsubcategory_name_en}}
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
                                                    <div class="form-group">
                                                        <h5>Product Name English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   name="product_name_en"
                                                                   value="{{$product->product_name_en}}"
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
                                                                   value="{{$product->product_name_ar}}"
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
                                                                   value="{{$product->product_code}}"
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
                                                                   value="{{$product->product_qty}}"
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
                                                                   value="{{$product->product_tags_en}}"
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
                                                                   value="{{$product->product_tags_ar}}"
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
                                                                   value="{{$product->product_size_ar}}"
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
                                                                   value="{{$product->product_size_en}}"
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
                                                               value="{{$product->product_color_ar}}"
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
                                                                   value="{{$product->product_color_en}}"
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
                                                               value="{{$product->selling_price}}"
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
                                                               value="{{$product->discount_price}}"
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
                                                    <h5>Product Short_description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_en"
                                                                  id="short_desc"
                                                                  class="form-control"
                                                                  placeholder=" enter the Short description">
                                                            {!! $product->short_desc_en !!}
                                                        </textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Short_description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_ar"  id="long_desc_ar" class="form-control"  placeholder="ادخل تعليق قصير ">
                                                            {!! $product->short_desc_ar !!}
                                                        </textarea>
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
                                                               {!! $product->long_desc_en !!}
												             </textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Long_description AR <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <textarea id="editor2"  name="long_desc_ar" rows="10" cols="80">
                                                              {!! $product->long_desc_ar !!}
                                                            </textarea>
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
                                                    <input type="checkbox" name="hot_deals" id="checkbox_2"  value="1"
                                                        {{($product->hot_deals == 1) ? 'checked': ''}}>
                                                    <label for="checkbox_2"> Hot Deals </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="featured" id="checkbox_3" value="1"
                                                        {{($product->featured == 1) ? 'checked': ''}}>
                                                    <label for="checkbox_3"> Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="special_offer" id="checkbox_4"  value="1"
                                                    {{($product->hotdeals == 1) ? 'checked': ''}}>
                                                    <label for="checkbox_4"> Special Offer </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="special_deals" id="checkbox_5" value="1"
                                                        {{($product->special_deals == 1) ? 'checked': ''}}>
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

{{--        // Multiple Image Updated Area--}}

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>


                        <form method="post"
                              action="{{route('update-product-image')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{route('product.multiimg.delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[ {{$img->id}} ]">
                                                </div>
                                                </p>

                                            </div>
                                        </div>

                                    </div><!--  end col md 3		 -->
                                @endforeach

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>


        {{--        // Multiple Image Updated Area--}}


{{--        Start Thumbnail --}}
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                        </div>


                        <form method="post"
                              action="{{route('update-product-thambnail')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="hidden"  name="id"  value="{{$product->id}}">
                            <input type="hidden"  name="old_img" value="{{$product->product_thambnail}}">

                            <div class="row row-sm">

                                    <div class="col-md-3">

                                        <div class="card">
                                            <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                            <div class="card-body">

                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
                                                    <img src="" id="mainThmb">
                                                </div>
                                                </p>


                                            </div>
                                        </div>

                                    </div><!--  end col md 3		 -->

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>

















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
        // [mainThamUrl , mainThmb ]
        function mainThamUrl(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src' , e.target.result).width(80).height(80);
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
