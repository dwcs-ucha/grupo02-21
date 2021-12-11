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

    public function __construct($username, $ip, $fecha, $serverName, $browser, $so, $requestTime)
    {
        $this->username = $username;
        $this->serverName = $serverName;
        $this->ip = $ip;
        $this->fecha = $fecha;
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

    /**
     * El método devuelve la ip del usuario. Si, por lo que sea, no es capaz
     *  de averiguarla, devolverá la string "IP desconocida".
     */
    public static function guessIP()
    {
        $ip = "IP desconocida";
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }

        return $ip;
    }

    /**
     * Pasándole una dirección IP como parámetro, el método nos devolverá
     * una string con la ubicación de la misma. En caso de no conocerla,
     * devolverá "Ubicación desconocida".
     * 
     * @param string $ip La IP que se desea localizar.
     * @return string La localización de la IP en formato "Ciudad, Región".
     */
    public static function locateIP($ip)
    {
        $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        var_dump($dataArray);
        if ($dataArray["geoplugin_city"] != null && $dataArray["geoplugin_region"] != null) {
            return $dataArray["geoplugin_city"] . ", " . $dataArray["geoplugin_region"];
        } else {
            return "Ubicación desconocida";
        }
    }
}
