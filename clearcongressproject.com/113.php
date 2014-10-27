<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Clear Congress Project</title>
<meta name="description" content="Clear Congress Project is a data visualization and mashup of US Congress utilizing a variety of data sources, including Sunlight Labs Real Time Congress API, GovTrack.us, Google News, and Twitter. Clear Congress Project demonstrates how data visualizations and open data can play an important role in facilitating governmental and institutional transparency while also creating a more informed and engaged civic society. Clear Congress Project was created by Thomas Gibes."/>
<!--<meta name="viewport" content="width=device-width">-->

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/detailsandload.css" />
<script src="js/vendor/modernizr-2.6.1.min.js"></script>
</head>
<body>
<!--[if lt IE 9]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]--> 

<!-- Add your site or application content here -->

<div class="page-header">
  <div class="container">

    <h2>Clear Congress Project <small>a data visualization / mashup of US Congress</small>

    <a chref="https://twitter.com/share" class="twitter-share-button pull-right" data-url="http://clearcongressproject.com/" data-text="Check out this data visualization and mash up of the United States Congress" data-via="tomgibes" data-hashtags="datavisualization">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</h2>
<small>currently desplaying data based on 113th session. <a href="http://clearcongressproject.com/112.php" title="Clear Congress Project 112th session">Click here for the completed 112th session.</a></small>
  </div>
</div>
<div class="container">
  <div class="row">
    <div data-toggle="buttons-radio">
      <button class="btn span4" onClick="filterRep()">HOUSE</button>
      <button class="btn span4" onClick="filterSen()">SENATE</button>
      <button class="btn active span4" onClick="filterBoth()">SHOW ALL</button>
    </div>
  </div>
  <div class="row" style="padding-top:10px">
    <ul class="nav nav-pills">
      <li class="span4 dropdown" style="text-align:center"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">FILTERS <b class="caret"></b></a>
        <ul class="dropdown-menu span4" style="text-align:left;padding-bottom:20px;" role="menu">
          <li>
            <div class="span3">
              <h6>Political Party</h6>
            </div>
            <div class="span3">
              <button class="btn active btn-block"  onClick="filterDemocrats()" data-toggle="button">DEMOCRATS</button>
              <button class="btn active btn-block"  onClick="filterRepublicans()" data-toggle="button">REPUBLICANS</button>
              <button class="btn active btn-block"  onClick="filterIndependents()" data-toggle="button">INDEPENDENTS</button>
            </div>
          </li>
          <li>
            <div class="span3">
              <h6>Gender</h6>
            </div>
            <div class="span3">
              <button class="btn btn-block active" onClick="filterWomen()" data-toggle="button">WOMEN</button>
              <button class="btn btn-block active" onClick="filterMen()" data-toggle="button">MEN</button>
            </div>
          </li>          
          <li>
            <div class="span3">
              <h6>States</h6>
            </div>
            <div class="span3" style="margin-bottom:5px;">
              <button class="btn btn-block" onClick="filterState(&quot;Show All&quot;)">Show All</button>
            </div>
            <div id="stateselect"> </div>
          </li>
        </ul>
      </li>
      <li class="span4 dropdown" style="text-align:center"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">CONTROLS <b class="caret"></b></a>
        <ul class="dropdown-menu span4" role="menu" style="text-align:left;padding-bottom:20px;">
          <li>
            <div class="span3">
              <h6>Positioning</h6>
            </div>
            <div class="span3 style="text->
              <button class="btn btn-block" onClick="resetAll()" >Reset Position</button>
              <button class="btn btn-block" onClick="jitter()" >Jitter</button>
              <button class="btn btn-block" onClick="toggleCollision()" data-toggle="button">Enable Collision</button>
            </div>
            <div class="span3">
              <h6>Data Display Poperties</h6>
            </div>
            <div class="span3">
              <button class="btn btn-block" onClick="toggleDrawLabels()" data-toggle="button">Labels</button>
              <button class="btn btn-block" onClick="toggleDotsMode()" data-toggle="button">Dots Mode</button>
              <button class="btn btn-block" onClick="toggleDrawFiltered()" data-toggle="button">Draw Filtered</button>
              <button class="btn btn-block active" onClick="toggleDrawNetwork()" data-toggle="button">Draw Network</button>
            </div>
          </li>
        </ul>
      </li>
      <li class="span4 dropdown" style="text-align:center"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">LEGEND & HELP <b class="caret"></b></a>
        <ul class="dropdown-menu span4" style="padding-bottom:20px;" role="menu">

          <li> <img src="img/ccp_legend.png" alt="Legend for graph of congress"/>
          <h6 style="text-align:justified;">click a data point to display details, real-time information and the cosponsor network of the associated legislator</h6>
           </li>
        </ul>
      </li>
    </ul>
  </div>
  
  <!-- the visualization -->
  <div class="row">
    <canvas id="canvas" class="noSelect" data-processing-sources="processing/ccp_sketch.pde"></canvas>
  </div>
  
  <!--- footer info and links --->
  <div class="footer">
    <p>&copy; 2012 <a href="http://flavors.me/tomgibes" target="_blank">Thomas Gibes</a></p>
    <p>check out <a target="_blank" href="http://clearcongressproject.wordpress.com">the blog</a> for more info & news</p>
    <p>powered by <a href="http://sunlightlabs.com/" target="_blank">Sunlight Labs</a>, <a href="http://google.com/" target="_blank">Google</a>, <a href="http://twitter.com/" target="_blank">Twitter</a>, and <a href="http://govtrack.us/" target="_blank">Govtrack.us</a></p>
    <p>developed using <a href="http://processingjs.org/" target="_blank">processingjs</a> and <a href="http://jquery.com/" target="_blank">jquery</a></p>
    <p><a href="http://clearcongressproject.wordpress.com/pages/methodology" target="_blank">methodology</a> &amp; <a href="http://clearcongressproject.wordpress.com/data-sources/" target="_blank">data sources</a></p>
  </div>
