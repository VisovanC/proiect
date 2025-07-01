<?php include "includes/header.php" ?>
<?php
session_start();
session_unset();
session_destroy();
echo "<script> clearCart(); </script>"; 
?>