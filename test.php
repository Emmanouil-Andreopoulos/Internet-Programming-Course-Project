<!DOCTYPE html>
<html>
<body>

<?php
// Positive numbers:
echo substr("Hello world",0,10)."<br>";
echo substr("Hello world",1,8)."<br>";
echo substr("Hello world",0,5)."<br>";
echo substr("Hello world",6,6)."<br>";
echo "<br>";

// Negative numbers:
echo substr("Hello world",0,-1)."<br>";
echo substr("Hello world",-10,-2)."<br>";
echo substr("Hello world",0,-6)."<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


function get_date_format($str)
        {
            $day = substr($str, 0, 2);
            $month = substr($str, 3, 2);
            $year = substr($str, 6, 4);
            $date = $year."-".$month."-".$day;
            return $date;
        }
        
        
        echo get_date_format("04/06/2016");
?>

</body>
</html>