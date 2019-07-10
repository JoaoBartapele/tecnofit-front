<?php

class Router
{
    public function __construct()
    {
        try {
            $this->get();
        } catch (Exception $e) {
            $rtn = [
                'result' => false,
                'message' => $e->getMessage()
            ];
        } finally {
            echo json_encode($rtn);
        }
    }

    private function get()
    {
        [$dir, $class, $action] = $this->url();
        eval("\$class = new " . ucwords($dir) . ucwords($class) . "();");
    }

    private function url()
    {
        $url = str_replace(getenv('DEFAULT_URI'), "", $_SERVER['REQUEST_URI']);
        $part = explode("/", $url);
        return [
            $part[0] ?? 'error',
            $part[1] ?? 'main',
            $part[2] ?? 'execute'
        ];
    }
}