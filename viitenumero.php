<?php
/**
 *
 * PHP VIITENUMEROLASKURI
 * more info on wiki
 * https://fi.wikipedia.org/wiki/Tilisiirto
 *
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Viljami Laurila <viljami@ninjami.fi>
 */

function viitenumero($invoiceNumber, $returnAsString = false) {

    /*
     * invoice number: 12356
     * pattern: 7, 3, 1, 7, 3, 1, 7...
     *
     * 7 x 6 = 42
     * 3 x 5 = 15
     * 1 x 4 = 4
     * 7 x 3 = 21
     * 3 x 2 = 6
     * 1 x 1 = 1
     *
     * total = 89
     * to next 10 = 90
     * diff 90 - 89 = 1
     *
     * => 123456 1
     * (if diff = 10: diff => 0)
     */


    // zero padding 123 => ...00000000000123
    $ref = str_pad($invoiceNumber, 19, '0', STR_PAD_LEFT);

    // the pattern (7, 3, 1 etc...)
    $parts = [7,3,1,7,3,1,7,3,1,7,3,1,7,3,1,7,3,1,7];

    $total = 0;
    // loop the fancy loop
    foreach($parts as $index => $part) {

        // calculate, add up
        $calc = substr($ref, strlen($ref)-$index-1, 1) * $part;
        $total += $calc;
    }

    // 10 - last number (89, last number = 9) => 1
    $check = 10 - substr($total, -1);
    if($check == 10) { $check = 0; }

    // 1234561 (dat last "1")
    $out = $ref . $check;

    // 00001234561 or just 1234561
    if( !$returnAsString ) {
        return (int)$out;
    }

    return $out;
}