</div>

<!-- These are the divs that shows up when a legislator's circle is clicked -->

<div id="detailsWrapper">
  <div id="bioImage"></div>
  <div id="closeDetails">X</div>
  <div id="bioInfo" class="detailsBox"></div>
  <div id="tweet" class="detailsBox"></div>
  <div id="headline" class="detailsBox"></div>
  <div id="cosponsors" class="detailsBox"></div>
</div>

<!-- loading bar stuff -->
<div id="loading">
  <div class="container hero-unit" style="background-color:#DAF4FE;padding:20px;width:500px; " >
    <h1>Welcome!</h1>
    <div style="width:250px;margin:0px auto;padding:10px;text-align:justify">
      <h6>Clear Congress Project is a data visualization and mashup of the United States Congress utilizing a variety of data sources, including Sunlight Labs' Real Time Congress API, GovTrack.us, Google News, and Twitter. Clear Congress Project demonstrates how data visualizations and open data can play an important role in facilitating governmental and institutional transparency while also creating a more informed and engaged civic society.</h6>
    </div>
    <h3>Aquiring and Visualizing Data...</h3>
    <div style="margin:10px">
      <div class="progress progress-striped" >
        <div id="loading-bar" class="bar" style="width:0%"></div>
      </div>
    </div>
    <h6>incompatible with older browsers - best viewed with Chrome, Firefox, or Safari</h6>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script> 
<script src="js/plugins.js"></script> 
<script src="js/main.js"></script> 

<!-- Legacy files --> 

<script type="text/javascript" src="js/processing-1.3.0.min.js"></script> 
<script type="text/javascript" src="http://www.google.com/jsapi"></script> 
<script type="text/javascript" src="js/ccp_google.js"></script> 
<script type="text/javascript" src="js/cpp_filters.js"></script> 

<!-- bootstrap.js used for interface --> 

<script src="js/bootstrap.js"></script> 
<script type="application/javascript">

	//  processing binding
	var bound = false;
	
	function bindJavascript(){
		var pjs = Processing.getInstanceById('canvas');
		if(pjs!=null){
			pjs.bindJavascript(this);
			bound = true;
		}
		if(!bound) setTimeout(bindJavascript, 250);
	}
	
	bindJavascript();
	
	// filling up the state filter list
	function populateStateFilter(){
		
		var list = '';
		for (var i = 0; i < statelist.length; i++){
			list += '<button class="btn btn-mini span1" onClick="filterState(&quot;' + statelist[i] + '&quot;)" >' + statelist[i] + '</button>';
		}
		$('#stateselect').html(list);
	};

	// load up the state filter list
	var statelist = ['AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY'];
	

