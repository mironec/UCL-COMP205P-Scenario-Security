<?php
if(!isset($_GET['token'])) die();
if($_GET['token'] != session_id()) die();