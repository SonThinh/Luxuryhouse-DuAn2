@extends('index')
@section('title','member')
@section('main')
    <div class="main p-3">
        <div class="container">
            <div class="m-4">
                @include('cms.nav.menu')
                @php
                    $image = json_decode($user->avatar);
                @endphp
                <div class="content-user-profile">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-box">
                                @include('cms.member.nav.menu_nav_left',['user'=>$user])
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="content-user-middle">
                                @yield('main-user')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
