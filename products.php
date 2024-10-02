<?php

    // data to put into the csv file
    $data = array(
        ['GOOG', 'Google Inc.', '800'],
        ['AAPL', 'Apple Inc.', '500'],
        ['AMZN', 'Amazon.com Inc.', '250'],
        ['YHOO', 'Yahoo! Inc.', '250'],
        ['FB', 'Facebook, Inc.', '30'],
        ['YHOO', 'Yahoo! Inc.', '250']
    );

    // variable to hold the file we want to open
    $file_name = "stock.csv";

    // variable to create a stream to open communication to the file and say we want to write to the file
    $file = fopen($file_name, "w");

    // if the stream failed to communicate, terminate, else continue
    if ($file === false) {
        die("Error opening the file $file_name");
    } else {
        echo("all good.");
    }

    // go through the array and input each row into a csv file
    foreach($data as $row) {
        fputcsv($file, $row);
    }

    // close the stream to clear memory space
    fclose($file);

    // read from the csv file we created by opening a stream and saying we want to read from the file
    $file = fopen("stock.csv", "rb");

    // while not end of file, grab each line and print it out
    while (!feof($file)) {
        $stock = fgetcsv($file);
        //print_r($stock);
        if ($stock === false) continue;
        $stocks[] = $stock;
    }

    print_r($stocks);

    foreach ($stocks as $stock) {
        echo($stock[0]);
    }