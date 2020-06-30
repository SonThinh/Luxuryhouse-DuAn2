<h2 class="title">Căn hộ khác của {{isset($host->user->name) ? $host->user->name : $host->user->email}} </h2>
<div class="row ml-1">
    @foreach($houses_same as $house)
        @php
            $images = json_decode($house->image);
        @endphp
        <div class="col-sm-12 col-md-3">
            <div class="home-content">
                <a href="{{route('places.HouseDetail',[$house->id])}}">
                    <div class="image">
                        <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100" style="height: 159px;">
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
                            {{$house->district->name}}
                            ,{{$house->city->name}}
                        </p>
                        <div class="home-price">
                            <p>
                                <span>{{$house->price}}</span> đ/đêm
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
                                <span>{{isset($comments_list) ? count($comments_list->where('h_id',$house->id)) : '0'}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
