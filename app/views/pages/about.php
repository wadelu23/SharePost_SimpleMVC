<?php
    require_once APPROOT . '/views/inc/header.php';
?>



        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo $data['description']; ?></p>
        <p>Version:<?php echo APPVERSION; ?></p>



<?php
    require_once APPROOT . '/views/inc/footer.php';
?>