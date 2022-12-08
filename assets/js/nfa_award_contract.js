var base_url = $('#base').val();


// get your select element and listen for a change event on it
$('#nfaType').change(function() {
  // set the window's location property to the value of the option the user has selected
  window.location = $(this).val();

});

//Calculate Sum for the first package
function checkL1_vendor(){
	basis_award_package1 = $("#basis_award_package1").val();
	if(basis_award_package1=="L1")
		l1_vendor1 = "Y";
	else
		l1_vendor1 = "N";
	if ( $( "#basis_award_package2" ).length ) {
		basis_award_package2 = $("#basis_award_package2").val(); 
		if(basis_award_package1=="L1" && basis_award_package2=="L1")
			l1_vendor1 = "Y";
		else
			l1_vendor1 = "N";
	}
	if ( $( "#basis_award_package3" ).length)  {
		basis_award_package3 = $("#basis_award_package3").val(); 
		if(basis_award_package1=="L1" && basis_award_package2=="L1" && basis_award_package2=="L1")
			l1_vendor1 = "Y";
		else
			l1_vendor1 = "N";
	}
	$('#l1_vendor').val(l1_vendor1);
	return l1_vendor1;
	
}
//get budeget esc total
function budgetEsc_total(){
	//alert("total");
	var sum_budget_esc=0;
	var package_count = $("#package_count").val();
			
	
		for(i=1;i<=package_count;i++)
		{
			
	
			sum_budget_esc+= parseFloat($("#package_budget_esc"+i).val()); 
	
		
		}
	
	$("#total_budget_esc").val(sum_budget_esc.toFixed(2)); 
	
}
//get finalized total
function finalized_total(){
	var sum_finalized=0;
	//var package_count = $("#package_count").val();
	//var total_finalized_award_value ;
	var package_count = $('#package_count').find(":selected").text();
	
	
		for(i=1;i<=package_count;i++)
		{
			
	
			sum_finalized+= parseFloat($("#finalized_award_value_package"+i).val()); 
	
		
		}
		
	if(!isNaN(sum_finalized)) {	
		$("#total_finalized_award_value").val(sum_finalized.toFixed(2)+" Cr"); 
	}
	
	 if (sum_finalized > 3) {
		
		document.getElementById("appointment-date").classList.remove("date-hide");
		document.getElementById("date1").classList.remove("date-hide");
		
	} else 
	{
		document.getElementById("appointment-date").classList.add("date-hide");
		document.getElementById("date1").classList.add("date-hide");
		
	}

	//calculateSum1();
	
}

//get fields value total
function packageSynopsis_total(inpField,outputField){
	
	var sum_fields=0;
	var radio_grp;
	
	var package_count = $('#package_count').find(":selected").text();
	
	
		for(i=1;i<=package_count;i++)
		{
			$("#"+outputField).val(''); 
			
			if(inpField=='anticipated_rate' || inpField=='basic_rate')
			{
				radio_grp='group_'+i;
				
				if($("input[name="+radio_grp+"]:checked").val()=="yes")
				{
					sum_fields+= parseFloat($("#"+inpField+i).val());
				}
				
			}
			else
				sum_fields+= parseFloat($("#"+inpField+i).val());
			
			if(!isNaN(sum_fields)) {
			
				if(outputField=="total_expected_savings")
					$("#"+outputField).val(sum_fields.toFixed(2)+" %"); 
				else if(outputField=="total_basic_rate")
				{
					
					$("#"+outputField).val(sum_fields.toFixed(3)+" Cr"); 
				}
				else
				$("#"+outputField).val(sum_fields.toFixed(2)+" Cr"); 
			}
		
		}
		
		if(!isNaN(sum_fields)) {
			if(outputField=="total_expected_savings")
				$("#"+outputField).val(sum_fields.toFixed(2)+" %"); 
			else if(outputField=="total_basic_rate")
			{
				
				$("#"+outputField).val(sum_fields.toFixed(3)+" Cr"); 
			}
			else	
				$("#"+outputField).val(sum_fields.toFixed(2)+" Cr");
		}		
	
	if(inpField=='anticipated_rate')
		calculateSum1();

}

