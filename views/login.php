<h1 class="text-center"><?php echo $title ?></h1>

<form action="/home/log" method="POST">
    
    <div class="col-sm-4 col-sm-offset-4">
        <?php if (isset($message)){
            echo '<div class="alert alert-danger">'.$message.'</div>';
        } ?>
        

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>       

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-5">
                <input type="submit" class="btn btn-primary" value="Login">                
            </div>
        </div>

        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    </div>
</form>