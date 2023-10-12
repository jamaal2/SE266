<?php

//list to dump
$superheros = ['Spiderman', 'Batman', 'Superman'];


function dd($data){
    echo '<pre>';

    die(var_dump($data));

    echo '</pre>';
}


//list array
dd($superheros);