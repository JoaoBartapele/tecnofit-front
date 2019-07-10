<?php

class Router
{
    public function __construct()
    {
        try {
            $rtn = $this->get();
        } catch (Exception $e) {
            $rtn = [
                'result' => false,
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ];
        } finally {
            echo json_encode($rtn);
        }
    }

    private function get()
    {
        $rtn = [];
        [$dir, $class, $action] = $this->url();
        eval("\$class = new " . ucwords($dir) . ucwords($class) . "();");
        if(!method_exists($class, $action)) {
            throw new Exception("Função não localizada!", 1);
        }
        eval("\$rtn = \$class->" . $action . "();");
        if(!$rtn) {
            throw new Exception("Ação não encontrada!", 2);
        }
        return $rtn;
    }

    private function url()
    {
        $url = str_replace(getenv('DEFAULT_URI'), "", $_SERVER['REQUEST_URI']);
        $part = explode("/", $url);
        $dir = isset($part[0]) && $part[0] !== '' ? $part[0] : 'error';
        $class = isset($part[1]) && $part[1] !== '' ? $part[1] : 'main';
        $action = isset($part[2]) && $part[2] !== '' ? $part[2] : 'execute';
        return [
            $dir,
            $class,
            $action
        ];
    }
}