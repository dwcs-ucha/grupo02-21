<?php 
class Log {

    private static $logs = array();
    
    public static function fatalLog($data) {
        self::$logs['fatal'][] = $data;
    }

    public static function warningLog($data) {
        self::$logs['warnings'][] = $data;
    }

    public function logs($data) {
        self::$logs['log'][] = $data;
    }

    public function getLogs() {
        return self::$logs;
    }

}
?>