<?php
namespace MyTailor;

class MyLogger
{
    public function log( $msg ) {
        print_r( $msg . "\n" );
    }
}