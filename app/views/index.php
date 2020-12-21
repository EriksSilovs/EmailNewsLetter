<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
 

</head>
<body>
    
        <div class="img-background">  
        </div>
        <div id="right-side" class="right-side-navBar">            
            <div class="navBar" id="navBar">
               

                <div class="logo showOnMob"> <img src="<?php echo URLROOT ?>/public/img/logo_pineapple.svg" alt=""> </div>
                <div class="logo hideOnMob"> <span class="icon-logo_pineapple"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span></span> </div>
                <div class="links">
                    <ul>
                        <li><a href="<?php echo URLROOT; ?>/posts/index"> About</a></li>
                        <li><a  href="<?php echo URLROOT; ?>/posts/index"> How it works</a></li>
                        <li><a  href="<?php echo URLROOT; ?>/posts/index"> Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-side" id="right-side-active">
            <div  class="main-wrapper" id="main-wrap">
                <div id="active-windows" class="active-window">
                    <span id="icon-ic_success" class="icon-ic_success"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span>
                        <div id="text" class="text">
                          
                            
                            <h1 id="title">Subscribe to newsletter</h1>
                            <p id="parag"  >Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
                        </div>
                       
                        <form   method="POST"   action="<?php echo URLROOT; ?>/register/index"    name="form"   id="form" >
                            <div id="email" >
                                <input type="text" name="email" id="email-inp" placeholder="Type your email address here…" > 
                                <button id="clicks" name="submit" type="submit"  onsubmit="submit(); "    ></button>
                            </div>
                            <div class="checkbox-div">
                                <input type="checkbox"  name="checkbox" placeholder="" id="checkbox"> <p>    I agree to <a class="terms" href="#" >terms of service</a> </p>
                            </div>
                        </form>
                   
                </div>
         <br> 
               <div class="error" id="error">
                    <span>
                        <?php echo $data['emailError']; ?>
                    </span>
                </div>
       
       
  

               
                <div class="soc-icons">
                    <ul>
                        <li id="showF"><a href="#">  <span class="icon-Facebook"><span class="path1"></span><span class="path2"></span></span> </a></li>
                        <li id="showI"><a href="#"> <span class="icon-Instagram"><span class="path1"></span><span class="path2"></span></span> </a></li>
                        <li id="showT" ><a  href="#"> <span class="icon-Twitter"><span class="path1"></span><span class="path2"></span></span> </a></li>
                        <li id="showY"><a href="#"> <span class="icon-Youtube"><span class="path1"></span><span class="path2"></span></span> </a></li>

                    </ul>
                </div>
                
            </div>
        </div>
        

       
        <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/main.js"> </script>
   
     
</body>
</html>