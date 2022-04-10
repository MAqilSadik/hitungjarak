<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

</head>
<body>
    <form action="index.php" method="POST">
        <h1>Add New Location</h1>
        <table>
            <tr>
                <td><label for="location">Nama Lokasi</label></td>
                <td><input type="text" name="location" id="location"></td>
            </tr>
            <tr>
                <td><label for="latitude">Latitude</label></td>
                <td><input type="text" name="latitude" id="latitude"></td>
            </tr>
            <tr>
                <td><label for="longitude">Longitude</label></td>
                </td>
                <td><input type="text" name="longitude" id="longitude"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>


    <?php

$handle = fopen("locations.csv", "a+");
if(isset($_POST["submit"])) {
    $data = "\n".$_POST['location'].',"'.$_POST['latitude'].','.$_POST['longitude'].'"';
    fwrite($handle, $data); # $line is an array of strings (array|string[])
}
fclose($handle);


function hitungJarak($x1, $y1, $x2, $y2) {
    $r = sqrt(pow($x2-$x1, 2)+pow($y2-$y1, 2));
    return $r;
}


$myFile = fopen("locations.csv", 'r') or die ("Unable to open file!") ;

echo "<table border='1'>";
echo "<tr>";

$i=0;
while(! feof($myFile)) {
    
    $line = fgets($myFile);

    // Pecah data
    $pecah = explode(",", $line);

    if($i==0) {
        $i++;
        continue;
    }

    $lat= str_replace('"', "", $pecah[1]);
    $long= str_replace('"', "", $pecah[2]);
    $float_value_of_var1 = floatval($pecah[1]);
    $float_value_of_var2 = floatval($pecah[2]);
    $jarak = hitungJarak($float_value_of_var1, -7.5652649, $float_value_of_var2, 110.8147185);

   echo "<td>";
   echo $pecah[0];
   echo "</td>";
   echo "<td>";
   echo $lat;
   echo "</td>";
   echo "<td>";
   echo $long;
   echo "</td>";
   echo "<td>";
   echo $jarak;
   echo "</td>";
   echo "</tr>";
   $i++;
}
echo "</table>";
fclose($myFile);
?>
</body>
</html>