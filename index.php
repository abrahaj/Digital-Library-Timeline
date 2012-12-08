<html>
  <head>
    <title>Digital Library Timeline </title>
    <link rel='stylesheet' href='styles.css' type='text/css' />
    <script src="http://static.simile.mit.edu/timeline/api-2.2.0/timeline-api.js?bundle=true" type="text/javascript"></script>

  <script>
        var tl;
        function onLoad() {
            var eventSource = new Timeline.DefaultEventSource(0);
            
            var theme = Timeline.ClassicTheme.create();
            theme.event.bubble.width = 550;
            theme.event.bubble.height = 500;
            var d = Timeline.DateTime.parseGregorianDateTime("1990")
            var bandInfos = [
                
				Timeline.createBandInfo({
                    width:          "100%", 
                    intervalUnit:   Timeline.DateTime.DECADE, 
                    intervalPixels: 200,
                    eventSource:    eventSource,
                    date:           d,
                    theme:          theme,
                    layout:         'original'  // original, overview, detailed
                })
            ];
            
            tl = Timeline.create(document.getElementById("tl"), bandInfos, Timeline.HORIZONTAL);
            // stop browser caching of data during testing...
            tl.loadJSON("dl.js?"+ (new Date().getTime()), function(json, url) {
                eventSource.loadJSON(json, url);
            });
        }
        var resizeTimerID = null;
        function onResize() {
            if (resizeTimerID == null) {
                resizeTimerID = window.setTimeout(function() {
                    resizeTimerID = null;
                    tl.layout();
                }, 500);
            }
        }
    </script>
  </head>
  <body onload="onLoad();" onresize="onResize();">
    <ul id="path">
      <li><a href="/" title="Home">Norm.al Blog Page</a></li>
      <li><span>Digital Library Timeline </span></li>
    </ul>
  
    <div id="header">
      <h1>Digital Library Timeline</h1>
    </div>
  
    <div id="content">
      <p>Original content from <a class="profile-name-link" href="http://www.blogger.com/profile/10797656360572968065" rel="author" >Michael Seadle</a><br>
	  Sources:
          <ul>
              <li>Web Page: <a href="http://digitalplusresearch.blogspot.de/2012/10/information-technology-history.html">Digital+Research=Blog</a> / Article: <a href="http://digitalplusresearch.blogspot.de/2012/10/information-technology-history.html">Information Technology History</a></li>
              <li><a href="https://docs.google.com/document/d/1LSjV9LAM3L5Y2e69KOIJNgLNSx9lDADs3SrYi8TfwzM/edit#heading=h.nmivnl8ps78u">Digital Library Timeline</a></li>
          </ul>
      </p>
     
      <div id="tl" class="timeline-default" style="height: 400px;"></div>
	  <p><span style="font-size:xx-small">This is a a timeline that evolved over the years from conference and class lectures. It makes no pretense to being complete or accurate. Some entries have sources. Some come from my memory, which is far from perfect. Suggestions for additions or corrections would be most welcome. Send them to seadle (at) ibi.hu-berlin.de. </span>.</p>

    </div>
    
    <div id="footer">
      Copyright &copy; Not yet defined | Source Code: <a href="https://github.com/abrahaj/Digital-Library-Timeline">https://github.com/abrahaj/Digital-Library-Timeline</a> | Maintainer: A. Brahaj
    </div>
  </body>
</html>