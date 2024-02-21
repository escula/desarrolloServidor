<?php
class Calculador {
    public function esMayorEdad($fechaNacimiento) {
//        echo date('d-m-Y');
        $hoy = new DateTime();
        $nacimiento = new DateTime($fechaNacimiento);
        $edad = $hoy->diff($nacimiento)->y;
        return $edad >= 18;
    }
}
