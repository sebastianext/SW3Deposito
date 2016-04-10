<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {!!Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <!-- ***************************Files Css*********************************** -->

  {!!Html::style('favicon.ico')!!}
  {{-- <link rel="shortcut icon" href="favicon.ico"> --}}
  {!!Html::style('css/main.css')!!}
  <!-- <link href="css/main.css" rel="stylesheet"> -->
  {!!Html::style('https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css')!!}
 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>-->
  {!!Html::style('css/semantic.min.css')!!}
  <!-- <link href="css/semantic.min.css" rel="stylesheet"> -->
  
 <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>

 
  

</head>

<body>
   
   <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue image header">
      <i class="lock icon"></i>
      <div class="content">
        Log-in to your account
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large blue submit button">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
       <a href="#">He olvidado mi contraseña</a>
    </div>
  </div>
</div>

       <!--  <div class="ui grid">
          <div class="one  column"></div>


            <div class="fourteen wide column centrar">
            <div class="ui raised very padded text container segment">
              <h2 class="ui header">Dogs Roles with Humans</h2>
              
                                <div class="ui left huge icon input">
                                  <input type="text" placeholder="Search users...">
                                  <i class="users icon"></i>
                                </div>
                                <div class="ui hidden divider"></div>
                                <div class="ui left huge icon input">
                                  <input type="text" placeholder="Search users...">
                                  <i class="users icon"></i>
                                </div>
            </div>
                
               
            </div>
   
          <div class="one  column"></div>
        </div> -->
            

            <!-- ***************************Files Javascript*********************************** -->
  {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>-->
  {!!Html::script('js/semantic.min.js')!!}
  {!!Html::script('https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js')!!}
  <!--<script src="js/semantic.min.js"></script>-->
  {!!Html::script('js/main.js')!!}
  <!--<script src="js/main.js"></script>-->
   <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</body>
</html>
