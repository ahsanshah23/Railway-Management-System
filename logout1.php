<?php

SESSION_START();

$_SESSION =array();
session_destroy();

require 'adminlogin.html';

?>