//Calculate Sum for the  package

function calculateSum1(){
	console.log("testing calcu");
	var total_sum=0;
	var total_expected_savings=0;
	var sum=0;
	var sum_proposed=0;
	var condition_l1;
	var l1_vendor1;
	var package_value;
	var finalized_award_value_package;
	var anticipated_rate;
	var package_budget_esc
	
	var package_count = $('#package_count').find(":selected").text();
	var salient_id = $("#salient_id").val();
	
	for(i=1;i<=package_count;i++)
	{
		sum_proposed=0;
		finalized_award_value_package= $("#finalized_award_value_package"+i).val(); 
		radio_grp='group_'+i;
		
		if($("input[name="+radio_grp+"]:checked").val()=="yes")
		{
			anticipated_rate = $("#anticipated_rate"+i).val(); 
		}
		else
			anticipated_rate =0;
		 
		 
		package_budget_esc = $("#package_budget_esc"+i).val();  
		sum_proposed+= parseFloat(finalized_award_value_package)+parseFloat(anticipated_rate);
		
		if(!isNaN(sum_proposed)) {
			console.log("sum calculatetesting"+sum_proposed);
			$("#post_basic_rate_package"+i).val(sum_proposed.toFixed(2)+" Cr"); 
		}
		else
			$("#post_basic_rate_package"+i).val(0+" Cr");
		
		expected_savings_package = (parseFloat(sum_proposed)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
		if(!isNaN(expected_savings_package)) {
			$("#expected_savings_package"+i).val(expected_savings_package.toFixed(2)+" %"); 
		}
		else
			$("#expected_savings_package"+i).val('0%'); 	
		total_sum += sum_proposed; 
		total_expected_savings += expected_savings_package; 
		
	}
	//alert(total_expected_savings);
	if(!isNaN(total_sum)) {
		$("#total_post_basic_rate").val(total_sum.toFixed(2)+" Cr"); 
	}
	else
		$("#total_post_basic_rate").val(0); 
	if(!isNaN(total_expected_savings)) {	
		$("#total_expected_savings").val(total_expected_savings.toFixed(2)+"%"); 
	}
	else
		$("#total_expected_savings").val('0%'); 
	
	
	package_value= total_sum;
	l1_vendor1 = checkL1_vendor();			
	
	console.log("Livendor test"+l1_vendor1);
	// Get max level of Approvers
		
	var url = base_url+'nfa/Award_contract/getMaxLevelApprovers';
	
	$.post(url,
				{
					package_value: package_value, l1_vendor1: l1_vendor1,salient_id: salient_id
				},
				function (data, status) {
					
					$('#approvers_list_div').html(data);
										
				});
	
	//Expected Savings -Percentage
	getExpectedSavings();
	//showBidposition();
	finalized_total();
	

}

//Getting package rows in final bidders
function package_bidders(label_obj) {
	
	var label_id = label_obj.id;

	var package_name,finalized_award_value;


	var package_count = $('#package_count').find(":selected").text();
	var bidder_count = parseInt($("#bidder_count").val())+1;

	package_name = label_obj.value;
	

	if (label_id == "package_label1")
	{
		var url = base_url + 'nfa/Award_contract/show_package_bidders1';
		//finalized_award_value = $("#finalized_award_value_package1").val();
		
	}
	else if (label_id == "package_label2")
	{
		var url = base_url + 'nfa/Award_contract/show_package_bidders2';
		//finalized_award_value = $("#finalized_award_value_package2").val();
	}
	else if (label_id == "package_label3")
	{
		var url = base_url + 'nfa/Award_contract/show_package_bidders3';
		//finalized_award_value = $("#finalized_award_value_package3").val();
	}
	$.post(url, {
			bidder_count: bidder_count,
			//finalized_award_value: finalized_award_value,
			package_name: package_name
			//async: "false"
		},
		function(data, status) {
			
			if (label_id == "package_label1")
				$('#package_row1').html(data);
			else if (label_id == "package_label2")
				$('#package_row2').html(data);
			else if (label_id == "package_label3")
				$('#package_row3').html(data);

			setGpl_budget();
			showBidders_finalized();
			getBidders_total();
		});

			
		//showBidders_finalized();
}


//Function for setting recommended vendor
function  setRecommended_vendorName(){
	var package_count = $('#package_count').find(":selected").text();
	for(i=1;i<=package_count;i++)
	{
		recom_vendor= $("#recomm_vendor_package"+i).val(); 
		console.log("recom_vendor"+recom_vendor);
		$("#final_bidder_name"+i).val(recom_vendor); 
		$("#final_bidder_name"+i).attr('readonly', true);
	}
	showBidders_finalized();

}

//Function for setting recommended vendor
function  setGpl_budget(){
	
	var package_count = $('#package_count').find(":selected").text();
	for(i=1;i<=package_count;i++)
	{
		budget_esc= $("#package_budget_esc"+i).val(); 
		$("#package_gpl_budget"+i).val(budget_esc); 
		$("#package_gpl_budget"+i).attr('readonly', true);
	}
	getGplBudget_total();
}
	
//Function for Expected Savings -Percentage
function getExpectedSavings(){
	
	var i;
	var percentage=0;
	var post_basic_rate_package;
	var package_budget_esc;
	//var package_count = $("#package_count").val();
	var package_count = $('#package_count').find(":selected").text();
	for(i=1;i<=package_count;i++)
	{
		post_basic_rate_package= $("#post_basic_rate_package"+i).val(); 
		
		package_budget_esc = $("#package_budget_esc"+i).val(); 
		percentage= (parseFloat(post_basic_rate_package)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
		if(!isNaN(percentage)) {
			$("#expected_savings_package"+i).val(percentage.toFixed(2)+" %"); 
		}
	}

	
	
}

//get GPL Budget total
function getGplBudget_total(){
	var sum_gplBudget=0;
	//var package_count = $("#package_count").val();	
	var package_count = $('#package_count').find(":selected").text();		
	for(i=1;i<=package_count;i++)
	{
		sum_gplBudget+= parseFloat($("#package_gpl_budget"+i).val()); 
		
		
	}
	
	
	if(!isNaN(sum_gplBudget)) {
		$("#total_amt_gpl").val(sum_gplBudget.toFixed(2)+" Cr"); 
	}
}

//schange score color PQ/Feedback
function score_color(){
	
		
	var score_type,bid_index,bid_text;
	var bidder_count = parseInt($("#bidder_count").val())+1;	
	sum_gpl=0;
	for(bid_index=1;bid_index<=bidder_count;bid_index++)
	{
		score_type = $("#score_type"+bid_index).val();
		if(score_type=="PQ")
		{
			$("#score"+bid_index).removeClass('background-feedback');
			$("#score"+bid_index).addClass('background-pq');
		}
		else if(score_type=="FB")
		{
			$("#score"+bid_index).removeClass('background-pq');
			$("#score"+bid_index).addClass('background-feedback');
		}
		
	}
	
}
	//get Bidders package total
	function getBidders_total(){
		console.log("bidders_total");
		var sum_bidder,sum_gpl;
		var pck_index,bid_index,bid_text;
		var total_amt_gpl ; 
		var diff_budget_crs;
		var diff_budget_percentage;
		var package_count = parseInt($("#package_count").val())+1;	
		var bidder_count = parseInt($("#bidder_count").val())+1;	
		sum_gpl=0;
		for(bid_index=1;bid_index<=bidder_count;bid_index++)
		{
			
			
		
			sum_bidder = 0;
			
			for(pck_index=1;pck_index<=package_count;pck_index++)
			{
				
				
				
				
				
				bid_text = "#package_bidder_"+pck_index+"_"+bid_index;
				
				
				sum_bidder += parseFloat($(bid_text).val()); 
				if(bid_index==1)
					sum_gpl+=parseFloat($("#package_gpl_budget"+pck_index).val());
			
			}
			
			
			//console.log("bid_indexfff"+bid_index);
			if(!isNaN(sum_gpl)) {
				$("#total_amt_gpl").val(sum_gpl+" Cr"); 
			}
			if(!isNaN(sum_bidder)) {
				$("#total_amt_bidder"+bid_index).val(sum_bidder.toFixed(2)+" Cr");
			}				
			total_amt_gpl = $("#total_amt_gpl").val(); 
			diff_budget_crs = parseFloat(sum_bidder)-parseFloat(total_amt_gpl);
			
			diff_budget_percentage = (parseFloat(diff_budget_crs)/parseFloat(total_amt_gpl))*100;
			//diff_budget_percentage = (parseFloat(diff_budget_crs)*100/parseFloat(total_amt_gpl));
			if(!isNaN(diff_budget_crs)) {
				$("#diff_budget_crs"+bid_index).val(diff_budget_crs.toFixed(2)+" Cr"); 
			}
			if(!isNaN(diff_budget_percentage)) {
				$("#diff_budget_percentage"+bid_index).val(diff_budget_percentage.toFixed(2)+"%");
			}
			
			if(diff_budget_crs>0)
			{
				/* $("#diff_budget_crs"+bid_index).removeClass('background-red');
				$("#diff_budget_crs"+bid_index).addClass('background-green'); */
				$("#diff_budget_crs"+bid_index).removeClass('background-green');
				$("#diff_budget_crs"+bid_index).addClass('background-red'); 
			}
			else
			{
				/* $("#diff_budget_crs"+bid_index).removeClass('background-green');
				$("#diff_budget_crs"+bid_index).addClass('background-red'); */
				$("#diff_budget_crs"+bid_index).removeClass('background-red');
				$("#diff_budget_crs"+bid_index).addClass('background-green');
			}
			if(diff_budget_percentage>0)
			{
				/* $("#diff_budget_percentage"+bid_index).removeClass('background-red');
				$("#diff_budget_percentage"+bid_index).addClass('background-green'); */
				$("#diff_budget_percentage"+bid_index).removeClass('background-green');
				$("#diff_budget_percentage"+bid_index).addClass('background-red');
			}
			else
			{
				/* $("#diff_budget_percentage"+bid_index).removeClass('background-green');
				$("#diff_budget_percentage"+bid_index).addClass('background-red'); */
				$("#diff_budget_percentage"+bid_index).removeClass('background-red');
				$("#diff_budget_percentage"+bid_index).addClass('background-green');
			}
		}
		if(!isNaN(sum_bidder)) {
			showPackage_L1();
			showBidposition_bidders();
			//calculateSum1();
		}
		
	}
	
	//Function for showing the L1 Package in Green color
	function showPackage_L1(){
		//console.log("showPackage_L1");
		var pck_index,bid_index,total_amt_bidder;
		
		var package_count = parseInt($("#package_count").val())+1;	
		var bidder_count = parseInt($("#bidder_count").val())+1;	
		
		
		


		for(pck_index=1;pck_index<=package_count;pck_index++)
		{
			stuff = [];
			stuff_sort = [];
			stuff_unique= [];
			for(bid_index=1;bid_index<=bidder_count;bid_index++)
			{
				$("#package_bidder_"+pck_index+"_"+bid_index).removeClass('background-red');
				$("#package_bidder_"+pck_index+"_"+bid_index).removeClass('background-green');
				 var bid_details = {  
				"pck_index" :pck_index, 
				"bid_index" :bid_index,       
				"package_bidder_value" :parseFloat($("#package_bidder_"+pck_index+"_"+bid_index).val())
				
				};
		
			 queryStr = { bid_details };
			 stuff.push(queryStr);
				
			}
			
			var min = Math.min.apply(null, stuff.map(function(a){ return a.bid_details.package_bidder_value;}));
			//console.log("min"+min);
			for(bid_index=1;bid_index<=bidder_count;bid_index++)
			{
				  package_bidder_value = parseFloat($("#package_bidder_"+pck_index+"_"+bid_index).val());
				 
				  if((min==package_bidder_value) )
				  {
					 
					$("#package_bidder_"+pck_index+"_"+bid_index).addClass('background-green');
					
					if(pck_index==bid_index)
						$("#basis_award_package"+pck_index).val("L1");
					

				  }
				  
			
			 
			}

			//console.log("L1 Package start");
			showBidposition_packages();
		
			
		}//end of package
		
		//calculateSum1();
	}
	function get_minimumN(arr, n)
	{
		minimumN=[];
		const minimumN = (arr, n) => {
		
			if(n > arr.length){
			return false;
			}
			
		
			return arr.slice().sort((a,b) => {
			return a.bid_details.package_bidder_value - b.bid_details.package_bidder_value
			
			})
			.slice(0, n);
		};
		return minimumN;
	}

	 //Function for showing the Bid position in Packages
	function showBidposition_packages(stuff_sort){
		var bidder_value, pck_ndex_basis, bid_ndex_basis,finalized_value;
		var package_count = parseInt($("#package_count").val())+1;	
		var bidder_count = parseInt($("#bidder_count").val())+1;	
		console.log("showBidposition_packages start");
		//console.log(stuff_sort);
		stuff_unique = remove_duplicates_array(stuff);
		const minimumN = (arr, n) => {
		
			if(n > arr.length){
			return false;
			}
			
		
			return arr.slice().sort((a,b) => {
			return a.bid_details.package_bidder_value - b.bid_details.package_bidder_value
			
			})
			.slice(0, n);
		};
		//console.log(stuff_unique);
		if(stuff_unique.length>=3)
		{
			stuff_minimum = minimumN(stuff_unique, 3);
			
		}
		else if(stuff_unique.length>=2)
		{
			stuff_minimum = minimumN(stuff_unique, 2);
		}
		else 
		{
			stuff_minimum = stuff_unique;
			
			
		}
		
		
		//get_minimumN(stuff_unique, 3)
		console.log(stuff_minimum);
		console.log("showBidposition_packages end");
		$.each(stuff_minimum, function( key, value ) {
			
			bidder_value = value.bid_details.package_bidder_value;
			pck_ndex_basis = value.bid_details.pck_index;
			bid_ndex_basis = value.bid_details.bid_index;
			
			bidder_name = $("#final_bidder_name"+bid_ndex_basis).val();
			recommVendor_val = $("#recomm_vendor_package"+pck_ndex_basis).val();
			finalized_value = $("#finalized_award_value_package"+pck_ndex_basis).val();
			//console.log(bidder_value+"bidFinal"+finalized_value);
			if(recommVendor_val==bidder_name || finalized_value==bidder_value)
			{
				//console.log(recommVendor_val+"=="+bidder_name);
				basis_award_index=key+1;
				$("#basis_award_package"+pck_ndex_basis).val("L"+basis_award_index);
			}

				
			
		
		});
		//calculateSum1();
	}
	
		//remove duplicates
	function remove_duplicates_array(stuff_pck)
	{
		var result_unique_pck = [];
		$.each(stuff_pck, function (i, e) {
			var matchingItems_pck = $.grep(result_unique_pck, function (item) {
			   return item.bid_details.package_bidder_value === e.bid_details.package_bidder_value ;
			});
			if (matchingItems_pck.length === 0){
				result_unique_pck.push(e);
			}
		});
		
		return result_unique_pck;
	}
	//Function for showing the Bid position in Bidders
	function showBidposition_bidders(){
		var pck_index,bid_index,total_amt_bidder,flag;
		
		var bidder_count = parseInt($("#bidder_count").val())+1;	
		 
		
		stuff = [];
		stuff_sort = [];


		//stuff = {}; // Object
		for(bid_index=1;bid_index<=bidder_count;bid_index++)
		{
			 var bid_details = {  
			"bid_index" :bid_index,                                
			"total_value" :parseFloat($("#total_amt_bidder"+bid_index).val())
			
     		};
    
			queryStr = { bid_details };
			stuff.push(queryStr);
			
		}
		
		const leastN = (arr, n) => {
		   if(n > arr.length){
			  return false;
			}
		   
		  
			return arr.slice().sort((a,b) => {
			return a.bid_details.total_value - b.bid_details.total_value
			
			})
			.slice(0, n);
		};
		//console.log(leastN(stuff, 2));
		//remove duplicates
		var result_unique = [];
		$.each(stuff, function (i, e) {
			var matchingItems = $.grep(result_unique, function (item) {
			   return item.bid_details.total_value === e.bid_details.total_value ;
			});
			if (matchingItems.length === 0){
				result_unique.push(e);
			}
		});
		//console.log("result_unique");
		//console.log(result_unique);
		//end remove duplicates
		var result;
		
		
		if(result_unique.length>=3)
		{
			stuff_sort = leastN(result_unique, 3);
			
			result = stuff.every(isSameAnswer);
			
		}
		else if(result_unique.length>=2)
		{
			stuff_sort = leastN(result_unique, 2);
			result = stuff.every(isSameAnswer);
		}
		else 
		{
			stuff_sort = result_unique;
			
			result=false;
		}
		console.log(stuff);
		console.log(stuff_sort);
		console.log("resuly"+result);
		
		if(result===false)
		{
			$.each( stuff, function( stuff_key, stuff_value ) {
				bid_index = stuff_key+1;
				flag=0;
				total_amt_bidder = parseFloat($("#total_amt_bidder"+bid_index).val());
			
				
				$.each( stuff_sort, function( key, value ) {
					//console.log( key + ":" + value.bid_details.total_value );
					least3_value = value.bid_details.total_value;
					
					
					if((stuff_value.bid_details.total_value==value.bid_details.total_value) )
					{
						//console.log("bid_index"+bid_index+total_amt_bidder + " if and " + least3_value );
						flag=1;
						$("#bid_position"+bid_index).val("L"+(key+1)); 
					}
					
				
				});
				if(flag==0)
					$("#bid_position"+bid_index).val("L4"); 
			  });

			  //showBidposition_packages(stuff_sort);
		}

}
function highest(){ 
  return [].slice.call(arguments).sort(function(a,b){ 
    return b - a; 
  }); 
}

function compare(a, b) {
  if (a > b) return 1;
  if (b > a) return -1;

  return 0;
}



function isSameAnswer(el, index, arr) {
  var res;
  if (index === 0) {
    return true;
  } else {
    //return (el.bid_details.total_value === arr[index - 1].bid_details.total_value);
	res = (el.bid_details.total_value === arr[index - 1].bid_details.total_value);
	if(res)
		$("#bid_position"+el.bid_details.bid_index).val("L1"); 
		
	
  }
  return res;
}

function showBidders_finalized(){
	
	var package_name_bid,bidder_name, package_val,recommVendor_val,finalized_val;
	
	var package_count = parseInt($("#package_count").val())+1;	
	var bidder_count = parseInt($("#bidder_count").val())+1;	
	
	for(pck_index=1;pck_index<=package_count;pck_index++)
	{
		package_name_bid = $("#package_name_bid_hd"+pck_index).val();
		package_val = $("#package_label"+pck_index).val();
		recommVendor_val = $("#recomm_vendor_package"+pck_index).val();
		finalized_val = $("#finalized_award_value_package"+pck_index).val();
		if(recommVendor_val !='')
		{
			for(bid_index=1;bid_index<=bidder_count;bid_index++)
			{
				bidder_name = $("#final_bidder_name"+bid_index).val();
				console.log(package_name_bid+"=="+package_val+" && "+bidder_name+"=="+recommVendor_val);
				if(package_name_bid==package_val && bidder_name==recommVendor_val )
				{
					$("#package_bidder_"+pck_index+"_"+bid_index).attr('readonly', true);
					$("#package_bidder_"+pck_index+"_"+bid_index).val(finalized_val+"");
				}
				else
					$("#package_bidder_"+pck_index+"_"+bid_index).attr('readonly', false);

			}
		}
	}
	getBidders_total();
	
	
}



//Function for date comparison	
function validate_greater_date(firstDate, secondDate){
		
		
		$("#date_cmp_err").html("");
		if(firstDate){
			if(firstDate >= secondDate){ 
				$("#date_cmp_err").html("Receipt date should be less than CBE of contractor Appointment").css("color","red");
				
				return false;
			}
			else
				return true;
			
		}
}
//Delete Major terms rows except first when changing packages count
function deleteRow_majorTerms() {

	$("#t1").find("tr:gt(2)").remove();
}

