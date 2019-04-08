
function checkform(){

  if(document.frm.namee.value=='')
  {
  	alert("Please enter your name!");
	document.frm.namee.focus();
  	return false;
  }

  if(document.frm.email.value=='')

  {

  	alert("Please write your email address!");

	document.frm.email.focus();

  	return false;

  }

  if(document.frm.password.value=='')
  {
  	alert("Please enter new password atleast 6 charector!");
	document.frm.password.focus();
  	return false;
  }

  if(document.frm.cnamee.value=='')

  {

  	alert("Please enter company name!");

	document.frm.cnamee.focus();

  	return false;

  }
  if(document.frm.phone.value=='')

  {

  	alert("Please write your Contact No!");

	document.frm.phone.focus();

  	return false;

  }

 


 

  if(document.frm.ctypee.value=='0')

  {

  	alert("Please select company type!");

	document.frm.ctypee.focus();

  	return false;

  }

  

  if(document.frm.country.value=='0')

  {

  	alert("Please select country name");

	document.frm.country.focus();

  	return false;

  }

  

   if(document.frm.state.value=='Select State')

  {

  	alert("Please select state!");

	document.frm.state.focus();

  	return false;

  }

 

}


 var states = new Array();

		

states['Australia'] = new Array('Select State','New South Wales','Western Australia','Australian Capital Territory','Tasmania','New South Wales','South Australia','Victoria','Northern Territory','Queensland');

				

states['Canada'] = new Array('Select State','Alberta','Ontario','Yukon Territory','British Columbia','Nunavut','Saskatchewan','Northwest Territories','Manitoba','Newfoundland and Labrador','Quebec','New Brunswick','Nova Scotia','Prince Edward Island');

				

states['United States'] = new Array('Select State','Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Florida','Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Marianas Islands','Ohio','Oklahoma','Oregon','Pennsylvania','Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Virgin Islands','Washington','West Virginia','Wisconsin','Wyoming','Others');

				

states['United Kingdom'] = new Array('Select State','Northern Ireland','Scotland','Wales','England');

		

// City lists

var cities = new Array();



cities['Canada'] = new Array();

cities['Canada']['Alberta']          = new Array('Edmonton','Calgary');

cities['Canada']['British Columbia'] = new Array('Victoria','Vancouver');

cities['Canada']['Ontario']          = new Array('Toronto','Hamilton');



cities['Mexico'] = new Array();

cities['Mexico']['Baja California'] = new Array('Tijauna','Mexicali');

cities['Mexico']['Chihuahua']       = new Array('Ciudad Juárez','Chihuahua');

cities['Mexico']['Jalisco']         = new Array('Guadalajara','Chapala');



cities['United States'] = new Array();

cities['United States']['California'] = new Array('Los Angeles','San Francisco');

cities['United States']['Florida']    = new Array('Miami','Orlando');

cities['United States']['New York']   = new Array('Buffalo','new York');





cities['United Kingdom'] = new Array();

cities['United Kingdom']['England'] = new Array('Bedfordshire','Berkshire');

cities['United Kingdom']['Florida']    = new Array('Miami','Orlando');

cities['United Kingdom']['New York']   = new Array('Buffalo','new York');







function setStates() {



  cntrySel = document.getElementById('country');

  stateList = states[cntrySel.value];

  changeSelect('state', stateList, stateList);

  setCities();

}



function setCities() {

  cntrySel = document.getElementById('country');

  stateSel = document.getElementById('state');

  cityList = cities[cntrySel.value][stateSel.value];

  changeSelect('city', cityList, cityList);

}



function changeSelect(fieldID, newOptions, newValues) {

  selectField = document.getElementById(fieldID);

  selectField.options.length = 0;

  for (i=0; i<newOptions.length; i++) {

  selectField.options[selectField.length] = new Option(newOptions[i], newValues[i]);

  }

}



// Multiple onload function created by: Simon Willison

// http://simonwillison.net/2004/May/26/addLoadEvent/

function addLoadEvent(func) {

  var oldonload = window.onload;

  if (typeof window.onload != 'function') {

    window.onload = func;

  } else {

    window.onload = function() {

      if (oldonload) {

        oldonload();

      }

      func();

    }

  }

}



addLoadEvent(function() {

  setStates();

});

