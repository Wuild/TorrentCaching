<?php

class Bcode {

    /**
     * Info
     * @param type $f
     * @param type $ms
     * @return type 
     */
    static function bdec_file($f, $ms) {
        $fp = fopen($f, "rb");
        if (!$fp)
            return;
        $e = fread($fp, $ms);
        fclose($fp);
        return Bcode::bdec($e);
    }

    /**
     * Info
     * @param type $s
     * @return type 
     */
    static function bdec($s) {
        if (preg_match('/^(\d+):/', $s, $m)) {
            $l = $m[1];
            $pl = strlen($l) + 1;
            $v = substr($s, $pl, $l);
            $ss = substr($s, 0, $pl + $l);
            if (strlen($v) != $l)
                return;
            return array("type" => "string", "value" => $v, "strlen" => strlen($ss), "string" => $ss);
        }
        if (preg_match('/^i(-{0,1}\d+)e/', $s, $m)) {
            $v = $m[1];
            $ss = "i" . $v . "e";
            if ($v === "-0")
                return;
            if ($v[0] == "0" && strlen($v) != 1)
                return;
            return array("type" => "integer", "value" => $v, "strlen" => strlen($ss), "string" => $ss);
        }
        switch ($s[0]) {
            case "l":
                return Bcode::bdec_list($s);
            case "d":
                return Bcode::bdec_dict($s);
            default:
                return;
        }
    }

    /**
     * Info
     * @param type $s
     * @return type 
     */
    static function bdec_dict($s) {
        if ($s[0] != "d")
            return;
        $sl = strlen($s);
        $i = 1;
        $v = array();
        $ss = "d";
        for (;;) {
            if ($i >= $sl)
                return;
            if ($s[$i] == "e")
                break;
            $ret = Bcode::bdec(substr($s, $i));
            if (!isset($ret) || !is_array($ret) || $ret["type"] != "string")
                return;
            $k = $ret["value"];
            $i += $ret["strlen"];
            $ss .= $ret["string"];
            if ($i >= $sl)
                return;
            $ret = Bcode::bdec(substr($s, $i));
            if (!isset($ret) || !is_array($ret))
                return;
            $v[$k] = $ret;
            $i += $ret["strlen"];
            $ss .= $ret["string"];
        }
        $ss .= "e";
        return array("type" => "dictionary", "value" => $v, "strlen" => strlen($ss), "string" => $ss);
    }

    /**
     * Info
     * @param type $s
     * @return type 
     */
    static function bdec_list($s) {
        if ($s[0] != "l")
            return;
        $sl = strlen($s);
        $i = 1;
        $v = array();
        $ss = "l";
        for (;;) {
            if ($i >= $sl)
                return;
            if ($s[$i] == "e")
                break;
            $ret = Bcode::bdec(substr($s, $i));
            if (!isset($ret) || !is_array($ret))
                return;
            $v[] = $ret;
            $i += $ret["strlen"];
            $ss .= $ret["string"];
        }
        $ss .= "e";
        return array("type" => "list", "value" => $v, "strlen" => strlen($ss), "string" => $ss);
    }

    /**
     * Info
     * @param type $d
     * @param type $s
     * @return type
     * @throws Exception 
     */
    static function dict_check($d, $s) {
        if ($d["type"] != "dictionary")
            throw new Exception("Unknown file type");
        $a = explode(":", $s);
        $dd = $d["value"];
        $ret = array();
        $t = '';
        foreach ($a as $k) {
            unset($t);
            if (preg_match('/^(.*)\((.*)\)$/', $k, $m)) {
                $k = $m[1];
                $t = $m[2];
            }
            if (!isset($dd[$k]))
                throw new Exception("No Keys found.");
            if (isset($t)) {
                if ($dd[$k]["type"] != $t)
                    throw new Exception("Invalid entry key.");
                $ret[] = $dd[$k]["value"];
            }
            else
                $ret[] = $dd[$k];
        }
        return $ret;
    }

    /**
     * Info
     * @param type $d
     * @param type $k
     * @param type $t
     * @return type
     * @throws Exception 
     */
    static function dict_get($d, $k, $t) {
        if ($d["type"] != "dictionary")
            throw new Exception("not Dict.");
        $dd = $d["value"];
        if (!isset($dd[$k]))
            return;
        $v = $dd[$k];
        if ($v["type"] != $t)
            throw new Exception("Unknown type.");
        return $v["value"];
    }

    /**
     * Info
     * @param type $d 
     */
    static function benc_resp($d) {
        Bcode::benc_resp_raw(Bcode::benc(array('type' => 'dictionary', 'value' => $d)));
    }

    /**
     * Info
     * @param type $x 
     */
    static function benc_resp_raw($x) {
        header("Content-Type: text/plain");
        header("Pragma: no-cache");

        if ($_SERVER['HTTP_ACCEPT_ENCODING'] == 'gzip') {
            header("Content-Encoding: gzip");
            echo gzencode($x, 9, FORCE_GZIP);
        }
        else
            echo $x;
    }

    /**
     * Info
     * @param type $obj
     * @return type 
     */
    static function benc($obj) {
        if (!is_array($obj) || !isset($obj["type"]) || !isset($obj["value"]))
            return;
        $c = $obj["value"];
        switch ($obj["type"]) {
            case "string":
                return Bcode::benc_str($c);
            case "integer":
                return Bcode::benc_int($c);
            case "list":
                return Bcode::benc_list($c);
            case "dictionary":
                return Bcode::benc_dict($c);
            default:
                return;
        }
    }

    /**
     * Info
     * @param type $s
     * @return type 
     */
    static function benc_str($s) {
        return strlen($s) . ":$s";
    }

    /**
     * Info
     * @param type $i
     * @return type 
     */
    static function benc_int($i) {
        return "i" . $i . "e";
    }

    /**
     * Info
     * @param type $a
     * @return string 
     */
    static function benc_list($a) {
        $s = "l";
        foreach ($a as $e) {
            $s .= Bcode::benc($e);
        }
        $s .= "e";
        return $s;
    }

    /**
     * Info
     * @param type $d
     * @return string 
     */
    static function benc_dict($d) {
        $s = "d";
        $keys = array_keys($d);
        sort($keys);
        foreach ($keys as $k) {
            $v = $d[$k];
            $s .= Bcode::benc_str($k);
            $s .= Bcode::benc($v);
        }
        $s .= "e";
        return $s;
    }

}

?>
