<?php

class Visitas
{


    private $serverName;
    private $ip;
    private $fecha;
    private $username;
    private $browser;
    private $so;
    private $requestTime;

    public function __construct($username, $ip,$fecha, $serverName, $browser, $so, $requestTime)
    {
        $this->username = $username;
        $this->serverName = $serverName;
        $this->ip = $ip;
        $this->fecha=$fecha;
        $this->browser = $browser;
        $this->so = $so;
        $this->requestTime = $requestTime;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getServerName()
    {
        return $this->serverName;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function getSo()
    {
        return $this->so;
    }

    public function getRequesTime()
    {
        return $this->requestTime;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function formatVisit()
    {
        $format = [$this->username, $this->ip, $this->fecha, $this->serverName, $this->browser, $this->so, $this->requestTime];
        return $format;
    }
}
