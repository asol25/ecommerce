<?php include_once 'header.php'; ?>

<body>

    <!-- Header Section End -->
    <?php include_once 'nav.php'; ?>
  
    <?php
    $configRouteInfoLayoutUsers = in_array($_SERVER['REQUEST_URI'], array_keys($LAYOUT_USERS));
    if($configRouteInfoLayoutUsers === true) {
        $configRouteInfoLayoutUsers= $LAYOUT_USERS[$_SERVER['REQUEST_URI']];
    }

    include_once "$configRouteInfoLayoutUsers";
    ?>

    <?php
    include_once 'footer.php';
    ?>
</body>

</html>