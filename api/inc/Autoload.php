<?php

class Autoload
{
    static public function Load($Class){
        try {
            $pieces = preg_split('/(?=[A-Z])/',$Class);
            $pieces = array_values(array_filter($pieces));
            if (file_exists('inc/' . $Class . '.php')) {
                require_once 'inc/' . $Class . '.php';
                return;
            }
            if (file_exists('lib/' . $Class . '.php')) {
                require_once 'lib/' . $Class . '.php';
                return;
            }
            if (file_exists('act/' . strtolower($pieces[0]) . '/' . strtolower($pieces[1]) . '.php')) {
                require_once 'act/' . strtolower($pieces[0]) . '/' . strtolower($pieces[1]) . '.php';
                return;
            }
            throw new Exception("Classe não localizada!");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


spl_autoload_register("Autoload::Load");