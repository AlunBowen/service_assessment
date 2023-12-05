<?php
 namespace App;
class appendLang {
   


   


public static function append($field) {
    $lang = session('lang');

    if ($lang == null) {
        $lang = 'en';
    }
    return $field . $lang;
}
}
?>