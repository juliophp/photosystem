    <?php
    include 'includes/functions.php';
    
    if(!isset($_SESSION["username"]))
    header("location:login.php");



    
    include '/includes/footer.php';
    ?>