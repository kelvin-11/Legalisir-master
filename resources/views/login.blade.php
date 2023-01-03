<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Login Admin | E-legalisir</title>
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
   <div class="center">
      <div class="container">
         <div class="text">
            Login Admin
         </div>
         @if(session()->has('loginError'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b>{{ session('loginError') }}</b>
         </div>
         @endif

         <form action="/login" method="post">
            @csrf
            <div class="data">
               <label for="email"><b>Email</b></labbel>
               <input type="email"  name="email" id="email" required autofocus>
            </div>
            <div class="data">
               <label for="password"><b>Password</b></label>
               <input type="password" name="password" id="password" required>
            </div>
            <div class="btn">
               <div class="inner"></div>
               <button type="submit">login</button>
            </div>
         </form>
      </div>
   </div>
</body>

</html>