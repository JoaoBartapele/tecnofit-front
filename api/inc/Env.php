<?php

class Env
{
    private $file = "./.env";

    public function __construct()
    {
        try {
            $this->load();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function load()
    {
        $file = fopen($this->file, 'r');
        if(!$file) {
            throw new Exception("Você precisa configurar seu arquivo .env");
        }
        while (!feof($file)) {
            $line = fgets($file);
            if(trim($line) === '') continue;
            $part = explode("=", $line);
            $value = str_replace(PHP_EOL, "", preg_replace("/(\'|\")/", "", trim($part[1])));
            putenv($part[0] . '=' . $value);
        }
        fclose($file);
    }
}