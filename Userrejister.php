<!DOCTYPE>
<html lang="">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRIMSON BAKERY.LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background: url(images/bg2.jpg);
                background-size: cover;
                background-position: center;
                color: rgb(255, 255, 255);
                background-color:rgb(161, 30, 56);
            }
            .grid{
                position: absolute;
                top: 150px;
                right: 50px; 
                
                 
                }

                .slideshow{
                 flex: 1;
                 height: 100%;
                  position: relative;
                 overflow: hidden;
                }

                .slideshow img{
                 position: absolute;
                 width: 1010px;
                 height: 740px;
                 object-fit: cover;
                 opacity: 0;
                 transition: opacity 1.5s ease-in-out;
                 z-index: 0;
                 
                }

                .slideshow img.active{
                 opacity: 1;
                 z-index: 1;
                }
            
            .form{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items:center;
                backdrop-filter:blur(40px);
                padding: 15px;
                border-radius: 20px;
                border-radius: 20px;
                box-shadow: 0 0 10px rgb(222, 8, 8);
                border:2px solid rgba(198, 72, 72, 0.688);
                
            
                
            }
            .login{
                display :flex;
                justify-content:center;
                align-items:center;
                font-size: 35px;
                font-weight: 900;
                color: aliceblue;
            }
            
                /* input wrappers and inputs are styled below in a consolidated block */

              /* 🔹 Common input style for all fields */
.form input {
    background: transparent;
    border: none;
    outline: none;
    color: white;
    font-size: 15px;
    width: 80%;
    height: 30px;
    padding: 0 5px;
}

input::placeholder {
    color: rgba(255, 255, 255, 0.9);
}

/* 🔹 Box style wrapper for inputs */
.username, .password, .create {
    width: 300px;
    height: 40px;
    background-color: #f3ededff; /* semi-transparent */
    border: none;
    outline: none;
    border-radius: 40px;
    color: white;
    font-size: 15px;
    display: flex;
    align-items: center;
    padding-left: 15px;
    position: relative;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.2);
}

/* 🔹 Icons inside fields */
.username i,
.password i,
.create i {
    
    position: absolute;
    right: 20px;
    font-size: 20px;
    color:  #f3ededff;
}






             
             
            .login2{
            margin-top: 20px;
            width:100%;
            height: 40px;
            text-align: center;
            border:none;
            outline:none;
            border-radius: 10px;
            cursor:pointer;
            font-size: 15px;
            color:azure;
            font-weight: 700;  
            background-color: rgb(106, 2, 23); 
                
            }
            
            
            
            .login2:hover{
                color: rgb(80, 0, 0);
                background-color: rgb(251, 245, 247);

            }
            .sign{
                display: flex;
                font-size: smaller;
                justify-content: start;
                align-items: center;
                color: aliceblue;
            }
            .forgot{
                display: flex;
                font-size: smaller;
                justify-content: end;
                align-items: center;
                color: aliceblue;
            }
            .forgot a{
                text-decoration: none;
                color: rgb(255, 255, 255);
                font-weight: bolder;
                padding-left: 5px;
            }


            .Google:hover{
                background-color: rgb(233, 233, 233);
                color: rgb(0, 0, 0);
                    border-radius: 40px;
            }
            /* place social icons below the form in normal document flow */
            .social {
                display: flex;
                justify-content: center;
                margin-top: 18px;
            }
            .social-icons {
             position: static;
             display: flex;
             gap: 15px;
             justify-content: center;
            }
            .social-icons a {
             color: white;
             font-size: 20px;
             transition: 0.3s;
             text-decoration: none;   /* remove underline */
            }
            .social-icons a:hover {
             color: #000000c4;
            }
           
            .line{
                color: aliceblue;
            }
        .logo{
            position: absolute;
            top: 0;
            right: 0;
            
        }   
        .logo img{
            width: 515px;
            height: 165px;
        }
        .sub{
            font-size: small;
            text-align: center;
        }
        .tolink {
             color:var(--white); 
             font-weight:700; 
             cursor:pointer;
              text-decoration:underline; 
              margin-left:6px; }

         


            .show { 
                display: block; }
            .hide { 
                display: none; } 
            /* removed absolute .imail; icons are placed inside input wrappers now */

