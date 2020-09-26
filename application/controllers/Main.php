<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	// home page**********************************************************************************
	public function index()
	{	
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'main/login');
		}
		$data['title']="Barbarian Nation";
		$this->load->view('include/header',$data);
		$this->load->view('home');
		$this->load->view('include/footer');
	}
	// login option*******************************************************************************
	public function login()
	{
		if($this->session->userdata('logged_in')!='')
		{
			redirect(base_url().'main/index');
		}
		$data['title']="Login page";
		$data['error']= $this->session->flashdata('error');
		$data['success']= $this->session->flashdata('success');
		$this->load->view('include/header',$data);
		$this->load->view('login');
		$this->load->view('include/footer');
	}
	// login validation***************************************************************************
	public function logininsart()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==false)
		{
			redirect('Main/login');
		}
		else
		{
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$this->load->model('ModelLogin');
			$result = $this->ModelLogin->login($user);

				foreach ($result as $data)
				{
					$password = $data->password;
					$id = $data->id;
				}

				if ($pass === $password)
				{	
					// $data = array
					// (
					// 	'id' => $id,
					// 	'loged_in' => true,
					// 	'role' => $role
						
					// );
					// correction*******************************************************
					$this->session->set_userdata(['id'=>$id,'logged_in'=>true]);
					
					$this->session->set_flashdata('success','Login Successfully');
					redirect('Main/index');
					

					// $this->session->set_userdata($data);
					// redirect('Main/profile');
				}
				else
				{
					$this->session->set_flashdata('error', "Please Try Again");
					redirect('Main/login');
				}
		}
	}
	// load creat.php...........................................................
	public function creataccount()
	{	
		$data['success']= $this->session->flashdata('success');
		$data['error']= $this->session->flashdata('error');
		$data['title']="Creat Account";
		$this->load->view('include/header',$data);
		$this->load->view('creat');
		$this->load->view('include/footer');
	}

	// create account validation insert in database...................................................
	
	public function creataccount_val()
	{

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('mobile', 'mobile', 'required');
		
		if ($this->form_validation->run() == false) 
		{
			redirect('main/creataccount');
		}
		else
		{
			if (!empty($_FILES['photo']['name'])) 
            {   
                $path = $_FILES['photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 10240;
                $config['max_width']            = 16000;
                $config['max_height']           = 12000;
                $config['file_name']            = $image_name;  
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo'))
                {                	
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);  
                   redirect('main/creataccount');
                }
                else
                {
            	
              		$data = array(
						'username' => $this->input->post('username'),
						'email'=> $this->input->post('email'),
						'country' => $this->input->post('country'),
						'address' => $this->input->post('address'),
						'mobile' => $this->input->post('mobile'),
						'password' =>md5($this->input->post('password')),
						//you forgot to assign image property here
						'photo' => $image_name
					);
                    $this->load->model('ModelLogin');
                   
                    if($this->ModelLogin->account_ins($data) == true)
                    {

                        $this->session->set_flashdata('success','Account Created'); 
                        redirect('main/login');
                        
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', '!please try again'); 
                        redirect('main/creataccount');
                    }
                }
            }
            else
            {          
                $this->session->set_flashdata('error', 'Please select an image.'); 
                redirect('main/creataccount');
            }   
        }		
	}
	// retrive data in profile---------------------------------------------------------------
	public function profile()
	{	
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'main/login');
		}

		$this->load->model('ModelLogin');

		$data['title']="Your Profile";

		$user_id = $this->session->userdata('id');
		$data['result']=$this->ModelLogin->profile_retrive($user_id);

		$this->load->view('include/header',$data);
		$this->load->view('profile');
		$this->load->view('include/footer');
	}
	public function logout()
	{
		session_destroy();
		redirect("Main/login");

	}
	// delete account............................................................................
	public function delete_account()
    {
        $id = $this->uri->segment(3);

        $this->load->model('ModelLogin');
        $r = $this->ModelLogin->profile_delete($id);
        if($r == true)
        {
            $this->session->set_flashdata("success","Account deleted successfully");
            session_destroy();
            redirect('Main/login');
        }
        else
        {
            $this->session->set_flashdata("error","Account delete failed");
            redirect('Main/profile');
        }
    }
    // Update profile------------------------------------------------------------------------

     public function updateprofile()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "Edit profile";
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $data['update_profile'] = 'ok';
        $this->load->model('ModelLogin');
        $data['profile_id'] = $this->ModelLogin->profile_id($id);
        $this->load->view('include/header',$data);
        $this->load->view('creat');
        $this->load->view('include/footer');
    }
    // update validation--------------------------------------------------------------------
    public function profile_up_validation()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
        
        if ($this->form_validation->run() == false) 
        {
            redirect('main/profile');
        }
        else
        {
             if (!empty($_FILES['photo']['name'])) 
            {

                $path = $_FILES['photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 10240;
                $config['max_width']            = 16000;
                $config['max_height']           = 12000;
                $config['file_name']            = $image_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo'))
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('Main/profile');
                }
                else
                {
               
                    $data = array(
                        'username' => $this->input->post('username'),
						'email'=> $this->input->post('email'),
						'country' => $this->input->post('country'),
						'address' => $this->input->post('address'),
						'mobile' => $this->input->post('mobile'),
						'password' =>md5($this->input->post('password')),
						
						'photo' => $image_name
                    );


                    $id = $this->input->post('id');
                    $this->load->model('ModelLogin');
                    if($this->ModelLogin->update_profile($data, $id) == true)
                    {
                        $this->session->set_flashdata('success', 'Updated successfully'); 
                        redirect('Main/profile');
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', 'Update failed'); 
                        redirect('Main/profile');
                    }
                }
            }
            else
            {          
                $this->session->set_flashdata('error', 'Please select an image.'); 
                redirect('Main/profile');
            }   
        }       
    }

}









			


	