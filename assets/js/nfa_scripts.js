
// get your select element and listen for a change event on it
$('#nfaType').change(function() {
  // set the window's location property to the value of the option the user has selected
  window.location = $(this).val();
/*  <?php $pg_url ?> = $(this).val();
  url =  "<?php echo base_url('.$pg_url.'); ?>";
  
  alert(url); */
});

//Function for getting  Days  between dates
	function calculateDays_betDates(firstDate, secondDate,daysVar){
		
		// end - start returns difference in milliseconds 
	
		days = daysdifference_betDates(firstDate, secondDate);
		if(!isNaN(days)) {
			$("#"+daysVar).val(days); 
		}
		
	}
//Calculate difference between dates
function daysdifference_betDates(firstDate, secondDate){  
		var startDay = new Date(firstDate);  
		var endDay = new Date(secondDate);  
	  
	// Determine the time difference between two dates     
		var millisBetween = endDay.getTime() -  startDay.getTime() ; 
		
		//var millisBetween = startDay.getTime() - endDay.getTime(); 
	  
	// Determine the number of days between two dates  
		var days = millisBetween / (1000 * 3600 * 24);  
		//alert("first"+days);
	// Show the final number of days between dates     
		//return Math.round(Math.abs(days)); 
		return Math.round(days);  		
	}  
	function allowNumOnly(sender){
		sender.value = sender.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
	}

	function changeToCr(sender){

	let val = sender.value;

	let val1 = String(val);
	if (val1){
		if(val1.includes("Cr")){
			sender.value = val;
		}else if(!val1.includes("Cr")){
			sender.value = sender.value + " Cr";
		}
	}
	}

	function setInputFilter(textbox, inputFilter) {
		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
			textbox.addEventListener(event, function() {
			if (inputFilter(this.value)) {
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
				this.oldSelectionEnd = this.selectionEnd;
			} else if (this.hasOwnProperty("oldValue")) {
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			}
			});
		});
	}

	function decimalStrict(){
	let noOfClasses=document.getElementsByClassName("decimalStrictClass").length;
	for(let k = 0;k<=noOfClasses;k++){
	setInputFilter(document.getElementsByClassName("decimalStrictClass")[k], function(value) {
		return /^-?\d*[.,]?\d{0,2}$/.test(value); });
	}
	}

	$('.onMouseOutClass').on('mouseout', (event) => {
		let ele = document.getElementsByClassName("onMouseOutClass");
		// console.log("ele",ele);
		for(let i = 0;i<ele.length;i++){
			let val = event.target.value;
			let val1 = String(event.target.value);
			if (val1) {
				if (val1.includes("Cr")) {
					event.target.value = val;
				} else if (!val1.includes("Cr")) {
					event.target.value = event.target.value + " Cr";
				}
			}
		}

	})

	$('.onBlurClass').on('blur', (event) => {
		let ele = document.getElementsByClassName("onBlurClass");
		// console.log("ele",ele);
		for(let i = 0;i<ele.length;i++){
			let val = event.target.value;
			let val1 = String(event.target.value);
			if (val1) {
				if (val1.includes("Cr")) {
					event.target.value = val;
				} else if (!val1.includes("Cr")) {
					event.target.value = event.target.value + " Cr";
				}
			}
		}

	})
