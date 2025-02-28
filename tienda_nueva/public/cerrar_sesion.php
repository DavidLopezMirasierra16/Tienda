<?php
    session_start();
    session_destroy();
    header("Location: index.php");
?>
<script>
    localStorage.removeItem("Token");
</script>