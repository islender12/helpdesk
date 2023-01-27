<?php
session_start();
class Session
{
    public $user;
    public $id;

    public function __construct()
    {
        if (empty($_SESSION)) {
            echo '<script>console.log("SN")</script>';
        } else {
            echo "ST";
        }
    }
}