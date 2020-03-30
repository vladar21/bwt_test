<h1 class="text-center"><?php echo $title ?></h1>

<form action="/home/register" method="POST">
    
    <div class="col-sm-4 col-sm-offset-4">
        <?php if (isset($message)){
            echo '<div class="alert alert-danger">'.$message.'</div>';
        } ?>

        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?=@$_POST['fname']?>" >
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?=@$_POST['lname']?>" >
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=@$_POST['email']?>" >
        </div>

        <div class="form-group col-sm-offset-2">
            <div class="col-xs-3">
                <label for="gender">Gender:</label>
            </div>
            <div class="col-xs-3">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male"  <?=(@$_POST['gender'])?(((@$_POST['gender']) == 'male')?'checked':''):'' ?> > male
                </label>
            </div>
            <div class="col-xs-3">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="female" <?=(@$_POST['gender'])?(((@$_POST['gender']) == 'female')?'checked':''):'' ?> > female
                </label>
            </div>
            <br>
        </div>

        <div class="form-group"> <!-- Date input -->
            <label class="control-label" for="date">Birthday</label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="<?=@$_POST['date']?>" />
        </div>
       
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-5">
                <input type="submit" class="btn btn-primary" value="Register">                
            </div>
        </div>
       
    </div>
    
</form>


