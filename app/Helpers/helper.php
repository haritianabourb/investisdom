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

