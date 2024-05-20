import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 35.681236, lng: 139.767125 },
    zoom: 15,
  });
  infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "現在地に移動する";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap;
/*
var map; //infoWindow;
var marker;

    // Google Maps API を使用して地図を初期化する関数
    async function initMap() {
        // 地図を表示する要素を取得
        var mapElement = document.getElementById('map');
        // 東京駅の位置情報
        var tokyoStation = { lat: 35.681236, lng: 139.767125 };
        var defaultZoom = 15; // デフォルトのズームレベル

        // 地図を作成
        map = new google.maps.Map(mapElement, {
            center: tokyoStation, // 東京駅を中心に表示
            zoom: defaultZoom
        });
//        infoWindow = new google.maps.InfoWindow();
        
    // マップ上でクリックされたときのイベントハンドラを追加
        map.addListener('click', function(event) {
            // クリックされた位置の緯度経度を取得
            var clickedLocation = event.latLng;
            // ピンが既に存在する場合は削除する
            if (typeof marker !== 'undefined') {
                marker.setMap(null);
            }
            // ピンを設定
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map
            });
            // 住所を表示する関数を呼び出し
            displayAddress(clickedLocation);
        });
}
        // 住所を表示する関数
    function displayAddress(latlng) {
        // Geocoderオブジェクトを作成
        var geocoder = new google.maps.Geocoder();
        // 住所を取得するリクエストを作成
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    // 取得した住所を表示
                    document.getElementById('address').value = results[0].formatted_address;
                } else {
                    console.log('No results found');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });
        
            
        }
    // 「位置情報を取得する」ボタンがクリックされたときの処理
    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
            var currentLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            // ピンが既に存在する場合は削除する
            if (typeof marker !== 'undefined') {
                marker.setMap(null);
            }
            // ピンを設定
            marker = new google.maps.Marker({
                position: currentLocation,
                map: map
            });
            // 地図の中心を現在地に設定
            map.setCenter(currentLocation);
            // 住所を取得
            displayAddress(currentLocation);
        }, function() {
            handleLocationError(true);
        });
    } else {
        // ブラウザがGeolocationをサポートしていない場合の処理
        handleLocationError(false);
    }
    }
  
  // 位置情報取得時のエラーハンドリング
    function handleLocationError(browserHasGeolocation) {
        var error_message = browserHasGeolocation ?
            '位置情報の取得に失敗しました' :
            'お使いのブラウザはGeolocationをサポートしていません';
        alert(error_message);
    }
    
/*    // 近辺検索を行う関数
    
    async function searchNearby() {
        const {PlacesService} = await google.maps.importLibrary("places");
        var keyword = document.getElementById('keyword').value;
        var radius = 10000; // 半径10000m
        var request = {
            location: marker.getPosition(), // ピンの位置を中心に検索
            radius: radius,
            keyword: keyword
        };
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, function(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                // 検索結果を地図上に表示
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        });
    }

    // マーカーを作成する関数
    function createMarker(place) {
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
        });
        // マーカーをクリックしたときの動作を定義（ここでは情報ウィンドウを表示）
        google.maps.event.addListener(marker, 'click', function() {
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>' + place.name + '</strong><br>' + place.vicinity
            });
            infowindow.open(map, this);
        });


initMap();
/*let map;
// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
      // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
      map = new Map(document.getElementById("map"), {
          zoom: 13, //地図の縮尺を指定
          center: {lat: 35.6585769, lng: 139.7454506}, //センターを東京タワーに指定
      });
}

initMap();
*/