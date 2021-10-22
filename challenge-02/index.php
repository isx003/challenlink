<?php

function noIterate(array $strArr): string
{
    // code goes here
    $N = $strArr[0];
    $K = $strArr[1];

    $lenN = strlen($N);
    $lenK = strlen($K);

    for($i = $lenK; $i <= $lenN; $i++){
        for($j = 0; $j <= $lenN - 1; $j++){
            $subStrN = substr($N, $j, $i);
            if( containAllCharactersOfK($subStrN, $K, $lenK) ){
                return $subStrN;
            }
        }
    }
    return "String not found";
}

function containAllCharactersOfK(string $subsStrN, string $K, int $lenK): bool
{
    for( $i = 0; $i < $lenK; $i++ ){
        $kLetter = substr($K, $i, 1);
        $positionFound = strpos($subsStrN, $kLetter);
        if( strpos($subsStrN, $kLetter) === false ) return false;
        $subsStrN = substr_replace($subsStrN, '', $positionFound, 1);
    }
    return true;
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);
