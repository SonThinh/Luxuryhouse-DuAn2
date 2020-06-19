<h2 class="title">Căn hộ khác của {{isset($host->user->name) ? $host->user->name : $host->user->email}} </h2>
<div class="row ml-1">
    @foreach($houses_same as $house)
        @if($house->host_id === $host->id)
            @php
                $images = json_decode($house->image);
            @endphp
            <div class="col-sm-12 col-md-3">
                <div class="home-content">
                    <a href="{{route('places.HouseDetail',[$house->id])}}">
                        <div class="image">
                            <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100">
                        </div>

                        <p class="home-type">
                            @foreach($types as $type)
                                @if($type->key == $house->types)
                                    {{$type->name}}
                                @endif
                            @endforeach
                        </p>
                        <p class="home-name">{{$house->name}}</p>
                        <div class="home">
                            <div class="home-detail d-flex">
                                <p>{{$house->max_guest}} khách - {{$house->n_room}} phòng ngủ
                                    - {{$house->n_bath}} phòng tắm</p>
                            </div>
                            <p class="home-address">
                                {{$house->address}},
                                @foreach($districts as $district)
                                    @if($district->id == $house->district_id)
                                        {{$district->name}}
                                    @endif
                                @endforeach
                                ,{{$house->city->name}}
                            </p>
                            <div class="home-price">
                                <p>
                                    @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Sunday' ||
                                        \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Saturday' ||
                                        \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Friday')
                                        <span>{{$house->price_f_to_s}}</span> đ/đêm
                                    @else
                                        <span>{{$house->price_m_to_t}}</span> đ/đêm
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
        @endif
    @endforeach
</div>
