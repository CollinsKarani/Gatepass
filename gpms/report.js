function admin_sign(a,b,c,d){
var val=document.getElementById(a).checked;
	$.post("admin_sign.php", {chk:""+ val +"", id:""+ b +"", tbl:""+ c +""}, function(data){
				if(data.length >0) {
alert(data);
				}});

}
