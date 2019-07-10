<?php

class Logger
{
    private $file;
    private $prefix = [];

    public function __construct($className)
    {
        $time = date_create(null, new DateTimeZone("America/Sao_Paulo"));
        $this->file = fopen(__DIR__ . "/../log/" . $className . '-' . $time->format("Ydm-His") . '.txt', "a+");
    }

    public function log($msg, $total, $i, $level)
    {
        $content = $this->dir($msg, $total, $i, $level);
        fwrite($this->file, $content);
    }

    public function close()
    {
        fclose($this->file);
    }

    private function dir($msg, $total, $i, $level)
    {
        if($level === -1) {
            return sprintf("%s%s", $msg, PHP_EOL);
        }

        $segment = "│ ";
        $tip = "├";
        if ($total - $i === 1) {
            $segment = "  ";
            $tip = "└";
        }

        $this->prefix[$level] = $segment;

        return sprintf("%s%s %s%s", implode('', array_slice($this->prefix, 0, $level)), $tip, $msg, PHP_EOL);
    }
}