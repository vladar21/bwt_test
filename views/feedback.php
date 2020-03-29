<h1 class="text-center"><?php echo $title ?></h1>

<form action="/feedback" method="POST">
    
    <div class="col-sm-4 col-sm-offset-4">

        <div class="form-group">
            <label for="fname">Name:</label>
            <input type="text" class="form-control" id="fname" name="fname">
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <input type="text" class="form-control" id="message" name="message">
        </div>        
       
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-5">
                <input type="submit" class="btn btn-primary" value="Register">                
            </div>
        </div>
       
    </div>
    
</form>


