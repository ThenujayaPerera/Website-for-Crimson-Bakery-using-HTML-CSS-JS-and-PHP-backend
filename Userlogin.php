<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRIMSON BAKERY.LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
                
            }
           .google{
                display:flex;
                width: 330px;
                justify-content: center;
                align-items: center;
                
                font-weight: bolder;
                
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(200, 9, 9, 0.592);
                cursor: pointer;
                border: none;
                font-size: 15px;
                font-family: 'Poppins', sans-serif;
                



            }
           
                

    

            .username{
            width: 300px;
            height: 50px;
            background-color: #f3ededff;
            border:none;
            outline:none;
            border-radius: 40px;
            color: rgba(255, 255, 255, 0.74);
            font-size: 15px;
            padding:0px 0px 0px 20px;
                

             }
             .create{
            width: 300px;
            height: 40px;
            background-color:  #f3ededff;
            border:none;
            outline:none;
            border-radius: 40px;
            
            font-size: 15px;
            padding:0px 0px 0px 20px;

             }
             .create input{
                background: transparent;
                border: none;
                outline: none;
                
                font-size: 15px;
                width: 200px;
                height: 50px;
             }
             

            
             
             .username input{
                
                border: none;
                outline: none;
                background-color:  #f3ededff;
                font-size: 15px;
                width: 200px;
                height: 50px;
             }
             .username i{
                position: absolute;
                font-size: 20px;
                right: 30px;
                top: 175px;
                background-color: transparent;
             }
             .password i{
                position: absolute;
                font-size: 20px;
                right: 30px;
                top: 240px;
             }
            .password{
                display: flex;
                flex-direction: column;
                width: 300px;
                font-weight: bolder;
                font-size: 15px;
                background-color:  #f3ededff;
                border-radius: 40px; 
                color: rgba(255, 255, 255, 0.8);  
                padding:0px 0px 0px 20px;
                border:none;
                outline:none;


            }
            .password input{
                background: white;
                border: none;
                outline: none;
                color: white;
                font-size: 15px;
                width: 200px;
                height: 50px;
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
            .sign a{
                text-decoration: none;
                color:  #f3ededff;
                font-weight: bolder;
                padding-left: 5px;
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
            .social-icons {
             position: absolute;
             bottom: 10px;
             right: 20px;
            display: flex;
             gap: 15px;
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
           /* .social{
                position: absolute;
                bottom: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
                color: white;
                width: 518px;
                height: 50px;

            }*/
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
            
         #signupPanel { display: none; }


            .show { 
                display: block; }
            .hide { 
                display: none; } 
            .imail{
                position: absolute;
                font-size: 20px;
                right: 45px;
                top: 200px;
            } 
        .home-arrow {
            position: absolute;
            top: 5px;
            right: 483px;
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
        #Firstname, #Lastname, #Email, #Phone, #Password {
            margin-bottom: 10px;
            color: black;
            background-color:  #f3ededff;
        }


                
              
        </style>
    </head>
    <body>
        <div class="logo">
            <img src="logo.jpg" alt="logo " >
        </div>
        
        <div class="slideshow">
                     <img src="Image-03-67-e1735902573607.jpg" class="active">
                     <img src="pexels-changerstudio-140831.jpg">
                     <img src="pexels-artofxx-325140257-32213378.jpg">
                     <img src="pexels-ryan-thomas-307183342-32845421.jpg">
                    </div>
        <div class="grid">
            
        
    <div class="form" id="form">
        <div class="loginPanel" id="loginPanel">
            
                <div class="login" id="login">
            Welcome back
            </div>
            <p class="sub">Sign in to manage orders & view recipes.</p>
               <!-- <div class="google" id="Google">
                <button class="Google" id="Google" alt="Google"><img src="Google-Logo-PNG-Image.png" alt="Google Logo" width="30"><pre> Sign in with Google</pre></button>
                </div> -->
                <br>
                <div class="line">
                <hr>
                </div>
                <br>
                <form method="POST" action="Userloginprocess.php">
                <div class="username" id="Username">

                
                <input  type="text" name ="Email" id="Email" placeholder=" Email" required>
                <i class="ri-user-fill"></i>    
                
                </div>
                <br>
                <div class="password" id="Password">
                
                <input type="password" name ="password" id="Password" placeholder="Password" required>
                <i class="ri-lock-password-fill"></i>
                
                </div>
                <br>
                <div class="loginbutton" id="Loginbutton">
                <button type="submit" name="login-button" class="login2" id="login2">Log In</button>
                </div>

                <br>
                <div class="sign" id="sign">
                Don't have an account?
                <span class ="tolink" id ="toSignup"><b>Sign Up</b></span>
                </div>
                <br>
                <div class="forgot" id="Forgot">
                Forgot Password?
                <a href="FORGOT.html"><i class="ri-mail-send-fill"></i>Send Email</a>
                </div>  
                </form>
                
        </div>            

    <div class="signupPanel" id="signupPanel">

                
                <div class="login" id="login">
            Create Account
            </div>
            <p class="sub"><pre>Join Crimson Bakery — get updates
                    And manage your orders.</pre></p>
                    <form  id ="userrejisterform" action="./Userrejisterprocess.php" method="POST">
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
                <button type="submit" name="submit" class="login2" id="login2">SIGN UP</button>
                </div>
                <br>
                <div class="sign" id="sign1">
                Already have an account?
                <span class ="tolink" id ="toLogin"><b>Log In</b></span>
                </div>
                </form>
                <br>
                  
                  
   
            
        </div>
                    
        </div>
        </div>
        <div class="social">
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="ri-facebook-box-fill"></i></a>
                 <a href="https://instagram.com" target="_blank"><i class="ri-instagram-line"></i></a>
                 <a href="https://wa.me/1234567890" target="_blank"><i class="ri-whatsapp-line"></i></a>
                </div>
            </div>

        <div class="home-arrow"><a href="Homeloged.php"><i class="ri-arrow-left-line"></i></a></div>
             
        
        
        

        <script>
    const slides = document.querySelectorAll(".slideshow img");
    let index = 0;

    setInterval(() => {
      slides[index].classList.remove("active");
      index = (index + 1) % slides.length;
      slides[index].classList.add("active");
    }, 4000);

   
const loginPanel = document.getElementById('loginPanel');
const signupPanel = document.getElementById('signupPanel');
const toSignup = document.getElementById('toSignup'); 
const toLogin = document.getElementById('toLogin');   

toSignup.addEventListener('click', () => {
    loginPanel.style.display = 'none';
    signupPanel.style.display = 'block';
});

toLogin.addEventListener('click', () => {
    signupPanel.style.display = 'none';
    loginPanel.style.display = 'block';
});
    </script>
    
    


    </body>
</html>