$(window).load(function(){  

	// on load, hide the loading window	
	$("#loading").hide();  

	/* Other possible way to normalize...
		normalizeLF();
		normalizeIdeology();
		normalizeBillCount();
	*/
	
});

$(document).ready(function() { 		   
						   
	populateStateFilter();
						   
	// hide the details container until will need it
	$('#detailsWrapper').hide();
	closeDetails();
	
	// setup a bunch of arrays for populatin'
	for (var i = 0; i < 535; i++){
		filter_array[i] = 0;
		lf_array[i] = 0;
		follower_array[i] = 0;
		ideology_array[i] = 0;
		bill_count[i] = 0;
		cosponsors_all[i] = new Array();	
		normalized_ideology_array[i] = 0;
		normalized_lf_array[i] = 0;
		normalized_bill_count[i] = 0;
	}

		
	//getBillCountPages(); // will need this to determine # of recursions... eventually
	
getBillCount(1);
getIdeology(1);
	
});

	
	
	/////////////////////////////
	//// Ideology (Partisanship) & Leadership
	
	var lf_array = new Array();
	var follower_array = new Array();
	var normalized_lf_array = new Array();
	var max_lf_sen = 0;
	var max_lf_rep = 0;
	var min_lf_sen = 0;
	var min_lf_rep = 0;
	var ideology_array = new Array();
	var normalized_ideology_array = new Array();
	var max_ideology_rep = 0;
	var max_ideology_sen = 0;
	var min_ideology_rep = 0;
	var min_ideology_sen = 0;
	var total_pages = 100; // currently this is manually updated - need to utilize count within the RTC API
	
	/* to determine partisanship, pull every bill, 
		determine ideology score for each bill based on consponsors 
		(more rep = higher score, more dem = lower score)
		then cycle through all the consponsors for each bill, 
		if the cosponsor = bioguide_id then add that bills score to their ideology score)
	*/
	function getIdeology(page){
		
		$.ajax({
		   	url: 'http://api.realtimecongress.org/api/v1/bills.json?apikey=f8351c77cf7c439d9873a2b979f291d7&session=113&per_page=50&page='+page+'&sections=sponsor_id,cosponsors.bioguide_id,cosponsors.party',
			dataType: 'jsonp',	
			success: function(data){		
				$.each(data.bills, function(i, bill){ // cylce through each bill
					var bill_ideology = 0;
					$.each(bill.cosponsors, function(j, cosponsor){ // then through each bills cosponsors
						
						// if Democrat move the bill's partisanship left, Republican, move it right.
						
						if(cosponsor.party == 'D'){
							bill_ideology--; 
						}
						if(cosponsor.party == 'R'){
							bill_ideology++;  
						}
					});
					
					$.each(bill.cosponsors, function (k, cosponsor){
						for (var m = 0; m < 535; m++){													 
							if(cosponsor.bioguide_id == bioguide_ids[m]){								
								ideology_array[m] += bill_ideology;
								lf_array[m]++; // MORE leadership the more someone cosponsors another's legislation.
								// lf_array[m]--; in old methodoloy cosponoring detracted from leadership score 
							}
						}
					 });
					
					for (var l = 0; l < 535; l++){					
						if (bill.sponsor_id == bioguide_ids[l]){	
						
							lf_array[l] += bill.cosponsors.length ;							

							$.each(bill.cosponsors, function(j, cosponsor){
																								  
								if(cosponsor.party == 'D'){
									ideology_array[l]--;
								}
								if(cosponsor.party == 'R'){
									ideology_array[l]++;
								}
								normalizeIdeology();
								normalizeLF();
							});
						}
					}
			
											
					/* this is how to do ideology by cosponsors to their bills
					
					for (var k = 0; k < 535; k++){					
						if (bill.sponsor_id == bioguide_ids[k]){						
							$.each(bill.cosponsors, function (j, cosponsor){																					  
								if(cosponsor.party == 'D'){
									ideology_array[k]--;
								}
								if(cosponsor.party == 'R'){
									ideology_array[k]++;
								}
							});
						}
					}
					*/
				});
				
				page++;		
				
				var pagepercent = Math.round((page / total_pages) * 100);
				// loading bar attempt
				
				$("#loading-bar").css("width",pagepercent + "%");
					
				if (page < total_pages){
					getIdeology(page);
				}			
			}
		});
	};
	
	 function normalizeLF(){
		for (var j = 0; j < 535; j++){
			if(titles[j] == "Rep"){
				if (lf_array[j] > max_lf_rep){
					max_lf_rep = lf_array[j];
				}
				if (lf_array[j] < min_lf_rep){
					min_lf_rep = lf_array[j];
				}
			}
			if(titles[j] == "Sen"){
				if (lf_array[j] > max_lf_sen){
					max_lf_sen = lf_array[j];
				}
				if (lf_array[j] < min_lf_sen){
					min_lf_sen = lf_array[j];
				}
			}
		//	alert(lf_array[j]);
			if(titles[j] == "Rep"){
				normalized_lf_array[j] = (lf_array[j] - min_lf_rep)/(max_lf_rep - min_lf_rep);
			}
			if(titles[j] == "Sen"){
				normalized_lf_array[j] = (lf_array[j] - min_lf_sen)/(max_lf_sen - min_lf_sen);
			}
		}	
		
	};
	
	function normalizeIdeology(){
	
		for (var j = 0; j < 535; j++){
			if(titles[j] == "Rep"){
				if (ideology_array[j] > max_ideology_rep){
					max_ideology_rep = ideology_array[j];
				}
				if (ideology_array[j] < min_ideology_rep){
					min_ideology_rep = ideology_array[j];
				}
			}
			if(titles[j] == "Sen"){
				if (ideology_array[j] > max_ideology_sen){
					max_ideology_sen = ideology_array[j];
				}
				if (ideology_array[j] < min_ideology_sen){
					min_ideology_sen = ideology_array[j];
				}
			}
			if(titles[j] == "Rep"){
				normalized_ideology_array[j] = (ideology_array[j] - min_ideology_rep)/(max_ideology_rep - min_ideology_rep);
			}
			if(titles[j] == "Sen"){
				normalized_ideology_array[j] = (ideology_array[j] - min_ideology_sen)/(max_ideology_sen - min_ideology_sen);
			}
		}
		
	};
	
	// bill count and normalizing

	var bill_count = new Array();
	var normalized_bill_count = new Array();
	var max_bills_rep = 0;
	var max_bills_sen = 0;
	var bill_count_pages = 0;
	
	function getBillCountPages() {
		
		$.ajax({
			   
 			 url: 'http://api.realtimecongress.org/api/v1/bills.json?apikey=f8351c77cf7c439d9873a2b979f291d7&session=113&per_page=50',
 			 dataType: 'jsonp',
			 cache: true,
			 success: function(data) {
				bill_count_pages =  parseInt((data.count)/500)+1;
												
			 }
	   	});	 
	};

	function getBillCount(page) {
		
		$.ajax({
 			 url: 'http://api.realtimecongress.org/api/v1/bills.json?apikey=f8351c77cf7c439d9873a2b979f291d7&session=113&per_page=50&page='+page+'&sections=sponsor_id',
 			 dataType: 'jsonp',
			 cache: true,
			 success: function(data) {	
			 
				$.each(data.bills, function(i, bill){				
					for (var k = 0; k < 535; k++){					
						if (bill.sponsor_id == bioguide_ids[k]){						
							bill_count[k]++;							
						}
					}	
					 normalizeBillCount();
				});
				
				page++;			
				if (page < total_pages){
					getBillCount(page);
					
				}
			
//						
				
			 }
			
		});
	};
	
	// normalize the bill count
	
	function normalizeBillCount(){	
		for (var j = 0; j < 535; j++){
			if(titles[j] == "Rep"){
				if (bill_count[j] > max_bills_rep){
					max_bills_rep = bill_count[j];
				}
			}
			if(titles[j] == "Sen"){
				if (bill_count[j] > max_bills_sen){
					max_bills_sen = bill_count[j];
				}
			}
			if(titles[j] == "Rep"){
				normalized_bill_count[j] = (bill_count[j] - 0)/(max_bills_rep - 0);
			}
			if(titles[j] == "Sen"){
				normalized_bill_count[j] = (bill_count[j] - 0)/(max_bills_sen - 0);
			}	
		}
	};

	// rollover div creation and Twitter stuff

	var twitterID = "";
	var lastTweet = "";
	var bioguideID = "";
	var cosponsors_all = new Array();
	
	// get bioguide_ID

	function getCosponsors(legislatorKey) {
		
		$.ajax({
 			 url: 'http://api.realtimecongress.org/api/v1/bills.json?apikey=f8351c77cf7c439d9873a2b979f291d7&session=113&per_page=50&sponsor_id='+bioguide_ids[legislatorKey]+'&sections=cosponsor_ids',
 			 dataType: 'jsonp',
			 cache: true,
			 success: function(data) {		 
				cosponsors_all[legislatorKey]=[]; // empty the array before we fill it anew			
				$.each(data.bills, function(i, bill){									
					$.each(bill.cosponsor_ids, function(j, cosponsor){				
						cosponsors_all[legislatorKey].push(cosponsor);
						//alert(cosponsors_all[legislatorKey]);			
					 });
				});
				// this is used for debugging - displays the bioIDs of the clicked legislator and the co-sponsors
				/*
				$('#cosponsors').html(bioguide_ids[legislatorKey]+": ");
				for (var i = 0; i < cosponsors_all[legislatorKey].length; i++){
					 
					 var testArray = cosponsors_all[legislatorKey];
					 $('#cosponsors').append(testArray[i]+", ");
				}	
				*/
			 } 
		});
	};
	
	// Twitter gets
	
	function getLastTweet(legislatorKey){
		
		twitterID = twitter_ids[legislatorKey];
		
		if (twitterID == ""){
			twitterID = "No Twitter Account";
		}
		
		if (twitterID != "No Twitter Account"){
			$.getJSON("http://twitter.com/statuses/user_timeline/"+twitter_ids[legislatorKey]+".json?callback=?", function(data) {
		    	lastTweet = data[0].text;
				$('#tweet').html('Latest Tweet: '+lastTweet);
    		});	
		}
		
		else {
			lastTweet = "No Twitter Account Found";
			$('#tweet').html('Latest Tweet: '+lastTweet);
		}
		
	};
	
	// creates the details div for the selected legislator - called in processing
	
	function showDetails(legislatorKey) {
		
		$('#canvas').click(function (e){
											   
			var leftpos = e.pageX+20;
			var toppos = e.pageY;
			if (toppos > 500){
				toppos = 500;
			}
		
			$('#bioInfo').html(titles[legislatorKey]+" "+firstnames[legislatorKey]+" "+lastnames[legislatorKey]+"<br />("+party[legislatorKey]+" - "+states[legislatorKey]+")");
			$('#bioImage').html('<img src="http://www.govtrack.us/data/photos/'+govtrack_ids[legislatorKey]+'-50px.jpeg" />');
			$('#detailsWrapper').css({"left": leftpos + "px", "top": toppos + "px"});	
			$('#detailsWrapper').show();
			
		});
	};
	
	function hideDetails(){
		$('#canvas').click(function (){									
			$('#detailsWrapper').hide();
		});
	};
	
	function closeDetails(){
		$("#closeDetails").click(function (){
			$('#detailsWrapper').hide();
    	});
	};

	
