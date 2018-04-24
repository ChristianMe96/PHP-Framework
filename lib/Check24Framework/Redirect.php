<?php

namespace Check24Framework;


class Redirect
{
    public static function to($location){
        if ($location) {
            if (is_numeric($location)){
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include('../template/error/404.html');
                        exit();
                        break;
                }
            }
            header('Location: ' . $location, TRUE , 301);
            exit();
        }
    }
}