
 <!DOCTYPE html>

 <html lang="ja">
 <head>
     <meta charset="UTF-8">
     <title>Document</title>
     <link rel="stylesheet" href="login.sample.css">
 </head>

 <body>

    
    <form class="login">
      <fieldset>
       <legend class="legend">Login</legend>
          <div class="input">
             <input type="email" placeholder="Email" required />
             <span><i class="fa fa-envelope-o"></i></span>
          </div>
    <div class="input">
      <input type="password" placeholder="Password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
    
  </fieldset>
  
  <div class="feedback">
  	login successful <br />
    redirecting...
  </div>
  
</form>
     
<script src="login.sample.js"></script>
 </body>

 </html>

 
 
 