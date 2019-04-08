function show_more(a){
document.getElementById('more_attach').style.display="";

}

function filter_prod(a){

	$.post("filter_prod.php", {tbl:""+ a +"" }, function(data){
				if(data.length >0) {
var item=data.split('::');				
document.getElementById('prod_1').innerHTML=item[0];
document.getElementById('prod_2').innerHTML=item[1];
document.getElementById('prod_3').innerHTML=item[2];
document.getElementById('prod_4').innerHTML=item[3];
document.getElementById('prod_5').innerHTML=item[4];
document.getElementById('prod_6').innerHTML=item[5];
document.getElementById('prod_7').innerHTML=item[6];
document.getElementById('prod_8').innerHTML=item[7];
document.getElementById('prod_9').innerHTML=item[8];
document.getElementById('prod_10').innerHTML=item[9];
				}});

}
function check(a){

var a =  document.getElementById('vehicle').value;
if (a == ''){
alert('You Must write vehicle no ');
}
if (a != ''){
var a =  document.getElementById('vendor').value;
if (a == ''){
alert('You Must Write Destination Name');
}
}
if (a != ''){
var a =  document.getElementById('depart').value;
if (a == ''){
alert('You Must Write Destination Name');
}
}

if (a != ''){
var a =  document.getElementById('approved').value;
if (a == ''){
alert('Type User Resposiable Name');
}
}

}	 

 /*------------------------------------------
        Enter Function             --------*/
    
function tabE(obj,e){ 
var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
if(e.keyCode==13){ 
var ele = document.forms[0].elements; 
for(var i=0;i<ele.length;i++){ 
var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
if(obj==ele[i]){ele[q].focus();break} 
} 
return false; 
} 
}
function loaded(){ 
 	 document.getElementById('loading').style.display ='none';
}