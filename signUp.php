<?php 
    include_once 'header.php';
?>

<div class="container">

<div class="alert alert-danger text-center" role="alert">
  CAUTION! This site is not secure. Do not enter sensitive passwords or other information that you would otherwise use elsewhere. <br/>The signup and login have not been 100% secured.
</div>


<form action="includes/signup.inc.php" method="post"class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="username" class="form-control" id="inputUsername" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword1" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword2" class="form-label">Re-enter Password</label>
    <input type="password" class="form-control" id="inputPassword2" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="firstName" class="form-control" id="inputFirstName" required>
  </div>
  <div class="col-md-6">
    <label for="inputLastName" class="form-label">Last Name</label>
    <input type="lastName" class="form-control" id="inputLastName">
  </div>
    <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip" required>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-success">Sign Up</button>
  </div>
</form>

</div>


<?php 
    include_once 'footer.php';
?>