.home-arrow {
            position: absolute;
            top: 5px;
            right: 465px;
            font-size: 30px;

        } 
        .home-arrow a {
            color: white;
            text-decoration: none;
        }
        .home-arrow a:hover {
            color: #ffffffc4;
            text-shadow: #ffffffc4;
        }
        /* Responsive tweaks */
        @media (max-width: 900px) {
            .grid {
                position: static;
                top: auto;
                right: auto;
                margin: 10px auto;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                padding: 0 12px;
            }

            .slideshow { display: none; }

            .form {
                width: 100%;
                max-width: 420px;
                padding: 18px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.35);
                border-radius: 14px;
                margin: 6px auto;
            }

            .username, .password, .create {
                width: 100%;
                max-width: 100%;
            }
            .form input {
                height: 44px;
                padding: 0 12px;
            }

            .logo { position: static; text-align: center; margin-bottom: 6px; }
            .logo img { width: 260px; height: auto; max-width: 80vw; }

            .home-arrow { position: fixed; top: 12px; left: 12px; right: auto; font-size: 24px; z-index: 50; }

            .social { margin-top: 12px; }
        }

        @media (max-width: 420px) {
            .login { font-size: 28px; }
            .form { padding: 12px; }
            .login2 { font-size: 14px; }
            #sign1 a, .sign a { padding: 5px 8px; }
        }
        /* specific styling for the signup/login prompt at the bottom of the form */
        #sign1 {
            justify-content: center; /* center the text and link */
            gap: 10px;
            width: 100%;
        }
        /* plain link styling (keeps existing look consistent) */
        .sign a{
            text-decoration: none;
            color: #ffffff;
            font-weight: 800;
            padding-left: 6px;
        }
        /* make the LOGIN link look like a subtle pill/button */
        #sign1 a {
            display: inline-block;
            background: transparent;
            color: #fff;
            border: none;
            
            
        }
        #sign1 a:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
            text-decoration: none;
        }

                
              
        </style>
    </head>
    <body>
        <div class="logo">
            <img src="logo.jpg" alt="logo " >
        </div>
        
        <div class="slideshow">
                     <img src="Image-03-67-e1735902573607.jpg" class ="active" >
                     
                    </div>
        <div class="grid">
            
        
    <div class="form" id="form">
    

    <div class="signupPanel" id="signupPanel">

                
                <div class="login" id="login">
            Create Account
            </div>
            <p class="sub"><pre>Join Crimson Bakery — Get Updates
                    And Manage Your Orders.</pre></p>
                    <form  id ="userrejisterform"action="./Userrejisterprocess.php" method="POST">
                <div class="create" id="Username1">
                <input  type="text" name ="firstname" id="Firstname" placeholder="First Name" required>
                </div>
                <br>
                <div class="create" id="Username2">
                <input  type="text" name ="lastname" id="Lastname" placeholder="Last Name" required>
                </div>
                <br>
                <div class="create" id="Username2">
                <input type="email" name ="email" id="Email" placeholder="Email" required>
                <i class="ri-mail-line"></i>
                </div>
                <br>
                <div class="create" id="Username2">
                <input type="tel" name="phone" id="Phone" placeholder="Phone Number" required>
                <i class="ri-phone-fill"></i>
                </div>
                <br>
                <div class="create" id="Password1">
                <input type="password" name ="password" id="Password" placeholder="Enter Password" required>
                <i class="ri-lock-password-fill"></i>
                </div>
                <div class="loginbutton" id="Loginbutton1">
                <button type="submit" name="submit" class="login2" id="login2">Register</button>
                </div>
                <br>
                <div class="sign" id="sign1">
                Already have an account?
                <b><a href="Userlogin.php" >LOGIN</a></b>
                </div>
                </form>
                <br>
                  
                  
   
            
        </div>
                    
        </div>
        </div>
        
             
        
        <div class="home-arrow"><a href="Homeloged.php"><i class="ri-arrow-left-line"></i></a></div>
        

       
    
    


    </body>
</html>