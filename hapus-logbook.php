<?php
    include 'koneksi.php';
    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM logbook_harian WHERE id= '".$_GET['id']."'");
        echo '<script>window.location="index.php"</script>';
    }
?>


