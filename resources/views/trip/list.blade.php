<x-app-layout>
	<x-slot name="title">トリップリスト作成</x-slot>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&libraries=streetView&callback=initMap&v=weekly"></script>
	<div id="map" style="height: 500px; width: 100%;"></div>
	<div>
		<form method="POST" action="/store/spot_trip/status" id="spotForm">
			@csrf
			@foreach ($spotTrips as $spotTrip)
				<div>
					<input type="checkbox" id="spot_{{ $spotTrip->id }}" name="spots[]" value="{{ $spotTrip->id }}" data-latitude="{{ $spotTrip->latitude }}" data-longitude="{{ $spotTrip->longitude }}" class="spot-checkbox">
					<label for="spot_{{ $spotTrip->id }}">{{ $spotTrip->name }}</label>
				</div>
			@endforeach
			<button type="submit">送信</button>
		</form>
	</div>
	<script>
		const dartLocation = { lat: {{ $trip->parameter->dart_latitude }}, lng: {{ $trip->parameter->dart_longitude }} };
		const redPin = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
		const bluePin = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
		const greenPin = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";

		document.addEventListener('DOMContentLoaded', function() {
			var map = new google.maps.Map(document.getElementById('map'), {
				center: dartLocation,
				zoom: 13
			});

			// dartsLocationにピン
			new google.maps.Marker({
				position: dartLocation,
				map: map,
				icon: greenPin
			});

			var spotCheckboxes = document.querySelectorAll('.spot-checkbox');

			spotCheckboxes.forEach(function(checkbox) {
				var lat = parseFloat(checkbox.getAttribute('data-latitude'));
				var lng = parseFloat(checkbox.getAttribute('data-longitude'));

				var marker = new google.maps.Marker({
					position: { lat: lat, lng: lng },
					map: map,
					icon: checkbox.checked ? redPin : bluePin
				});

				checkbox.addEventListener('change', function() {
					marker.setIcon(this.checked ? redPin : bluePin);
				});
			});
		});
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap&libraries=places"></script>
</x-app-layout>