<?php 
require_once("includes/init.php");

?>
<h5><?= $fullname ?></h5>
<p>Current earnings: &#8358; <?= $user->totalUnpaid($uid) ?></p>