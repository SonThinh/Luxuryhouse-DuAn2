@extends('index')
@section('title','host')
@section('main')
    @if(auth()->user()->id === $host->m_id)
        <div class="main p-3">
            <div class="container">
                <div class="m-4">
                    @include('cms.nav.menu')
                    @php
                        $image = json_decode(auth()->user()->avatar);
                    @endphp
                    <div class="content-user-profile">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-box">
                                    @include('cms.host.nav.menu_nav_left_host',['user'=>auth()->user(),'host'=>$host])
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="content-user-middle">
                                    @yield('main-host')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
