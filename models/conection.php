<?php
    class conection{
        static public function conect(){
            //$link = new PDO('mysql:host=localhost;dbname=torquebike_api', 'root', 'password');
            $link = new PDO('mysql:host=localhost:3307;dbname=torquebike_api', 'root', 'nuviavelasquez07');
            $link->exec('set names utf8');

            return $link;
        }

    }
?>