$(function(){
    $.extend($.fn.disableTextSelect = function() {
        return this.each(function(){
            if($.browser.mozilla){//Firefox
                $(this).css('MozUserSelect','none');
            }else if($.browser.msie){//IE
                $(this).bind('selectstart',function(){return false;});
            }else{//Opera, etc.
                $(this).mousedown(function(){return false;});
            }
        });
    });
    $('.noSelect').disableTextSelect(); //No text selection on elements with a class of 'noSelect'
});
	
	
	// VIEWING OPTIONS
	
	// collision settings, control
	
	var collision_js = false;
	
	function toggleCollision(){
		if(!collision_js){
			collision_js = true;
			jittered = true;
		}
		else {
			collision_js = false;
		}
		
	};
	
	// draw filtered toggle
	
	var draw_filtered = false;
	
	function toggleDrawFiltered(){
		if(!draw_filtered){
			draw_filtered = true;
		}
		else {
			draw_filtered = false;
		}
	};
	
	// draw labesl or not
	
	var draw_labels = false;
	
	function toggleDrawLabels(){
		if(!draw_labels){
			draw_labels = true;
		}
		else {
			draw_labels = false;
		}
	};
	
	// draw network
	
	var draw_network = true;
	
	function toggleDrawNetwork(){
		if(!draw_network){
			draw_network = true;
		}
		else {
			draw_network = false;
		}
	};
	
	// dots mode
	
	var dots_mode = false;
	
	function toggleDotsMode(){
		if(!dots_mode){
			dots_mode = true;
		}
		else {
			dots_mode = false;
		}
	};
	
	function resetAll(){
		for(var i = 0; i < 535; i++){
			var collision_js = false;
			var draw_filtered = true;
			var draw_labels = false;
			var draw_network = true;
			jittered = false;
			//legislators[i].focus = false;
		}
	};
	
	var jitter_mode = false;
	var jittered = false;
	
	function jitter(){
		jitter_mode = true;
		jittered = true;
	};
	
	
