<?php

    $tmpName = $_FILES['datafile'];
    //print_r($tmpName);
    //echo getcwd();
    $path = "data";
    $fileName = $path . DIRECTORY_SEPARATOR . $tmpName['name'];
    // echo($fileName);

    $success = move_uploaded_file($tmpName['tmp_name'], $fileName);
    if ($success) echo("Yah!");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    .parent {dispaly: flex;}
    .child {width: 200px; margin: 0px 5px; background-color: light-gray; pading: 25px;}
    </script>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include "navbar.php" ?>
        
    <div class="page-contents">

        <h1>My Upload Page</h1>
        <?php print_r($tmpName); ?>

        <div class="parent">
        <?php
    
            // read from the csv file we created by opening a stream and saying we want to read from the file
            $file = fopen("stock.csv", "rb");

            // while not end of file, grab each line and print it out
            while (!feof($file)) {
                $stock = fgetcsv($file);
                //print_r($stock);
                if ($stock === false) continue;
                $stocks[] = $stock;
            }

            //print_r($stocks);

            foreach ($stocks as $stock) {
                echo("<div class='child'>" . $stock[0] . "</div>");
            }
        ?>
        </div>

    </div>

    <?php include "foot.php" ?>
</body>
</html>