<!DOCTYPE html>

 <!-- Bootstrap -->
 {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
 <!-- Font Awesome JS -->
 <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
     integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
 </script>
 <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
 </script>

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
{{-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> --}}
{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action='{{ url('form') }}' method="POST">
  <fieldset>
    @csrf
    <div class="pull-right">
      {{-- redirect to named route with given parametre directly in view ( insted of $foo who is a get argument we can give a string as well ) --}}
      <a class="btn btn-success" href="{{ route('form.bar', [$n , 'tes' => $foo  ,'add_facultative_param' ]   ) }}" title="Create a form">  
          <i class="fas fa-plus-circle fa-lg "></i> 
           {{$foo}}  {{-- catche the $foo variable given in testcontroller who is also a parametre of get methode gven in route  --}}
          </a>
  </div>

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

  {{-- retrive data sended in a session with methode with()  (post methode)--}}
    {{-- {{ $re = session()->get('re') ; }}  --}}


  {{-- send data to route without param (just ex with post methode) --}}
    {{-- {{ dd($req['username'] ) }}   --}}

  {{-- send data to route without param (just ex with post methode) --}}
    {{-- {{ var_dump($re) }} --}}

  {{-- retrive data sended by post method directly , but just return view (not in session) --}}
  @isset($v)
  {{ dd($v) }}
  @endisset





{{--  test html shortcut : 
  
  .container>.row>.col_md_12 =
<div class="container">
  <div class="row">
    <div class="col_md_12">

      form>.form-group>label+input.form-controler =
      <form action="">
        <div class="form-group"><label for=""></label><input type="text" class="form-controler"></div>
      </form>

    </div>
  </div>
</div>

.form>.form-group>label+input.form-controler =
<div class="form">
  <div class="form-group"><label for=""></label><input type="text" class="form-controler"></div>
</div> 

--}}
