// JavaScript Document

////////////// Google News API stuff - basic
// key = ?ABQIAAAAlalWmE8tziOD0tYvwVyUahSL0pgMWyNjaMZHiE0aMEKpnaeNSRSHLYLnuTXV1cRn9epzMRJx7axUng

	var searchfirstname = 'us';
	var searchlastname = 'congress';
	var newsSearch;
	var searchControl;
//	var options;
	
    google.load('search', '1');
	
	function searchComplete() {
	//	alert('hello from searchComplete'+ newsSearch.results[0].title);
		
		var headline = newsSearch.results[0].title;
		var headlineurl = newsSearch.results[0].unescapedUrl;
		var headline2 = newsSearch.results[1].title;
		var headlineurl2 = newsSearch.results[1].unescapedUrl;
		
		
 		$('#headline').html('Latest News: <a href=' + headlineurl + ' target = "_blank"`12345678->' + headline + '</a></br></br><a href=' + headlineurl2 + ' target = "_blank"`12345678->' + headline2 + '</a>');
	
      };
	
    function OnLoad() {
 
      searchControl = new google.search.SearchControl();
    
      newsSearch = new google.search.NewsSearch();
	  
	  newsSearch.setSearchCompleteCallback(this, searchComplete, null);
	  
	  newsSearch.execute(searchfirstname + ' ' + searchlastname);
	  	  
//	  options = new google.search.SearcherOptions();
 
 //	  options.setExpandMode(google.search.SearchControl.EXPAND_MODE_OPEN);
    
//      searchControl.addSearcher(newsSearch, options);
  
   //   searchControl.draw(document.getElementById("newswrapper"));

 //     searchControl.execute(searchfirstname + ' ' + searchlastname);
	  
	//  google.search.Search.getBranding('header');
	  
    };
    
    google.setOnLoadCallback(OnLoad);