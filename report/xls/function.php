<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 22:45
 */

function ext($file)
{
    $ext = pathinfo($file);
    return $ext['extension'];
}
?>