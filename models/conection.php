<?php
    class conection{
        static public function conect(){
            $link = new PDO('mysql:host=localhost;dbname=torquebike_api', 'root', 'password');
            $link->exec('set names utf8');

            return $link;
        }

    }
?>