<?php

$mapper = function($characters) {
    return join(".", $characters);
};
$mapper2 = function($words) {
    return join("-", $words);
};

$mapped1 = array_map($mapper, [["a","b","c"],["d","e","f"]]);
echo $mapper2($mapped1);