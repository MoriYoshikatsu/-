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
          <div class="transportation">
              <h2>使う交通手段は？</h2>
              <select name="transportation">
                <option>徒歩</option>
                <option>自転車</option>
                <option>バイク・車</option>
              </select>
          </div>
          
          <div class="transportation">
              <h2></h2>
              <select name="transportation">
                <option>5分</option>
                <option>10分</option>
                <option>15分</option>
                <option>30分</option>
                <option>45分</option>
                <option>60分</option>
                <option>90分</option>
                <option>120分</option>
                <option>150分</option>
                <option>180分</option>
              </select>
          </div>
          
          <div class="spotcategory">
              <h2>行きたい場所のカテゴリは？</h2>
              <select name="spot_categories[spotcategory_id]">
                  @foreach($spot_categories as $spot_category)
                      <option value="{{ $spot_category->id }}">{{ $spot_category->jtrans }}</option>
                  @endforeach
              </select>
          </div>    
            
            <h1>出発地を決めよう</h1>
            <div id="map" style="height:500px"></div>
            <script src="{{ asset('/js/map1.js') }}"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap"></script>
            
            
            <button onclick="getCurrentLocation()">位置情報を取得する</button>
            <!-- 「近辺検索」ボックスとボタン -->
            <input type="text" id="keyword" placeholder="キーワードを入力">
            <button onclick="searchNearby()">近辺検索</button>
      
          <div class="address">
              <h2>どこから出発する？</h2>
              <input id="address" type="text" name="post[address]" placeholder="タイトル" value=""/>
              <p class="title__error" style="color:red">{{ $errors->first('address') }}</p>
              <input type="submit" value="ここから出発する！"/>
          </div>
      </form>
  
 
{{--}<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key:"{{ config('services.map_api') }}", v: "weekly"});</script>--}}
  </body>
</html>
</x-app-layout>