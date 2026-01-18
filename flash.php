<?php
if (isset($_SESSION['flash_success'])) {
    echo "<div class='flash-success'>".$_SESSION['flash_success']."</div>";
    unset($_SESSION['flash_success']);
}

if (isset($_SESSION['flash_error'])) {
    echo "<div class='flash-error'>".$_SESSION['flash_error']."</div>";
    unset($_SESSION['flash_error']);
}
?>
