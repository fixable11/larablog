@extends('layout')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="leave-comment mr0">
                    <!--leave comment-->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <h3 class="text-uppercase">My profile</h3>
                    @include('admin.errors')
                    <br>
                    <img src="{{$user->getImage()}}" alt="" class="profile-image">
                    <form enctype="multipart/form-data" class="form-horizontal contact-form" role="form" method="post" action="/profile">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Name</div>
                            <input value="{{$user->name}}" type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input_name">Email</div>
                                <input value="{{$user->email}}" type="text" class="form-control" id="email" name="email" placeholder="Email">
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
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Update</button>

                    </form>
                </div>
                <!--end leave comment-->
            </div>
            @include('pages._sidebar')
        </div>
    </div>
</div>
@endsection