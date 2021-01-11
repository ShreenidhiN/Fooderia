<?PHP

include("toconnect.php");
$query = "call billsGraph();";
$result = mysqli_query($connection, $query);
if(!$result)
	echo mysqli_error($connection);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ Bill_id:'".$row["Bill_id"]."', Order_id:".$row["Order_id"].", Customer_id:".$row["Customer_id"].", Total_Amount:".$row["Total_Amount"]."}, ";
}
?>
 
 
<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
 <br> </br>
   <div id="chart"></div>
 </div>
 </body>
</html>




 
