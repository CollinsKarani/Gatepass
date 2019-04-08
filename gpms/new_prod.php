
<form method="POST" action="?pid=product&sub=save">
  <p>
  <font size="2" face="Verdana">Add New Product:</font>
  <input type="text" name="name" size="20"><input type="hidden" name="action" value="depart" size="20"> &nbsp;
<?php
$query="SELECT * FROM `".$tbl."cat` WHERE `user_id`= '".$_SESSION['GPMA_key']."'  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die(mysql_error());
echo'  <select size="1"  id="p_cat"  name="p_cat">
<option value="">Select Category</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo"</select>";
?>
<input type="submit" value=" Save " name="B1"></p>
</form>