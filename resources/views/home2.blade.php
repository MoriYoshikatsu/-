
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script type="module" src="{{ asset('/js/map1.js') }}"></script>
  </head>
  <body>
    {{--<button onclick="getCurrentLocation()">位置情報を取得する</button>
    
    <!-- 「近辺検索」ボックスとボタン -->
    <input type="text" id="keyword" placeholder="キーワードを入力">
    <button onclick="searchNearby()">近辺検索</button>--}}
 <h1>出発地を決めよう</h1>
    <div id="map"></div>
    <a onclick="getCurrentLocation()" class="btn btn--orange btn--cubic btn--shadow">位置情報を取得！</a>
    <h2>住所</h2>
                <input id="address" type="text" name="post[address]" placeholder="タイトル" value=""/>

                <p class="title__error" style="color:red">{{ $errors->first('address') }}</p>
            </div>
    
            </div>
            <input type="submit" value="保存" class="btn btn--orange btn--cubic btn--shadow" />
        </form>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.map_api') }}&callback=initMap"></script>
  </body>
</html>
