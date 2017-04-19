<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
		
	}
        
        public 
          function register(){
      
     if (isset($_POST['RegForm'])&& ($_POST['RegForm']=='Register')) { //form submitted
            $config = array(
                array('field' => 'fname', 'label' => 'الاسم الأول', 'rules' => 'trim|required|min_length[2]'),
                array('field' => 'lname', 'label' => 'اسم العائله', 'rules' => 'trim|required|min_length[2]'),
                array('field' => 'email', 'label' => 'الايميل', 'rules' => 'trim|required|is_unique[applicant.email]|valid_email'),
                array('field' => 'pass', 'label' => 'كلمة السر', 'rules' => 'trim|required|min_length[5]'),
                array('field' => 'confpass', 'label' => ' تأكيد كلمة السر', 'rules' => 'trim|required|matches[password]'),
            );
            //validate form inputs
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {//if validation errors found
                $this->mViewData['form_error'] = validation_errors();;
               // $this->render("home");
            } else {//if validation is successful
                var_dump($_POST['RegForm']);
                echo '<hr>';
                $new_applicant = new Applicant_m();
                var_dump($new_applicant);die;
                //prepare new_user record
                $new_applicant->password = encryptOstaz($this->input->post('pass', true), ENCRYPTION_KEY);
                $new_applicant->email = $this->input->post('email', true);
                $new_applicant->first_name = $this->input->post('fname', true) ? ($this->input->post('firstName', true)) : null;
                $new_applicant->last_name = ($this->input->post('lname', true)) ? ($this->input->post('lastName', true)) : null;
            }
     }
     // $this->render('home');
          }
          
          public 
                   function login(){
              
                   }
}