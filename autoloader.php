<?php
//Ejercicio 1.a
function autocargador($clase) {
    require_once 'clases/' . $clase . '.php';
}

spl_autoload_register('autocargador');