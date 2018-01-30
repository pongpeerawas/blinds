<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class login extends CI_Controller {
      //functions
      function index()
      {
        $contents['cart_session'] = $this->session->userdata('cart_session');

        $template['content']    = $this->load->view('fontEnd/login',$contents,TRUE);

       $this->load->view('fontEnd/Template/Header');
       $this->load->view('fontEnd/Template/Sidebar',$template);
       $this->load->view('fontEnd/Template/Footer');
           // $this->load->view("fontEnd/Template/Header");
           // $this->load->view("fontEnd/login");
           // $this->load->view("fontEnd/Template/Footer");

      }
      function login_validation()
      {
           $this->load->library('form_validation');
           $this->form_validation->set_rules('username', 'ชื่อเข้าใช้', 'required');
           $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');

           if($this->form_validation->run())
           {
                //true
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                //model function
                $this->load->model('loginModel');
                
                if($this->loginModel->can_login($username, $password))
                {
                     $session_data = array(
                          'username'     =>     $username

                     );
                     $this->session->set_userdata($session_data);
                     redirect('fontEnd/login/enter');
                }
                else
                {
                     $this->session->set_flashdata('error', 'Invalid Username and Password');
                     redirect('fontEnd/login/index');
                }
           }
           else
           {
                //false
                $this->index();
           }
      }
      function enter(){
           if($this->session->userdata('username') != '')
           {

         			 echo '<a href= "<?php echo base_url();?>index.php/fontEnd/login/logout">Logout</a> ';


              redirect('Home');




           }
           else
           {
                redirect('fontEnd/login');
           }
      }
      function logout()
      {
           $this->session->unset_userdata('username');
           redirect('fontEnd/login/index');
      }
 }
