<?php

class Register extends Controller {
    public function __construct() {
        $this->emailModel = $this->model('email');
    }

    public function index() {
        $data = [
            'title' => 'Home page',
            'email' => '',
            'checkbox' => '',
            'checkboxError' => '',
            'emailError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'email' => trim($_POST['email']),
                'checkbox' => '',
                'emailError' => '',
                'checkboxError' => ''
            ];

            $email = [ trim($_POST['email']) ];

            if(empty($data['email'])) {
                $data['emailError'] = 'Email address is required”Please provide a valid e-mail address';

            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please provide a valid e-mail address';

            } elseif 
           
            (!isset($_POST['checkbox'])) {
                $data['emailError'] = '<script>alert("You must accept the terms and conditions")</script>';
                
                }else {
    // .co filtration, but to save funcionality(made so ".com" can  be submitted: 
    // made sucess functionality in this method )
    // if entered domain end =  $alowed_hostnames => submit to model else filter for ".co"
                    
                $alowed_hostnames = array("com", "co.","coq","cow","coe","cor","cot","coy","cou","coi","coo","cop","coa","cos","cod","cof","cog","coh","coj","cok","col","coz","cox","coc","cov","cob","con"); 
                $denied_hostnames = array("co", "co");
            
                    foreach ($denied_hostnames as $hn)
                    
                    {   foreach ($alowed_hostnames  as $ha)
                        
                        if (strstr($_POST['email'], "." . $ha))
                        {   
                        // this errors = because later it can be submitted 2x because erors are empty (function there)
                        // and here is submition done 
                            $data['emailError'] = " ";
                            $data1['emailError1'] = " ";
                            {
                            
                            if (($data1['emailError1']) ) {
                                if ($this->emailModel->addPost($data)) {
                                    // header('location: ' . URLROOT . '/index'); 
                                    // view here to show success message 
                                    $this->view('success', $data);
                                    die; // die to avoid double submission
                                } else {
                                    die("Something went wrong, please try again!");
                                }
                            } else {
                                $this->view('index', $data);{
                                    die;
                                }
                            }
                            }
                        }else if (strstr($_POST['email'], "." . $hn))
                        {
                            $data['emailError'] = 'We are not accepting subscriptions from Colombia
                            emails';
                        }
                    } 
            }
          
            if (empty($data['emailError']) ) {
                if ($this->emailModel->addPost($data)) {
                    // header('location: ' . URLROOT . '/index');
                    // view here to show success message 
                    $this->view('success', $data);
          
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('success', $data);
            }
        }
        $this->view('index', $data);
    }
}




       