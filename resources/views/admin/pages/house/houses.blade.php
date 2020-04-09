@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý nhà</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách nhà</h3>
                <table id="table">
                    <thead>
                    <tr>
                        <th>Tên tỉnh, thành phố</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Các khu vực</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($housesList as $house)
{{--                        @php--}}
{{--                            $image = json_decode($house->image);--}}
{{--                        @endphp--}}
{{--                        <tr {{$house->id}}>--}}
{{--                            <td>{{$house->name}}</td>--}}
{{--                            <td><img src="{{asset($image->image_path)}}" alt="" style="width: 50%"></td>--}}
{{--                            <td>{{$city->description}}</td>--}}
{{--                            <td>--}}
{{--                                @foreach($areas as $area)--}}
{{--                                    {{$area}},--}}
{{--                                @endforeach--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="{{route('admin.city.editCities',[$city->id])}}">--}}
{{--                                    <button class="btn btn-block btn-primary" name="btn-edit"><i--}}
{{--                                            class="far fa-edit"></i></button>--}}
{{--                                </a>--}}
{{--                                <a href="{{route('admin.city.deleteCity',[$city->id])}}" style="margin-top: 5px"--}}
{{--                                   onclick="return confirm('Bạn có muốn xóa không?')">--}}
{{--                                    <button class="btn btn-block btn-danger" name="btn-delete"><i--}}
{{--                                            class="far fa-trash-alt"></i></button>--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$housesList->render()}}
        </div>
@endsection
