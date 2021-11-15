@extends('frontend.main_master')
@section('content')
{{--    @php--}}
{{--    $user = DB::table('users')->whereId(Auth::user()->id)->first();--}}
{{--    @endphp--}}

    <div class="body-content">
        <div class="container">
            {{-- Start Row--}}
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top"
                         style="border-radius: 50%"
                         src="{{ (!empty($user->profile_photo_path)) ?
                       url('upload/user_images/'.$user->profile_photo_path):
                        url('upload/no_image.jpg')}}" height="100%" width="100%">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block"> Home </a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block"> Profile Update </a>
                        <a href="" class="btn btn-primary btn-sm btn-block"> Change Password </a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block"> Logout  </a>
                    </ul>
                </div>
                {{-- end Col-md-2--}}
                <div class="col-md-2">

                </div>
                {{-- end Col-md-2--}}
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger"> Hi ...</span>
                            <strong> {{Auth::user()->name}}</strong>
                            Change use Password
                        </h3>

                        <div class="card-body">
                            <form method="post" action="{{route('user.password.update')}}">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="current_pass"> Current Password   <span>*</span></label>
                                    <input type="password"
                                           class="form-control unicase-form-control text-input"
                                           id="current_password"
                                           name="oldpassword">
                                    @error('oldpassword')
                                    <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="NEw_pass">New Password  <span>*</span></label>
                                    <input type="password"
                                           class="form-control unicase-form-control text-input"
                                           id="new_password"
                                           name="password">
                                    @error('password')
                                    <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="phone">Password Confirmation  <span>*</span></label>
                                    <input type="password"
                                           class="form-control unicase-form-control text-input"
                                           id="password_confirmation"
                                           name="password_confirmation" >
                                    @error('password_confirmation')
                                    <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">
                                        Update
                                    </button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
                {{-- end Col-md-6--}}
            </div>
            {{-- Start Row--}}
        </div>
    </div>

@endsection
