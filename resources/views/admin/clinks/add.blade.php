@extends('admin.layouts.app', ['page' => 'clink'])

@section('title', 'Add New Clink')

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
                <h3 class="box-title">Add New Clink</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.clinks.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text"
                            class="form-control"
                            name="phone_number"
                            required
                            placeholder="Phone Number"
                            value="{{ old('phone_number') }}"
                            id="phone_number"
                        >
                    </div>

                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number"
                            class="form-control"
                            name="latitude"
                            required
                            placeholder="Latitude"
                            value="{{ old('latitude') }}"
                            step="any"
                            id="latitude"
                        >
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number"
                            class="form-control"
                            name="longitude"
                            required
                            placeholder="Longitude"
                            value="{{ old('longitude') }}"
                            step="any"
                            id="longitude"
                        >
                    </div>

                </div>
<div id="latclicked"></div>
<div id="longclicked"></div>

<div hidden="true" id="latmoved"></div>
<div hidden="true" id="longmoved"></div>

<div style="padding:10px">
    <div id="map"></div>
</div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.clinks.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
            var map;
                    
                    
                    
                    function initMap() {                            
                        var latitude = 32.8872; // YOUR LATITUDE VALUE
                        var longitude = 13.1913; // YOUR LONGITUDE VALUE
                        
                        var myLatLng = {lat: latitude, lng: longitude};
                        
                        map = new google.maps.Map(document.getElementById('map'), {
                          center: myLatLng,
                          zoom: 14,
                          disableDoubleClickZoom: true, // disable the default map zoom on double click
                        });
                        
                        // Update lat/long value of div when anywhere in the map is clicked    
                        google.maps.event.addListener(map,'click',function(event) {                
                            document.getElementById('latitude').setAttribute('value',event.latLng.lat());
                            document.getElementById('longitude').setAttribute('value',event.latLng.lng());
                        });
                        
                        // Update lat/long value of div when you move the mouse over the map
                        google.maps.event.addListener(map,'mousemove',function(event) {
                            document.getElementById('latmoved').innerHTML = event.latLng.lat();
                            document.getElementById('longmoved').innerHTML = event.latLng.lng();
                        });
                                
                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          //title: 'Hello World'
                          
                          // setting latitude & longitude as title of the marker
                          // title is shown when you hover over the marker
                          title: latitude + ', ' + longitude 
                        });    
                        
                        // Update lat/long value of div when the marker is clicked
                        marker.addListener('click', function(event) {              
                          document.getElementById('latitude').setAttribute('value',event.latLng.lat());
                          document.getElementById('longitude').setAttribute('value',event.latLng.lng());
                        });
                        
                        // Create new marker on double click event on the map
                        google.maps.event.addListener(map,'dblclick',function(event) {
                            var marker = new google.maps.Marker({
                              position: event.latLng, 
                              map: map, 
                              title: event.latLng.lat()+', '+event.latLng.lng()
                            });
                            
                            // Update lat/long value of div when the marker is clicked
                            marker.addListener('click', function() {
                              document.getElementById('latitude').setAttribute('value',event.latLng.lat());
                              document.getElementById('longitude').setAttribute('value',event.latLng.lng());
                            });            
                        });
                        
                        // Create new marker on single click event on the map
                        /*google.maps.event.addListener(map,'click',function(event) {
                            var marker = new google.maps.Marker({
                              position: event.latLng, 
                              map: map, 
                              title: event.latLng.lat()+', '+event.latLng.lng()
                            });                
                        });*/
                    }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHsBQW1LVlFpybSaD-yYNSpbxcMKMAPI8&callback=initMap" async
            defer></script>
@endpush