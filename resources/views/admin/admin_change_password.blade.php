@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    {{--Main Content  --}}
    <section class="content">
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post"
                                  action="{{route('update.change.password')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Current password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"
                                                               name="oldpassword"
                                                               id="currentpassword"
                                                               class="form-control"
                                                               required> </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Admin New password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"
                                                               name="password"
                                                               id="password"
                                                               class="form-control"
                                                               required> </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Admin password Confirmation<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"
                                                               name="password_confirmation"
                                                               id="password_confirmation"
                                                               class="form-control"
                                                               required> </div>
                                                </div>
                                            </div>



                                        </div>


                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-primary mb-5">Submit</button>
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
    </section>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>


@endsection

