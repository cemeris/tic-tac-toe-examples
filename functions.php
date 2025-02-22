<?php

function getEntries() {
    $entries = json_decode(file_get_contents('tictactoe_db.json'), true);
    if (!is_array($entries)) {
        $entries = ['table'=>  [], 'count'=> 0] ;
    }
    return $entries;
}

function &getTable(&$entries) {
    $entries['table'] = array_key_exists('table', $entries) ? $entries['table'] : [];

    return $entries['table'];
}


function saveEntries($entries) {
    file_put_contents('tictactoe_db.json', json_encode($entries, JSON_PRETTY_PRINT));
}

function resetEntries() {
    file_put_contents('tictactoe_db.json', '');
}

function checkWiner($element1, $element2, $element3) {
    if (($element1 == $element2) && ($element2 == $element3)) {
        return $element1;
    }
    else {
        return '';
    }
}
// 'x' || 'o' || ''
function getEntry($table, $r, $c) {
    if (
        array_key_exists($r,$table) &&
                array_key_exists($c,$table[$r])
                ) {
                    return $table[$r][$c];
                } 
    return ' ';
}
