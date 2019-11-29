<?php

function anti_inject_text($parametro)
{
$parametro = strip_tags(htmlentities(trim($parametro)));
$parametro = mysqli_real_escape_string($parametro);
return $parametro;
}
#funçao para proteger campo de Senha L2J.
function anti_inject_senha($sql)
{
$sql = strip_tags(htmlentities(trim($sql)));
$sql = mysql_real_escape_string($sql);
$sql = base64_encode(pack("H*", sha1($sql)));
return $sql;
}
?>