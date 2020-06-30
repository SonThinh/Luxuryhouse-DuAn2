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
                        <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100" style="height: 159px;">
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
                            {{$house_hint->district->name}}
                            ,{{$house_hint->city->name}}
                        </p>
                        <div class="home-price">
                            <p>
                                <span>{{$house_hint->price}}</span> đ/đêm
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
                                <span>{{isset($comments_list) ? count($comments_list->where('h_id',$house_hint->id)) : '0'}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
