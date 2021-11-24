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
                            <h3 class="box-title"> Add Division  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('division.update', $division->id)}}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Division Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"
                                                   value="{{$division->division_name}}"
                                                   name="division_name"
                                                   class="form-control"> </div>
                                        @error('division_name')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>




                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update"></input>
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
