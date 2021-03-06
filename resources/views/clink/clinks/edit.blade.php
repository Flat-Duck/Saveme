@extends('clink.layouts.app', ['page' => 'settings'])

@section('title', 'تعديل العيادة')

@push('styles')
<style>
    #map {
        height: 300px;
        width: 600px;
    }
</style>    
@endpush
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تعديل العيادة</h3>
                </div>

                <form role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('clink.clinks.update', ['clink' => $clink->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">الإسم</label>
                            <input type="text" class="form-control" name="name" required placeholder="الإسم"
                                value="{{ old('name', $clink->name) }}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone_number" required placeholder="رقم الهاتف"
                                value="{{ old('phone_number', $clink->phone_number) }}" id="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="latitude">إحداثيات الطول</label>
                            <input type="number" class="form-control" name="latitude" required placeholder="إحداثيات الطول"
                                value="{{ old('latitude', $clink->latitude) }}" step="any" id="latitude">
                        </div>

                        <div class="form-group">
                            <label for="longitude">إحداثيات العرض</label>
                            <input type="number" class="form-control" name="longitude" required placeholder="إحداثيات العرض"
                                value="{{ old('longitude', $clink->longitude) }}" step="any" id="longitude">
                        </div>
                        <div id="latclicked"></div>
                        <div id="longclicked"></div>

                        <div hidden="true" id="latmoved"></div>
                        <div hidden="true" id="longmoved"></div>

                        <div style="padding:10px">
                            <div id="map"></div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1"
                                    {{ old('status', $clink->status) == 1 ? 'checked' : '' }}>
                                مفعلة
                            </label>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="hidden" name="visible" value="0">
                                <input type="checkbox" name="visible" value="1"
                                    {{ old('visible', $clink->visible) == 1 ? 'checked' : '' }}>
                                Visible
                            </label>
                        </div> --}}

                        <img src="{{ $clink->getFirstMediaUrl('cover') }}" width="50" alt="الصورة">
                        <div class="form-group">
                            <label for="cover">الصورة</label>
                            <input type="file" class="form-control" name="cover" 
                                value="{{ old('cover', $clink->cover) }}" id="cover">
                        </div>

                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <textarea class="form-control" name="address" id="address" required
                                placeholder="Address">{{ old('address', $clink->address) }}</textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" required placeholder="Price"
                                value="{{ old('price', $clink->price) }}" step="any" id="price">
                        </div> --}}


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">تعديل</button>

                        <a href="{{ route('clink.clinks.index') }}" class="btn btn-default">
                            إلغاء
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script type="text/javascript">
      
        function initMap() {
            var latitude = 32.8872;
            var longitude = 13.1913; // YOUR LONGITUDE VALUE
            var myLatLng = {
                lat: latitude,
                lng: longitude
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: myLatLng
            });
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: myLatLng
            });
            google.maps.event.addListener(marker, 'dragend',
                function(marker) {
                    currentLatitude = this.getPosition().lat();
                    currentLongitude = this.getPosition().lng();
                    document.getElementById('latitude').setAttribute('value', currentLatitude);
                    document.getElementById('longitude').setAttribute('value', currentLongitude);

                }
            );
        }

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHsBQW1LVlFpybSaD-yYNSpbxcMKMAPI8&callback=initMap&libraries=&v=weekly"
        async defer></script>

@endpush
