<!DOCTYPE html>
<html>
<head>
<meta name="viewport"/>
<title>bangkalan_teregistrasi - Google Fusion Tables</title>
<style type="text/css">
html, body, #googft-mapCanvas {
  height: 300px;
  margin: 0;
  padding: 0;
  width: 500px;
}
#googft-legend{background-color:#fff;border:1px solid #000;font-family:Arial,sans-serif;font-size:12px;margin:5px;padding:10px 10px 8px}#googft-legend p{font-weight:bold;margin-top:0}#googft-legend div{margin-bottom:5px}.googft-legend-swatch{border:1px solid;float:left;height:12px;margin-right:8px;width:20px}.googft-legend-range{margin-left:0}.googft-dot-icon{margin-right:8px}.googft-paddle-icon{height:24px;left:-8px;margin-right:-8px;position:relative;vertical-align:middle;width:24px}.googft-legend-source{margin-bottom:0;margin-top:8px}.googft-legend-source a{color:#666;font-size:11px}
</style>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3"></script>

<script type="text/javascript">
  function initialize() {
    var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
      (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
    if (isMobile) {
      var viewport = document.querySelector("meta[name=viewport]");
      viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
    }
    var mapDiv = document.getElementById('googft-mapCanvas');
    mapDiv.style.width = isMobile ? '100%' : '1349px';
    mapDiv.style.height = isMobile ? '100%' : '540px';
    var map = new google.maps.Map(mapDiv, {
      center: new google.maps.LatLng(-7.043712555824363, 112.91682527968747),
      zoom: 11,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(document.getElementById('googft-legend-open'));
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(document.getElementById('googft-legend'));

    layer = new google.maps.FusionTablesLayer({
      map: map,
      heatmap: { enabled: false },
      query: {
        select: "col4",
        from: "1SQFWkxf1bT3vFqRt-nDNusM31Oq2QceXsX2AQDE2",
        where: ""
      },
      options: {
        styleId: 2,
        templateId: 2
      }
    });

    if (isMobile) {
      var legend = document.getElementById('googft-legend');
      var legendOpenButton = document.getElementById('googft-legend-open');
      var legendCloseButton = document.getElementById('googft-legend-close');
      legend.style.display = 'none';
      legendOpenButton.style.display = 'block';
      legendCloseButton.style.display = 'block';
      legendOpenButton.onclick = function() {
        legend.style.display = 'block';
        legendOpenButton.style.display = 'none';
      }
      legendCloseButton.onclick = function() {
        legend.style.display = 'none';
        legendOpenButton.style.display = 'block';
      }
    }
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
  <div id="googft-mapCanvas"style="margin-top: 50px;"></div>
  <input id="googft-legend-open" style="display:none" type="button" value="Legend">
  <div id="googft-legend">
    <p id="googft-legend-title">Sapi</p>
    <div>
      <span class="googft-legend-swatch" style="background-color: #d5a6bd"></span>
      <span class="googft-legend-range">1,768</span>
    </div>
    <div>
      <span class="googft-legend-swatch" style="background-color: #a64d79"></span>
      <br/>
    </div>
    <div>
      <span class="googft-legend-swatch" style="background-color: #741b47"></span>
      <br/>
    </div>
    <div>
      <span class="googft-legend-swatch" style="background-color: #4c1130"></span>
      <span class="googft-legend-range">22,739</span>
    </div>
    <div class="googft-legend-source">
      <a href="data?docid=1SQFWkxf1bT3vFqRt-nDNusM31Oq2QceXsX2AQDE2" target="_blank">Source</a>
    </div>
    <input id="googft-legend-close" style="display:none" type="button" value="Hide">
  </div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkfYrfi1cEovgKeacKQoL_VuuEZVAPXPM&callback=initMap">
</script>
</body>
</html>