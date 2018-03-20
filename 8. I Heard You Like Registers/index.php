<?php

    $maxArray = [];
    $highest = 0;
    $vars = [];
    $lines = file('instructions.txt', FILE_IGNORE_NEW_LINES);

    foreach($lines as $key => $line){
        $items = explode(' ', $line);

        $var = $items[0];
        $action = $items[1];
        $amount = intval($items[2]);
        $var2 = $items[4];
        $op = $items[5];
        $comparator = intval($items[6]);

        if (!in_array($var, $vars)){
            array_push($vars, $var);
        }

        if (!in_array($var2, $vars)){
            array_push($vars, $var2);
        }

        if (!isset($$var)) {
            $$var = 0;
        }

        if (!isset($$var2)) {
            $$var2 = 0;
        }

        switch ($op) {
            case '==':
                if (${$var2} == $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
            case '>':
                if (${$var2} > $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
            case '<':
                if (${$var2} < $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
            case '<=':
                if (${$var2} <= $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
            case '>=':
                if (${$var2} >= $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
            case '!=':
                if (${$var2} != $comparator){
                    if ($action == 'inc'){
                        ${$var} += $amount;
                    } else {
                        ${$var} -= $amount;
                    }
                    if (${$var} > $highest) $highest = ${$var};
                }
                break;
        }
    }

    foreach ($vars as $key => $variable) {
        // echo "$variable: " . ${$variable} . '</br>';
        array_push($maxArray, ${$variable});
    }

    echo 'The maximum is: '.max($maxArray).'<br>';
    echo 'The highest value is: '.($highest);

?>