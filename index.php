

<?php include ("vue/include/debutPage.inc.php"); ?>

<?php
$current_dir = getcwd();
$current_dir = str_replace("\\", "/", $current_dir);

echo $current_dir;
?>

<?php include ("vue/include/finPage.inc.php"); ?>
