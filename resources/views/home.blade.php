<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script type="module" src="{{ asset('/js/map.js') }}"></script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map">
      
    </div>
    
    <script>
        function deletePost(id) {
            'use strict'
            
            if(confirm('削除すると復元できません．\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
                    // googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
        function initMap() {
            // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
            map = document.getElementById("map");
            // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
            let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
            // オプションを設定
            opt = {
                zoom: 13, //地図の縮尺を指定
                center: tokyoTower, //センターを東京タワーに指定
            };
            // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
            mapObj = new google.maps.Map(map, opt);
        }        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key= AIzaSyD3ex8MNn0jJkRnidYQHBxXhU0kSuSeHCg &callback=initMap" async defer></script>
  </body>
</html>