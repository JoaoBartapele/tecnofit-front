<?php

class Options 
{
    public $action;
    private $classes;

    public function __construct()
    {
        $this->listClasses();
        $this->getInfo();
        $this->checkAction();
        return $this->action;
    }

    private function checkAction()
    {
        $txt = "========================================" . PHP_EOL . PHP_EOL;
        $act = [];
        foreach ($this->classes as $id=>$obj) {
            $act[] = $id;
            $txt.= "[" . $id . "] " . $obj['name'] . PHP_EOL;
            $txt.= " - Descrição: " . $obj['description'] . PHP_EOL . PHP_EOL;
        }
        $txt.= "========================================" . PHP_EOL;
        $txt.= "Qual ação deseja executar? [" . implode(", ", $act) . "]: ";
        echo $txt;
        $handle = fopen("php://stdin","r");
        $reply = fgets($handle);
        $this->action = $this->classes[trim($reply)];
    }

    private function listClasses()
    {
        $filelist = [];
        if ($handle = opendir('./act')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && strpos($entry, ".php") !== 0) {
                    $filelist[]['class'] = str_replace(".php", "", $entry);
                }
            }
            closedir($handle);
        }
        $this->classes = $filelist;
    }

    private function getInfo()
    {
        foreach ($this->classes as $key=>$obj) {
            $rc = new ReflectionClass($obj['class']);
            $pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
            preg_match_all($pattern, $rc->getDocComment(), $matches, PREG_PATTERN_ORDER);
            [$name, $description] = $this->adjustComments($matches);
            $this->classes[$key]['name'] = $name;
            $this->classes[$key]['description'] = $description;
        }
    }

    private function adjustComments($comments)
    {
        $rtn = [];
        foreach($comments[0] as $comment) {
            $part = explode("=", $comment);
            $name = str_replace("@", "", $part[0]);
            $rtn[$name] = $part[1];
        }
        return [$rtn['name'], $rtn['description']];
    }
}