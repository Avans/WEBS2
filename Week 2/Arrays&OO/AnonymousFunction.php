<?php

$ageMapper = function($person) {
    return $person["age"];
};
$averageAge = function($ages) {
    return array_sum($ages)/count($ages);
};

echo $averageAge(array_map($ageMapper, [["age"=>37],["age"=>45],["age"=>33],["age"=>44]]));