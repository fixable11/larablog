@extends('layout')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0">
                    <!--leave comment-->

                    <h3 class="text-uppercase">Register</h3>
                    @include('admin.errors')
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="/register">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Name</div>
                                <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Email</div>
                                <input value="{{old('email')}}" type="text" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Password</div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Repeat Password</div>
                                <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="password">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Register</button>

                    </form>
                </div>
                <!--end leave comment-->
            </div>
            @include('pages._sidebar')
        </div>
    </div>
</div>
@endsection