<x-app-layout>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
{{--    <link rel="stylesheet" type="text/css" href="app.css" />
    <script type="module" src="app.js"></script>
--}}
  </head>
  <body>
{{--      <form action="" method="POST">--}}
        @csrf
        <div id="map" style="height:1000px; width: 2000px"></div>
        <div id="pano" style="width: 45%; height: 100%"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap&v=weekly">
            console.log("aaa")
        </script>
        <button id="sample">近辺検索</button>
        
        <script>
          
            var centerLatLng = { lat: 35.6585769, lng: 139.7454506 }; // 例: サンフランシスコの座標
            function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: centerLatLng,
            });
                    
                    // 中心のマーカーを設置
            var centerMarker = new google.maps.Marker({
                position: centerLatLng,
                map: map,
                title: "Center Point", // マーカーのタイトル
            });
            
            const btnEl = document.getElementById("sample")
            // ランダムな点を円内に設置する関数
            btnEl.addEventListener('click', async function() {
                // 中心からの円の半径（メートル）を指定
                var outerRadius = 1000; // 外側の円の半径（メートル）
                var innerRadius = outerRadius - outerRadius / 10; // 内側の円の半径（メートル）
                // 中心からのランダムな方向と距離を計算
                var angle = Math.random() * Math.PI * 2;
                var distance = Math.sqrt(Math.random()) * (outerRadius - innerRadius) + innerRadius;
        
                // 新しい座標を計算
                var newLat = centerLatLng.lat + (distance / 111111) * Math.cos(angle); // 1度あたりの緯度の距離は約111,111メートル
                var newLng = centerLatLng.lng + (distance / (111111 * Math.cos(centerLatLng.lat * Math.PI / 180))) * Math.sin(angle); // 1度あたりの経度の距離は緯度によって異なる
        
                // 新しいマーカーを作成
                var marker = new google.maps.Marker({
                    position: { lat: newLat, lng: newLng },
                    map: map,
                    title: "Random Point", // マーカーのタイトル
                    icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png", // マーカーのアイコン
                });
                
                const cityCircle = new google.maps.Circle({
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
                map,
                center: centerLatLng,
                radius: outerRadius,
                });
            });
            }          
        </script>
           
 
{{--<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key:"{{ config('services.map_api') }}", v: "weekly"});</script>--}}
  </body>
</html>
</x-app-layout>