<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
	// 	$this->output->enable_profiler(TRUE);
		$this->load->model('User');	
	}

	public function index() {
		$this->load->view('/index');
	}

	public function register() {
		$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Name', 'required');
    	$this->form_validation->set_rules('alias', 'Alias', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[confirm_password]');
    	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
    	$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');

		if ($this->form_validation->run()==FALSE) {
      		$this->view_data['errors'] = validation_errors();
      		$this->session->set_flashdata('error', $this->view_data['errors']);
      		redirect('/main/index');

      	} else {	

		$user_info = array(
	        'name' => $this->input->post('name'),
	        'alias' => $this->input->post('alias'),
	        'email' => $this->input->post('email'),
	        'password' => md5($this->input->post('password')),
	        'date_of_birth' => $this->input->post('date_of_birth')
	        );
      	// var_dump('register',$user_info); die();
		// $user_info = result_object($user_info);
      	$this->User->add_user($user_info);
      	$login = $this->User->login($user_info['email']);
      	// var_dump('login',$login); die();
	    $user = array(
	        'user_id' => $login['id'],
	        'name' => $login['name'],
	        'alias' => $login['alias'],
	        'is_logged_in' => TRUE
	        );
      	$this->session->set_userdata('user', $user);
      	// var_dump('register',$user); die();
      	redirect('/main/users_profiles');
		} 
	}

	public function login() {
		$email = $this->input->post('email');
  		$password = md5($this->input->post('password'));
  		$login = $this->User->login($email);
			// var_dump('email', $email);
			// var_dump('password', $password);
			// var_dump('login', $login); die();
  		
  		if($login && $login['password'] == $password) {
    	$user = array(
	        'user_id' => $login['id'],
	        'name' => $login['name'],
	        'email' => $login['email'],
	        'is_logged_in' => true
	        );

    	$this->session->set_userdata('user', $user);
    	// var_dump($all_users); die();
    	redirect('/main/users_profiles');

		} else {
		    $this->session->set_flashdata('error', 'invalid credentials');
		    redirect('/main/index');
		 }
/////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
// REMOVE, USING TO TEST INDEX TO LOGIN PAGE, WORKING!!!!
		// $user = array(
	 //        'email' => $this->input->post('email'),
	 //        'password' => $this->input->post('password')
	 //        );
	        
  //   	$this->session->set_userdata('user', $user);
  //   	redirect('/main/users_profiles');
/////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
	}

	public function users_profiles() {
	    $user = $this->session->userdata('user');
	    $all_users = $this->User->get_all($user);
	    // var_dump('users profile', $all_users); die(); all data here!!!!
	    // var_dump('users profile', $user); die(); working!!!!
	    $this->load->view('/login', array('user' => $user, 'all_users' => $all_users));
  	}

  	public function delete ($id) {
  		$this->User->delete($id);
  		redirect('/main/users_profiles');
  	}


	public function reset() {
		$this->session->sess_destroy();
		redirect("/main/index");	
	}
}

?>
