<?php
function findPoint(array $strArr)
{
    // code goes here
    $firstElements = explode(", ", $strArr[0]);
    $secondElements = explode(", ", $strArr[1]);
    $occurenceElements = array_intersect($firstElements, $secondElements);
    if( empty($occurenceElements) ) return 'false';
    return implode(",", $occurenceElements);
}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
