//  scr size ajustments and funcionaliy for main js functions
 function four50px(){ document.getElementById('navBar').style.display = 'none' ;
    document.getElementById('right-side-active').style.margin = "54% auto auto auto"; 
    
    document.getElementById('right-side-active').style.height = "45%"; 
    document.getElementById('right-side-active').style.width = "89%";

    document.getElementById("title").innerHTML = ("Thanks for subscribing!")
    document.getElementById("parag").innerHTML = ("You have successfully subscribed to our email listing. Check your email for the discount code.")
    
    document.getElementById('form').style.display = 'none' ;
    document.getElementById('icon-ic_success').style.display = 'inline';
    document.getElementById('icon-ic_success').style.margin = '-5% 0% 2%';

    document.getElementById('right-side').style.padding = "66px 0px 0px 0px";
    document.getElementById('active-windows').style.margin = "7% 0% -25%";
    document.getElementById('text').style.margin = "15px 0px 0px 0px";
 };

 function OneKpix(){
    document.getElementById('right-side-active').style.margin = "29% auto auto auto"; 
    document.getElementById('navBar').style.display = 'none' ;

    document.getElementById('right-side-active').style.height = "45%"; 
    document.getElementById('right-side-active').style.width = "89%";

    document.getElementById("title").innerHTML = ("Thanks for subscribing!")
    document.getElementById("parag").innerHTML = ("You have successfully subscribed to our email listing. Check your email for the discount code.")
    
    document.getElementById('form').style.display = 'none' ;

    document.getElementById('icon-ic_success').style.display = 'inline';
    document.getElementById('icon-ic_success').style.margin = '-5% 0% 2%';

    document.getElementById('right-side').style.padding = "66px 0px 0px 0px";
    document.getElementById('active-windows').style.margin = "7% 0% -25%";
    document.getElementById('text').style.margin = "15px 0px 0px 0px";

 };
 
 
 function bigScr(){
    document.getElementById("title").innerHTML = ("Thanks for subscribing!")
    document.getElementById("parag").innerHTML = ("You have successfully subscribed to our email listing. Check your email for the discount code.")
    
    document.getElementById('form').style.display = 'none' ;
    document.getElementById('icon-ic_success').style.display = 'inline';
    document.getElementById('main-wrap').style.height = '81%';
    
    document.getElementById('right-side').style.height = '0%';
    document.getElementById('active-windows').style.margin = "36% 0% -25% ";
    document.getElementById('text').style.margin = "15px 0px 0px 0px";
};
 
 
 //LAI STRADATU ENTER OPCIJA
$(document).ready(function () {
    $('#email-inp').keyup(function(event) {
        var key = (event.keyCode ? event.keyCode : event.which);
        if (key == 13)  {
            return submit();
        
        }
    });
});

$("#form").submit(function() {

    var rejectList = [ "co" ];
    var emailValue = $('#email-inp').val(); 
    var splitArray = emailValue.split('.'); 
    var atposition=emailValue.indexOf("@");  
    var dotposition=emailValue.lastIndexOf(".");                   

    if (!document.getElementById('checkbox').checked) {

        alert('You must accept the terms and conditions');
        return false;
        }
        else if(emailValue==null || emailValue==""){ 
        document.getElementById("error").innerHTML = ("Email address is required") 
        return false; 
        }
        else if (atposition<1 || dotposition<atposition+2|| dotposition+2>=emailValue.length){ 
        document.getElementById("error").innerHTML = (" Please provide a valid e-mail address") 
        return false;  
        }  
        if(rejectList.indexOf(splitArray[1]) >= 0){
        document.getElementById("error").innerHTML = ("We are not accepting subscriptions from Colombia emails") 
        return false;  
        }
        $.ajax({
            method: "POST",
        //  url: '../app/views/Register.php',

        // url is comented out because it prevents web 
        // page form submiting - atleast: submittion function do not work
            
            data: $("#form"),
            success: 
                function () { 
                // javascript funtion and ajustments for screen sizes
                if(window.matchMedia('(max-width: 450px)').matches){
                    four50px();
                }else if (window.matchMedia('(max-width: 1000px)').matches){
                    OneKpix();
                }else{      
                    bigScr();
                }
            }    
        }); 
});

// for sucess page(onload runs this script)
function successfully() {
window.onload = function () {
    if(window.matchMedia('(max-width: 450px)').matches){
            four50px();
        }else if (window.matchMedia('(max-width: 1000px)').matches){
            OneKpix();
        }else{      
            bigScr();           
        }
    };
}