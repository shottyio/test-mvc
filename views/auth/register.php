<title>Register</title>

<div class="d-flex justify-content-center">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Login:</label>
            <input type="text" name="login" class="form-control" placeholder="Login">
            <small class="form-text text-muted">It could be your name.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
<!--            <small class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm password:</label>
            <input type="password" class="form-control" name="password_confirm" placeholder="Confirm password">
            <small class="form-text text-muted">You must enter your password again.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image:</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            Already have an account? <a href="/auth/login">Login</a>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>