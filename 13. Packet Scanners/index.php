<?php
    $x = [];
    $y = []; 
    $severity = 0;

    # read inputs
    $lines = file('firewall_config.txt', FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        $firewall_config = explode(':', $line);
        array_push($x, intval(trim($firewall_config[0])));
        array_push($y, intval(trim($firewall_config[1])));
    }

    # Puzzle 1 - severity

    # Loop through the x axis - depth
    for ($i = 0; $i < count($x); $i++) {

        # To find out if you are caught, we need to see when the layer number you are 
        # in is equal to the number of steps it takes for the scanner to return to the top.
        # We do this by getting the number of steps it takes to get there and look at the remainder 
        # of divinding the layer by the range. If the remainder is zero it means that 
        # the scanner WILL meet the packet at that point
        if ($x[$i] % (2 * ($y[$i] - 1)) === 0) {
            
            # Add the product of the x and y to the severity
            $severity += $x[$i] * $y[$i];
        }
    }
    
    echo "The severity of the trip is : " . $severity . "<br>";

    # Puzzle 2 - fastest 0 severity

    $delay = 0;

    do {
        $severity = 0;

        # Loop through the x axis - depth
        foreach ($x as $key => $value) {
            
            $depthAndDelay = $value + $delay;
            $rangeAlgorithm = 2 * ($y[$key] - 1);

            if ($depthAndDelay % $rangeAlgorithm === 0){
                $severity = 1;
                break;
            }
        }

        $delay++;

    } while ($severity != 0);

    echo "The minimum severity for the trip is : " . ($delay - 1);
?>