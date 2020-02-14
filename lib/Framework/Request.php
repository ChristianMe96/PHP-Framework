<?php

namespace Framework;


class Request
{
    private $get;
    private $post;
    private $files;

    public function __construct($get, $post, $files)
    {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;

    }

    public function getFromQuery(string $name): string
    {
        if (isset($this->get[$name])){
            return $this->get[$name];
        }
        return false;
    }

    public function getFromPost(string $name): string
    {
        if (isset($this->post[$name])){
            return $this->post[$name];
        }
        return false;
    }

    public function getFromFiles(string $arrayName, string $name): string
    {
        return $this->files[$arrayName][$name];
    }
}
