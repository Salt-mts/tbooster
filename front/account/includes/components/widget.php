<?php 
require_once("includes/init.php");

?>
<h5 class="text-light"><?= $fullname ?></h5>
<p class="text-light">Current earnings: &#8358; <?= number_format($user->totalUnpaid($uid),2) ?></p>