<h1 class="text-center"><?php echo $title ?></h1>

<form action="/home/savecomment" method="POST">
    
    <div class="col-sm-4 col-sm-offset-4">
		<?php if (isset($message)){
            echo '<div class="alert alert-danger">'.$message.'</div>';
        } ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=@$_POST['name']?>" >
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=@$_POST['email']?>" >
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <input type="text" class="form-control" id="message" name="message" value="<?=@$_POST['message']?>">
        </div>        
       
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-5">
                <input type="submit" class="btn btn-primary" value="Comment">                
            </div>
        </div>
       
    </div>
    
</form>


