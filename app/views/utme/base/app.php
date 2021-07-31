<?php

require_once 'head.php';
if($header) require_once 'header.php';
if($sideNav) require_once 'side-nav.php';
echo $body;
if ($footer) require_once 'footer.php';
require_once 'foot.php';