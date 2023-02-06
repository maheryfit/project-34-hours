<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data using Code Igniter</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
</head>
<body>
    <div class="container"> 
        <br/>
        <h3 style="align-self: center"> Insert data using CodeIgniter </h3>
        <br/>
        <!-- Code igniter -->
        <?php 
            echo "L'auteur est " . $user_info['auteur'];
        ?>
        <br/>
        <?php 
            echo $donneesdepuisbase;
        ?>

        <form action="<?php echo base_url(); ?>main/form_validation">
            <div class="form-group">
                <label>Enter first Name </label>
                <input type="text" name="fisrt_name" class="form-contorl">
            </div>
            <div class="form-group">
                <label>Enter last Name </label>
                <input type="text" name="last_name" class="form-contorl">
            </div>
            <div class="form-group">
                <label>Enter last Name </label>
                <input type="submit" name="insert" value="Insert" class="btn btn-info">
            </div>
        </form>
    </div>
</body>
</html>