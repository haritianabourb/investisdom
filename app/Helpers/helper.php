<?php
if(!function_exists('stripAccents')){
    function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }
}

if(!function_exists('investis_menu')){
    function investis_menu($menuName, $type = null, array $options = [])
    {
        $menu = \App\Menu::display($menuName, $type, $options);
        return $menu;
    }

}

if(!function_exists('generate_password')){
    function generate_password($length = 8)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?".env("APP_KEY");
        $password = '';
        while(preg_match('/[a-z]/',$password) == 0
            && preg_match('/[A-Z]/',$password) == 0
            && preg_match('/[0-9]/',$password) == 0
            && preg_match('/[\!\@\#\$\%\^\&\*\(\)\_\-\=\+\;\:\,\.\?]/',$password) == 0
        ) {
            srand();
            $password = substr(str_shuffle($chars), mt_rand(0, strlen($chars) - $length), $length);
        }

        return $password;
    }

}



