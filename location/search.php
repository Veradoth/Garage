<?php
if(isset($_GET['search']) AND !empty($_GET['search']))
{
    $search = htmlspecialchars($_GET['search']);
}
?>