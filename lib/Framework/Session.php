<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 07.05.2018
 * Time: 11:49
 */

namespace Framework;

/**
 * Class Session
 * @package Framework
 */
class Session
{
    private $session = [];


    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * @param $variableName
     * @return mixed
     */
    public function getSessionVariable($variableName)
    {
        if (isset($this->session[$variableName])){
            return $this->session[$variableName];
        }
        return false;
    }

    /**
     * @param $variableName
     * @param $value
     */
    public function setSession($variableName, $value)
    {
        $this->session[$variableName] = $value;
    }



}