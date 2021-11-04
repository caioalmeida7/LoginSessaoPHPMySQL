<?php

$conn = new mysqli('localhost', 'root', '', 'atividadepwi');
//$conn = new mysqli('fdb29.awardspace.net', '3666447_atividadepwi', '31475528Geraldo!', 'atividadepwi');

$conn->set_charset("UTF-8");

date_default_timezone_set("America/Sao_Paulo"); // Seta a data e a hora para SP
