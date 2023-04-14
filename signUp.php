<?php 
    include_once 'header.php';
?>

<div class="container">

<div class="alert alert-danger text-center" role="alert">
  CAUTION! This site is not secure. Do not enter sensitive passwords or other information that you would otherwise use elsewhere. <br/>The signup and login have not been 100% secured.
</div>


<form action="signup-script.php" method="post" class="row g-3" novalidate>
  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Username</label>
    <input type="username" name="username" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Password</label>
    <input type="password" name="pwd" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Re-enter Password</label>
    <input type="password" name="pwdconf" class="form-control"required>
  </div>
  <div class="col-md-6">
    <label class="form-label">First Name</label>
    <input type="text" name="firstname" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Last Name</label>
    <input type="text" name="lastname" class="form-control">
  </div>
  <div class="col-md-2">
    <label class="form-label">Zip</label>
    <input type="number" name="zipcode" class="form-control" required>
  </div>
  
  <div class="col-12">
    <button class="btn btn-success">Sign Up</button>
  </div>
</form>

</div>


<?php 
    include_once 'footer.php';
?>