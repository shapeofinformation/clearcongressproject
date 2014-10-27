	
	/// more filter variables	
	var rep_filter = false;
	var sen_filter = false;
	var men_filter = false;
	var women_filter = false;
	var state_filter = false;
	var name_filter = false;
	var democrats_filter = false;
	var republicans_filter = false;
	var independents_filter = false;
	// keeps track of who's been filtered
	var filter_array = new Array();
	var statevalue = "";
	
	function filterRep() {

		rep_filter = false;
		sen_filter = true;
		filterCheck();
		
	};
	
	function filterSen() {

		sen_filter = false;
		rep_filter = true;
		filterCheck();
		
	};
	
	function filterDemocrats() {

		if(!democrats_filter){
			democrats_filter = true;
		}
		else {
			democrats_filter = false;
		}
		filterCheck();
		
	};
	
	
	function filterRepublicans() {

		if(!republicans_filter){
			republicans_filter = true;
		}
		else {
			republicans_filter = false;
		}
		filterCheck();
		
	};
	
	function filterIndependents() {

		if(!independents_filter){
			independents_filter = true;
		}
		else {
			independents_filter = false;
		}
		filterCheck();
		
	};			
	
	function filterBoth() {
		
		sen_filter = false;
		rep_filter = false;
		filterCheck();

	};
	
	function filterMen() {
		
		if(!men_filter){
			men_filter = true;
		}
		else {
			men_filter = false;
		}
		filterCheck();
		
	};
	
	function filterWomen() {
		
		if(!women_filter){
			women_filter = true;
		}
		else {
			women_filter = false;
		}
		filterCheck();
		
	};
	
	function filterName() {

		if(!name_filter){
			name_filter = true;
		}
		else {
			name_filter = false;
		}
	//	alert(namesearch);
		filterCheck();
	};
	
	function filterState(state) {

		state_filter = true;

		if ( state == "Show All"){
			state_filter = false;
		}
		
		$('.span1').removeClass('active');
		
		if(!name_filter){
			name_filter = true;
		}
		else {
			name_filter = false;
		}		
		
		statevalue = state;
				
		filterCheck();
	};
	
	function filterCheck(){
	

		for (var i = 0; i < 535; i++){
			
			var not_filtered = true;
			
			if (rep_filter && titles[i] == "Rep"){
				not_filtered = false;
			}
			if (sen_filter && titles[i] == "Sen"){
				not_filtered = false;
			}
			if (men_filter && genders[i] == "M"){
				not_filtered = false;
			}
			if (women_filter && genders[i] == "F"){
				not_filtered = false;
			}
			if (democrats_filter && party[i] == "D"){
				not_filtered = false;
			}
			if (republicans_filter && party[i] == "R"){
				not_filtered = false;
			}
			if (independents_filter && party[i] == "I"){
				not_filtered = false;
			}									
			if (state_filter && statevalue != states[i]) {
				not_filtered = false;
			}
			if (not_filtered) {
				filter_array[i] = 0;
			}
			else{
				filter_array[i] = 1;
			}
		}
	};