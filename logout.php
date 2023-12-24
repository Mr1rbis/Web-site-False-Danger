<?php
    include("bd/bd.php");
?>
<?php if(isset($_SESSION['user'] ) ): ?>
<?php 
    unset($_SESSION['user']);
    unset($_SESSION['auth']);
    unset($_SESSION['city']);
    header('Location: / ');
    ?>
<?php else : ?>
    <?php header('Location: / ');?>
<?php endif; ?>