</script> 

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. --> 
<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
</body>
</html><?php

	// db goodness

	$db_host = "mysql.clearcongressproject.com";
	$db_database = "legislators0511";
	$db_username = "tgibes";
	$db_password = "th1rst";
	
	$connection = mysql_connect(
		$db_host,
		$db_username,
		$db_password
		) or die ("connection failure");

	$db_select = mysql_select_db($db_database) or die ("Database not found.");

	$query = "SELECT * FROM legislatorsFinal";

	$govtrack_ids = array();
	$titles = array();
	$firstnames = array();
	$lastnames = array();
	$gender = array();
	$party = array();
	$spectrum = array();
	$lf = array();
	$states = array();
	$twitter_ids = array();
	$bioguide_ids = array();
		
	$result = mysql_query($query);	
	while ($thisrow=mysql_fetch_row($result)){
		
		$i=0;
		while ($i < mysql_num_fields($result))
		{
			if ($i == 18) {
				array_push($govtrack_ids, $thisrow[$i]);
			}
			
			if ($i == 3){
				array_push($lastnames, $thisrow[$i]);
			}
			
			if ($i == 1){
				array_push($firstnames, $thisrow[$i]);
			}
			
			if ($i == 9){
				array_push($gender, $thisrow[$i]);
			}
			
			if ($i == 0){
				array_push($titles, $thisrow[$i]);
			}
						
			if ($i == 6){
				array_push($party, $thisrow[$i]);
			}
			
			if ($i == 7){
				array_push($states, $thisrow[$i]);
			}
			if ($i == 15){
				array_push($bioguide_ids, $thisrow[$i]);
			}
			if ($i == 20){
				array_push($twitter_ids, $thisrow[$i]);
			}
			
			$i++;
		}

	}
	
	// this makes for a sloppy page when you view the source code.. working on making this external...
	
	echo '<script type = "text/javascript">';

	echo 'var govtrack_ids = new Array("', join($govtrack_ids,'","'),'");';
	echo 'var titles = new Array("', join($titles,'","'),'");';
	echo 'var firstnames = new Array("', join($firstnames,'","'),'");';
	echo 'var lastnames = new Array("',join($lastnames,'","'),'");';
	echo 'var genders = new Array("',join($gender,'","'),'");';
	echo 'var party = new Array("', join($party,'","'),'");';
	echo 'var states = new Array("', join($states,'","'),'");';
	echo 'var bioguide_ids = new Array("', join($bioguide_ids,'","'),'");';
	echo 'var twitter_ids = new Array("', join($twitter_ids,'","'),'");';
		
	echo '</script>';																

?>