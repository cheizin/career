// Vanilla version of FitVids
// Still licencened under WTFPL
(function (window, document, undefined) {
  "use strict";

  // List of Video Vendors embeds you want to support
  var players = ['iframe[src*="youtube.com"]', 'iframe[src*="vimeo.com"]'];

  // Select videos
  var fitVids = document.querySelectorAll(players.join(","));

  // If there are videos on the page...
  if (fitVids.length) {
    // Loop through videos
    for (var i = 0; i < fitVids.length; i++) {
      // Get Video Information
      var fitVid = fitVids[i];
      var parentDiv = fitVid.parentNode;

      // Wrap it in a DIV
      var div = document.createElement("div");
      div.className = "video-wrapper";
      parentDiv.insertBefore(div, fitVid);
      fitVid.remove();
      div.appendChild(fitVid);
    }
  }
})(window, document);
