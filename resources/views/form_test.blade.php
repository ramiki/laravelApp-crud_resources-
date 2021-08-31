<!DOCTYPE html>


<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Data Record 'CRUD'</legend>
    </div>
    <div class="control-group">
      <!-- name -->
      <label class="control-label"  for="username">Name</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        <p class="help-block">Full Name </p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="Age">Age</label>
      <div class="controls">
        <input type="text" id="Age" name="Age" placeholder="" class="input-xlarge">
        <p class="help-block">Age should be number</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Age -->
      <label class="control-label"  for="Note">Note</label>
      <div class="controls">
        <input type="text" id="Note" name="Note" placeholder="" class="input-xlarge">
        <p class="help-block">Your Note Her</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Send</button>
      </div>
    </div>
  </fieldset>
</form>

</form>