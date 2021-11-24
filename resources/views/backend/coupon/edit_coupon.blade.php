@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--  -----Add Brand Page -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Add Brand  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('coupon.update', $coupon->id)}}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Coupon Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="coupon_name"
                                                   value="{{$coupon->coupon_name}}"
                                                   class="form-control"> </div>
                                        @error('coupon_name')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   name="coupon_discount"
                                                   value="{{$coupon->coupon_discount}}"
                                                   class="form-control"> </div>
                                        @error('coupon_discount')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Coupon Validity<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date"
                                                   name="coupon_validity"
                                                   value="{{$coupon->coupon_validity}}"
                                                   min="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                                                   class="form-control"> </div>
                                        @error('coupon_validity')
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
