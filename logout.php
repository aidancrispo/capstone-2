<?php
session_start();
session_destroy();
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You are now logged out')
        window.location.href='home.php#page-top'
        </SCRIPT>");
