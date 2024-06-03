<x-app-layout>
	<x-slot name="title">投稿一覧</x-slot>
	<div>
		@foreach($trips as $trip)
			@if($trip->status == 1)
				<a href="/show/trip/{{ $trip->id }}">{{ $trip->title }}</a>
				<br>
				<div class="description">{{ $trip->description }}</div>
				<br>
				<div class="trip_date">{{ $trip->trip_date }}</div>
				<div id="map-{{ $trip->id }}" class="map" style="height: 500px; width: 100%;"></div>
			@endif
		@endforeach
	</div>
	<script>
		const greenPin = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
		const redPin = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
		function initMap() {
			@foreach($trips as $trip)
				@if($trip->status == 1)
					var map_{{ $trip->id }} = new google.maps.Map(document.getElementById('map-{{ $trip->id }}'), {
						center: { lat: {{ $trip->parameter->dart_latitude }}, lng: {{ $trip->parameter->dart_longitude }} },
						zoom: 13
					});
					new google.maps.Marker({
						position: { lat: {{ $trip->parameter->dart_latitude }}, lng: {{ $trip->parameter->dart_longitude }} },
						map: map_{{ $trip->id }},
						icon: greenPin
					});
				@endif
			@endforeach
		};
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap&libraries=places"></script>
</x-app-layout>









