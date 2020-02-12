<?php

use App\Matrix;


require "vendor/autoload.php";

$matrix = new Matrix(8,8,5);
$arr = $matrix->getMatrix();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Тестове завдання</h1>
<h2>Демо для прикладу з 8 стовпців і 8 рядків і 5 вісімок</h2>
<?
echo "<table>";
for ($n = 0; $n < 8; $n++) {
    echo '<tr>';
    for ($m = 0; $m < 8; $m++ ) {
        echo "<td>";
        print_r($arr[$n][$m]);
        echo "</td>";
    }
    echo '</tr>';
}
echo "</table>";
?>
</body>
</html>
