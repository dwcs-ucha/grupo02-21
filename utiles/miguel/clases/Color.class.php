<?php
/*
* Clase que genera los distintos colores de nuestro gráfico
*
* @author Miguel A García Fustes
* @date 11 de diciembre de 2021
* @version 1.0.0
*/

class Color
{
    /**
     * Método que devuelve colores de cálidos a fríos o al revés
     * con distinta separación en función del número de colores solicitados
     * 
     * @param int $total    Número de colores solicitados
     * @param boolean $firstCalido  Orden de la temperatura del color, por defecto de cálido a frío
     * 
     * @return array Un array con los colores ordenados según petición en formato hexadecimal, incluyendo la almohadilla
     */
    public static function getColoresCalidosFrios($total, $firstCalido = true) {
        $valorMasCalido = 1;
        $valorMasFrio = 0.3;
        $intervaloColores = floatval(($valorMasCalido - $valorMasFrio) / floatval($total));

        $h = $firstCalido ? $valorMasCalido : $valorMasFrio;
        $s = 1;
        $l = 0.33;
        $intervalo = $firstCalido ? -$intervaloColores : $intervaloColores;
        $colores = array();

        for ($i=0; $i < $total; $i++) { 
            $colores[] = '#' . self::hslToHex(array($h, $s, $l));
            $h += $intervalo;
        }

        return $colores;
    }

    /**
     * Método para pasar un color hexadecimal a HSL
     * 
     * @param string $hex El valor hexadecimal del color sin la almohadilla
     * 
     * @return array Un array con h, s y l
     */
    public static function hexToHsl($hex) {
        $hex = array($hex[0].$hex[1], $hex[2].$hex[3], $hex[4].$hex[5]);
        $rgb = array_map(function($part) {
            return hexdec($part) / 255;
        }, $hex);
    
        $max = max($rgb);
        $min = min($rgb);
    
        $l = ($max + $min) / 2;
    
        if ($max == $min) {
            $h = $s = 0;
        } else {
            $diff = $max - $min;
            $s = $l > 0.5 ? $diff / (2 - $max - $min) : $diff / ($max + $min);
    
            switch($max) {
                case $rgb[0]:
                    $h = ($rgb[1] - $rgb[2]) / $diff + ($rgb[1] < $rgb[2] ? 6 : 0);
                    break;
                case $rgb[1]:
                    $h = ($rgb[2] - $rgb[0]) / $diff + 2;
                    break;
                case $rgb[2]:
                    $h = ($rgb[0] - $rgb[1]) / $diff + 4;
                    break;
            }
    
            $h /= 6;
        }
    
        return array($h, $s, $l);
    }
    
    /**
     * Método que pasa un color HSL a hexadecimal
     * 
     * @param array $hsl Los valores del color
     * 
     * @return string El valor hexadecimal sin la almohadilla
     */
    public static function hslToHex($hsl)
    {
        list($h, $s, $l) = $hsl;
    
        if ($s == 0) {
            $r = $g = $b = 1;
        } else {
            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
            $p = 2 * $l - $q;
    
            $r = self::hue2rgb($p, $q, $h + 1/3);
            $g = self::hue2rgb($p, $q, $h);
            $b = self::hue2rgb($p, $q, $h - 1/3);
        }
    
        return self::rgb2hex($r) . self::rgb2hex($g) . self::rgb2hex($b);
    }
    
    public static function hue2rgb($p, $q, $t) {
        if ($t < 0) $t += 1;
        if ($t > 1) $t -= 1;
        if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
        if ($t < 1/2) return $q;
        if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;
    
        return $p;
    }
    
    public static function rgb2hex($rgb) {
        return str_pad(dechex($rgb * 255), 2, '0', STR_PAD_LEFT);
    }
}
