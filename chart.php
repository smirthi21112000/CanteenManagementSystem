<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=canteenorder", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
        if($_POST['date2'] != ''){

         $query = "SELECT fname , sum(subtotal) as amount FROM orders WHERE date BETWEEN '".$_POST["date"]."' AND '".$_POST["date2"]."' GROUP by fname";            

        }else{
            $query = "SELECT fname , sum(subtotal) as amount FROM orders WHERE date ='".$_POST["date"]."' GROUP by fname";            
        }

        $result = $connect->query($query);
    
            $data = array();
    
            foreach($result as $row)
            {
                $data[] = array(
                    'fname'		=>	$row["fname"],
                    'amount'	=>	$row["amount"],
                    'color'		=>	'#' . rand(100000, 999999) . ''
                );
            }
		

		echo json_encode($data);
	}
    if($_POST["action"] == 'sftech')
	{
        
        $query = "SELECT fname , sum(subtotal) as amount FROM orders GROUP by fname";            
    
        $result = $connect->query($query);
    
            $data = array();
    
            foreach($result as $row)
            {
                $data[] = array(
                    'fname'		=>	$row["fname"],
                    'amount'	=>	$row["amount"],
                    'color'		=>	'#' . rand(100000, 999999) . ''
                );
            }
		

		echo json_encode($data);
	}
}

?>