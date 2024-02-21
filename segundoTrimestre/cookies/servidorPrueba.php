<?php


if(isset($_COOKIE['contador'])){
    $visitas=++$_COOKIE['contador'];
    setcookie("contador",$visitas , time() + 10000, '/');
}else{
    setcookie("contador", 1, time() + 10000, '/');

}

