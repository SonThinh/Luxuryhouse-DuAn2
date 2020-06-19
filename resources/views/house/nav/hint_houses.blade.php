<h2 class="title">Căn hộ tương tự</h2>
<div class="row ml-1">
    @foreach($houses_hint as $house_hint)
        @php
            $images = json_decode($house_hint->image);
        @endphp
        <div class="col-sm-12 col-md-3">
            <div class="home-content">
                <a href="{{route('places.HouseDetail',[$house_hint->id])}}">
                    <div class="image">
                        <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100">
                    </div>

                    <p class="home-type">
                        @foreach($types as $type)
                            @if($type->key == $house_hint->types)
                                {{$type->name}}
                            @endif
                        @endforeach
                    </p>
                    <p class="home-name">{{$house_hint->name}}</p>
                    <div class="home">
                        <div class="home-detail d-flex">
                            <p>{{$house_hint->max_guest}} khách - {{$house_hint->n_room}} phòng ngủ
                                - {{$house_hint->n_bath}} phòng tắm</p>
                        </div>
                        <p class="home-address">
                            {{$house_hint->address}},
                            @foreach($districts as $district)
                                @if($district->id == $house_hint->district_id)
                                    {{$district->name}}
                                @endif
                            @endforeach
                            ,{{$house_hint->city->name}}
                        </p>
                        <div class="home-price">
                            <p>
                                @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Sunday' ||
                                    \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Saturday' ||
                                    \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Friday')
                                    <span>{{$house_hint->price_f_to_s}}</span> đ/đêm
                                @else
                                    <span>{{$house_hint->price_m_to_t}}</span> đ/đêm
                                @endif
                            </p>
                        </div>
                        <div class="bottom-field row">
                            <div class="home-star col-6 text-left">
                                <i class="fas fa-star" style="color: yellow"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                            </div>
                            <div class="comment col-6 text-right">
                                <i class="far fa-comment-alt-lines"></i>
                                <span>1</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
