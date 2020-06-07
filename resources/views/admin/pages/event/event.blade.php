@extends('admin.index')
@section('title','admin-event')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Sự kiện</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý sự kiện</h6>
                <a href="{{route('admin.event.addEvent')}}" class="btn btn-primary ml-auto">
                    <i class="far fa-plus-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>Loại sự kiện</th>
                            <th>Hình ảnh</th>
                            <th>Link</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            @php
                                $image = json_decode($event->image);

                            @endphp
                            <tr {{$event->id}}>
                                <td>{{$event->types}}</td>
                                <td class="text-center"><img src="{{asset($image->image_path)}}" alt="" style="width: 50%">
                                <td>{{$event->link}}</td>
                                <td>
                                    <a href="{{route('admin.event.editEvent',[$event->id])}}">
                                        <button class="btn btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('admin.event.deleteEvent',[$event->id])}}" style="margin-top: 5px"
                                       onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button class="btn btn-danger" name="btn-delete"><i
                                                class="far fa-trash-alt"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
