<x-app-layout>
    <x-slot name="title">{{ $trip->title }}</x-slot>
    <div>
        <div>
            {{ $trip->title }}
        </div>
        <div>
            {{ $trip->title }}
        </div>
        <div>
            {{ $trip->trip_date }}
        </div>
        @foreach($spotTrips as $spotTrip)
            <div id="spotTrip-{{ $spotTrip->id }}">{{ $spotTrip->spot->name }}</div>
        @endforeach
        
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>
    <script>
        const redPin = "https://maps.google.com/mapfiles/ms/micons/red-pushpin.png";    // ダーツが当たったところ
        const orangePin = "http://maps.google.com/mapfiles/ms/icons/orange-dot.png";   // 行ったところ
        const bluePin = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";       // 行ってないところ
        const dartLocation = { lat: {{ $trip->parameter->dart_latitude }}, lng: {{ $trip->parameter->dart_longitude }} };
        let infoWindow;
        let marker;
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: dartLocation,
                zoom: 13
            });
            
            infoWindow = new google.maps.InfoWindow();
            // dartsLocationにピン
            placeMarker(dartLocation, redPin);
            
            // 行った行ってないのピン刺し
            @foreach($spotTrips as $spotTrip)
                @if($spotTrip->status == 0)
                    placeMarkerWithInfo({{ $spotTrip->spot->latitude }}, {{ $spotTrip->spot->longitude }}, bluePin, '{{$spotTrip->spot->name}}');
                @elseif($spotTrip->status == 1)
                    placeMarkerWithInfo({{ $spotTrip->spot->latitude }}, {{ $spotTrip->spot->longitude }}, orangePin, '{{$spotTrip->spot->name}}');
                @endif
            @endforeach
            
        };
        
        // ピンを刺す関数
        function placeMarker(location, iconUrl) {
            if (marker) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: iconUrl
                });
            }
        }
            
        function placeMarkerWithInfo(lat, lng, iconUrl, spotName) {
            const marker = placeMarker({ lat: lat, lng: lng }, iconUrl);

            google.maps.event.addListener(marker, 'click', function() {
                const content = `
                    <div>
                        <strong><a href="https://www.google.com/search?q=${encodeURIComponent(spotName)}" target="_blank">${spotName}</a></strong>
                    </div>`;
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap&libraries=places"></script>
</x-app-layout>
