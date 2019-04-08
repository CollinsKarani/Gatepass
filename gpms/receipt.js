
function change(a){

var d =  document.getElementById('current_date').value;
 document.getElementById('return_'+a).value= d;
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