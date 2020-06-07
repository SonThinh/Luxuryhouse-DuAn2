@extends('admin.index')
@section('title','event')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý sự kiện</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách sự kiện</h3>
                <a href="{{route('admin.event.AddEvent')}}" class="btn btn-primary btn-top">
                    <i class="far fa-plus-square"></i>
                </a>
                <table id="table">
                    <thead>
                    <tr>
                        <th>Loại sự kiện</th>
                        <th>Hình ảnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        @php
                            $image = json_decode($event->image);

                        @endphp
                        <tr {{$event->id}}>
                            <td style="width: 15%">{{$event->types}}</td>
                            <td style="width: 15%"><img src="{{asset($image->image_path)}}" alt="" style="width: 100%">
                            </td>
                            {{--                            <td style="width: 15%">--}}
                            {{--                                <a href="{{route('admin.city.editCities',[$city->id])}}">--}}
                            {{--                                    <button class="btn btn-primary" name="btn-edit"><i--}}
                            {{--                                            class="far fa-edit"></i></button>--}}
                            {{--                                </a>--}}
                            {{--                                <a href="{{route('admin.city.deleteCity',[$city->id])}}" style="margin-top: 5px"--}}
                            {{--                                   onclick="return confirm('Bạn có muốn xóa không?')">--}}
                            {{--                                    <button class="btn btn-danger" name="btn-delete"><i--}}
                            {{--                                            class="far fa-trash-alt"></i></button>--}}
                            {{--                                </a>--}}
                            {{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$events->render()}}
        </div>
@endsection
