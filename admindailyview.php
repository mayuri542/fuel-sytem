<?php
	session_start();
	if(!isset($_SESSION['adminuser']))

        {
            header("Refresh:2;url=adminlogin.html");
                die("LOGIN REQUIRED");
        }
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="header">
    <a style="font-size: 20px;background-color: grey;border-radius: 5px; ">Admin home</a>
    <a href="viewsheet.php">View machine details</a>
    <a href="adduser.html">Add employee</a>
    <a href="edituser.php">Employee details</a>
    <a href="admindaily.php">Daily Sheet</a>
    <a href="logout.php" style="float:right; padding:3px;">logout</a>
</div>
    <h1 >Daily report</h1>
        <form action="#" method="POST">

Select date:
            <input type="date" name="date">
            
<br>
<br>
            <input type="submit" name="submit" class="sbutton" value="Show">
            <button class="sbutton" href="dailyreport.php">Reset</button>
        </form>


<?php    
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
if(isset($_POST['submit'])){
    $input_date=$_POST['date'];
    $date=date("Y-m-d",strtotime($input_date));
    $uname=$_SESSION['user'];
 
    $out1=0;
    $out2=0;
    $out3=0;
    $out4=0;

    $totalobserved=0;
    $totalsale=0;
    $productrate=0;
    $amount=0;
    $recieved=0;
    $short=0;
    $remarks=0;

        
    $con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
        
    echo "Date : $input_date";
    echo '<table border="1" class="stable">
        <tr>
         <th>Shift</th>
         <th>Observed Volume</th>
         <th>Total Observed Volume</th>
         <th>Total Sale Volume</th>
         <th>Product Rate</th>
         <th>Amount</th>
         <th>Recieved amount</th>
         <th>Short</th>
         <th>Remarks</th>
        </tr>';
//------------------------------------------------------------------------------------------
//Shift1 Machine1
    $res=pg_query($con,"select * from m1 where udate='$date' and shift=1");
    while($row=pg_fetch_array($res)){
        $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
    }
    
    
    echo'
        <tr>
         <td rowspan="15">Shift1</td>
         <td>Machine 1</td>
         <td rowspan="5">'.$totalobserved.'</td>
         <td rowspan="5">'.$totalsale.'</td>
         <td rowspan="5">Rs'.$productrate.'</td>
         <td rowspan="5">Rs'.$amount.'</td>
         <td rowspan="5">Rs'.$recieved.'</td>
         <td rowspan="5">'.($amount-$recieved).'</td>
         <td rowspan="5">'.$remarks.'</td>
        </tr>
        
        <tr>
         <td>'.$out1.'</td>
        </tr>

        <tr>
         <td>'.$out2.'</td>
        </tr>

        <tr>
         <td>'.$out3.'</td>
        </tr>

        <tr>
         <td>'.$out4.'</td>
        </tr>';
//-----------------------------------------------------------------------------------------------
//Shift1 Machine2        

    $out1=0;
    $out2=0;
    $out3=0;
    $out4=0;

    $totalobserved=0;
    $totalsale=0;
    $productrate=0;
    $amount=0;
    $recieved=0;
    $short=0;
    $remarks=0;

    $res=pg_query($con,"select * from m2 where udate='$date'and shift=1");
    while($row=pg_fetch_array($res))
    {
       $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
    }
    
    
    echo'
        <tr>
         <td>Machine 2</td>
         <td rowspan="5">'.$totalobserved.'</td>
         <td rowspan="5">'.$totalsale.'</td>
         <td rowspan="5">Rs'.$productrate.'</td>
         <td rowspan="5">Rs'.$amount.'</td>
         <td rowspan="5">Rs'.$recieved.'</td>
         <td rowspan="5">'.($amount-$recieved).'</td>
         <td rowspan="5">'.$remarks.'</td>
        </tr>
        
        <tr>
         <td>'.$out1.'</td>
        </tr>

        <tr>
         <td>'.$out2.'</td>
        </tr>

        <tr>
         <td>'.$out3.'</td>
        </tr>

        <tr>
         <td>'.$out4.'</td>
        </tr>';
//-----------------------------------------------------------------------------------------
//Shift1 Machine3

    $out1=0;
    $out2=0;
    $out3=0;
    $out4=0;

    $totalobserved=0;
    $totalsale=0;
    $productrate=0;
    $amount=0;
    $recieved=0;
    $short=0;
    $remarks=0;

        $res=pg_query($con,"select * from m3 where udate='$date'and shift=1");
        while($row=pg_fetch_array($res)){
           $out1=$row[4];
        $out2=$row[5];
        $out3=$row[6];
        $out4=$row[7];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[8];
        $totalsale=$row[9];
        $amount=$totalsale*$productrate;
        $recieved=$row[10];
        $remarks=$row[11];
        }
        
        
        echo'
            <tr>
             <td>Machine 3</td>
             <td rowspan="5">'.$totalobserved.'</td>
             <td rowspan="5">'.$totalsale.'</td>
             <td rowspan="5">Rs'.$productrate.'</td>
             <td rowspan="5">Rs'.$amount.'</td>
             <td rowspan="5">Rs'.$recieved.'</td>
             <td rowspan="5">'.($amount-$recieved).'</td>
             <td rowspan="5">'.$remarks.'</td>
            </tr>
            
            <tr>
             <td>'.$out1.'</td>
            </tr>
    
            <tr>
             <td>'.$out2.'</td>
            </tr>
    
            <tr>
             <td>'.$out3.'</td>
            </tr>
    
            <tr>
             <td>'.$out4.'</td>
            </tr>';
//-------------------------------------------------------------------------    
//Shift2 Machine1

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;


$res=pg_query($con,"select * from m1 where udate='$date'and shift=2");
while($row=pg_fetch_array($res)){
   $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
}


echo'
    <tr>
     <td rowspan="15">Shift2</td>
     <td>Machine 1</td>
     <td rowspan="5">'.$totalobserved.'</td>
     <td rowspan="5">'.$totalsale.'</td>
     <td rowspan="5">Rs'.$productrate.'</td>
     <td rowspan="5">Rs'.$amount.'</td>
     <td rowspan="5">Rs'.$recieved.'</td>
     <td rowspan="5">'.($amount-$recieved).'</td>
     <td rowspan="5">'.$remarks.'</td>
    </tr>
    
    <tr>
     <td>'.$out1.'</td>
    </tr>

    <tr>
     <td>'.$out2.'</td>
    </tr>

    <tr>
     <td>'.$out3.'</td>
    </tr>

    <tr>
     <td>'.$out4.'</td>
    </tr>';
//-----------------------------------------------------------------------------------------------
//Shift2 Machine2

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;

$res=pg_query($con,"select * from m2 where udate='$date'and shift=2");
while($row=pg_fetch_array($res)){
  $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
}


echo'
    <tr>
     <td>Machine 2</td>
     <td rowspan="5">'.$totalobserved.'</td>
     <td rowspan="5">'.$totalsale.'</td>
     <td rowspan="5">Rs'.$productrate.'</td>
     <td rowspan="5">Rs'.$amount.'</td>
     <td rowspan="5">Rs'.$recieved.'</td>
     <td rowspan="5">'.($amount-$recieved).'</td>
     <td rowspan="5">'.$remarks.'</td>
    </tr>
    
    <tr>
     <td>'.$out1.'</td>
    </tr>

    <tr>
     <td>'.$out2.'</td>
    </tr>

    <tr>
     <td>'.$out3.'</td>
    </tr>

    <tr>
     <td>'.$out4.'</td>
    </tr>';
//-----------------------------------------------------------------------------------------
//Shift2 Machine3

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;

    $res=pg_query($con,"select * from m3 where udate='$date'and shift=2");
    while($row=pg_fetch_array($res)){
       $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
    }
    
    
    echo'
        <tr>
         <td>Machine 3</td>
         <td rowspan="5">'.$totalobserved.'</td>
         <td rowspan="5">'.$totalsale.'</td>
         <td rowspan="5">Rs'.$productrate.'</td>
         <td rowspan="5">Rs'.$amount.'</td>
         <td rowspan="5">Rs'.$recieved.'</td>
         <td rowspan="5">'.($amount-$recieved).'</td>
         <td rowspan="5">'.$remarks.'</td>
        </tr>
        
        <tr>
         <td>'.$out1.'</td>
        </tr>

        <tr>
         <td>'.$out2.'</td>
        </tr>

        <tr>
         <td>'.$out3.'</td>
        </tr>

        <tr>
         <td>'.$out4.'</td>
        </tr>';
//-------------------------------------------------------------------------    
//Shift3 Machine1

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;

$res=pg_query($con,"select * from m1 where udate='$date'and shift=3");
while($row=pg_fetch_array($res)){
   $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
}


echo'
    <tr>
     <td rowspan="15">Shift3</td>
     <td>Machine 1</td>
     <td rowspan="5">'.$totalobserved.'</td>
     <td rowspan="5">'.$totalsale.'</td>
     <td rowspan="5">Rs'.$productrate.'</td>
     <td rowspan="5">Rs'.$amount.'</td>
     <td rowspan="5">Rs'.$recieved.'</td>
     <td rowspan="5">'.($amount-$recieved).'</td>
     <td rowspan="5">'.$remarks.'</td>
    </tr>
    
    <tr>
     <td>'.$out1.'</td>
    </tr>

    <tr>
     <td>'.$out2.'</td>
    </tr>

    <tr>
     <td>'.$out3.'</td>
    </tr>

    <tr>
     <td>'.$out4.'</td>
    </tr>';
//-----------------------------------------------------------------------------------------------
//Shift3 Machine2

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;

$res=pg_query($con,"select * from m2 where udate='$date'and shift=3");
while($row=pg_fetch_array($res)){
  $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
    }


echo'
    <tr>
     <td>Machine 2</td>
     <td rowspan="5">'.$totalobserved.'</td>
     <td rowspan="5">'.$totalsale.'</td>
     <td rowspan="5">Rs'.$productrate.'</td>
     <td rowspan="5">Rs'.$amount.'</td>
     <td rowspan="5">Rs'.$recieved.'</td>
     <td rowspan="5">'.($amount-$recieved).'</td>
     <td rowspan="5">'.$remarks.'</td>
    </tr>
    
    <tr>
     <td>'.$out1.'</td>
    </tr>

    <tr>
     <td>'.$out2.'</td>
    </tr>

    <tr>
     <td>'.$out3.'</td>
    </tr>

    <tr>
     <td>'.$out4.'</td>
    </tr>';
//-----------------------------------------------------------------------------------------
//Shift3 Machine3

$out1=0;
$out2=0;
$out3=0;
$out4=0;

$totalobserved=0;
$totalsale=0;
$productrate=0;
$amount=0;
$recieved=0;
$short=0;
$remarks=0;

    $res=pg_query($con,"select * from m3 where udate='$date'and shift=3");
    while($row=pg_fetch_array($res)){
       $out1=$row[3];
        $out2=$row[4];
        $out3=$row[5];
        $out4=$row[6];
        $totalobserved=$out1+$out2+$out3+$out4;
        $productrate=$row[7];
        $totalsale=$row[8];
        $amount=$totalsale*$productrate;
        $recieved=$row[9];
        $remarks=$row[10];
    }
    
    
    echo'
        <tr>
         <td>Machine 3</td>
         <td rowspan="5">'.$totalobserved.'</td>
         <td rowspan="5">'.$totalsale.'</td>
         <td rowspan="5">Rs'.$productrate.'</td>
         <td rowspan="5">Rs'.$amount.'</td>
         <td rowspan="5">Rs'.$recieved.'</td>
         <td rowspan="5">'.($amount-$recieved).'</td>
         <td rowspan="5">'.$remarks.'</td>
        </tr>
        
        <tr>
         <td>'.$out1.'</td>
        </tr>

        <tr>
         <td>'.$out2.'</td>
        </tr>

        <tr>
         <td>'.$out3.'</td>
        </tr>

        <tr>
         <td>'.$out4.'</td>
        </tr>';
//-------------------------------------------------------------------------    

echo '</table>';

}
?>   
    </body>
</html>