<!DOCTYPE html>
<html lang="en">
<head>
 <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        NAME: <input type="text" placeholder="Enter your name" name="sName"><br><br>
        E-MAIL: <input type="text" placeholder="Enter your email" name="E-mail"> <br><br>
        WEBSITE:<input type="text" placeholder="Enter your Website" name="Website"><br><br><br><br>
        Comment:<input type="text" placeholder="Enter your Comment" name="comment"><br><br>
        Gender:
        <input type="radio" >Male 
        <input type="radio">Female
        <input type="radio">others <br><br>
        <input type="submit" name="save"><br><br>     
    </form>
    <?php
        if(isset($_POST['save']))
        {
            echo $_POST['E-mail'];
            echo $_POST['sName'];
            echo $_POST['Website'];
            echo $_POST['comment'];
        }
    ?> 
</body>
</html>