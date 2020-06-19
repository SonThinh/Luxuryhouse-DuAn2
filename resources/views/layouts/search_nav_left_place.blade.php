<form action="{{route('places.searchHousesWithCityID',[$city->id])}}" method="get">
    <div class="filter">
        <h2 class="title-filter">
            <span class="icon"><i class="fal fa-sliders-h"></i></span> Filter
        </h2>
        <div class="p-2">
            @isset($city)
                <div class="place">
                    <h3>Khu vực</h3>
                    <ul>
                        @foreach($districts as $district)
                            @if($district->city_id == $city->id)
                                <li>
                                    <input type="radio" name="district" value="{{$district->id}}"> {{$district->name}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endisset
            <div class="price">
                <h3>Giá</h3>
                <div class="price-slider-wrap">
                    <div class="price-slider"></div>
                    <div class="price-box">
                        <div class="mr-1">
                            <span class="left-currency">đ</span>
                            <input type="text" name="price_min" id="price-min" class="form-control">
                        </div>
                        <div class="ml-1">
                            <span class="right-currency">đ</span>
                            <input type="text" name="price_max" id="price-max" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="hidden" disabled name="max" value="{{$max_price}}">
            </div>
            <div class="home-type">
                <h3>Loại chỗ ở</h3>
                <ul>
                    @foreach($types as $type)
                        <li>
                            <input type="radio" name="house_type" value="{{$type->key}}"> {{$type->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="trip-type">
                <h3>Loại chuyến đi</h3>
                <ul>
                    @foreach($trips as $trip)
                        <li>
                            <input type="radio" name="trip_type" value="{{$trip->key}}"> {{$trip->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-block btn-lux" value="Tìm kiếm">
</form>
