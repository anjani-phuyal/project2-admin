<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nepalinn extends CI_Controller {

	
	public function index()
	{
		if(isset($this->session->userdata['user_id']) && isset($this->session->userdata['username']) && isset($this->session->userdata['full_name']) && isset($this->session->userdata['hotel_id'])){
			redirect('home');
		}
		
		$data['title'] = 'Nepalinn | Login';
		$this->load->view('login', $data);
	}
	
	public function login()
	{
		$this->index();
	}

	public function home()
	{
		$data['title'] = 'Nepalinn | Home';
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function room_setting()
	{
		$data['title'] = 'Nepalinn | Room Setting';
		$this->load->view('header', $data);
		$this->load->view('room_setting');
		$this->load->view('footer');
	}

	//login function
	public function login_entry()
	{
		//check if submit button clicked or not
		if (!isset($_POST['name'])){
			redirect('login');
		}else{
			$pass = $_POST['pass'];
			$pass = sha1($pass);
			$login_details = array(
				'username' => $_POST['name'],
				'password' => $pass
			);
			
			$output = $this->dbase->login($login_details);
			
			
			if($output == array()){
				echo 'User or Password invalid!';exit();
				
			}else{
			
				$sess_data = array(
					'user_id' => $output[0]->user_id,
					'username' => $output[0]->username,
					'full_name' => $output[0]->full_name,
					'hotel_id' => $output[0]->hotel_id
				);
				
				$this->session->set_userdata($sess_data);
				
				echo 'successful';exit();
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();

		$this->index();
	}

	public function edit()
	{
		$data['title'] = 'Edit | Home';
		$hotel_id = $this->session->userdata['hotel_id'];
		$data['hotel_details'] = $this->booking->get_Hotel_Details($hotel_id);
		$data['hotel_facilities'] = $this->dbase->get_hotel_facilities($hotel_id);
		
		$default_image = $data['hotel_details'][0]->default_imgid;
		$other_image = $data['hotel_details'][0]->image_id;
		
		$data['default_image'] = $this->dbase->get_Image_Details($default_image);
		$data['other_image'] = $this->dbase->get_Image_Details($other_image);

		
		$this->load->view('header', $data);
		$this->load->view('edit');
		$this->load->view('footer');
	}

	// public function edit_update(){
	// 	if($this->input->post('update')==false){
	// 		redirect('home');
	// 	}else{
	// 		$hotel_id = $this->session->userdata['hotel_id'];
	// 		$hotel_details = $this->dbase->get_Hotel_Details($hotel_id);
	// 		$default_image = $hotel_details[0]->default_imgid;

	// 		//image upload to the folder
	// 		$this->load->library('upload');

	//         $config['upload_path'] = '/assets/images/hotel_image/';
	//         $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
	        
	//         $config['overwrite'] = TRUE;

	//         $this->upload->initialize($config);

	//         foreach($_FILES as $field => $file)
	//         {
	//             // No problems with the file
	//             if($file['error'] == 0)
	//             {
	//                 // So lets upload
	//                 if ($this->upload->do_upload($field))
	//                 {
	//                     $data = $this->upload->data();
	//                     array_push($details, $data);
	//                 }
	//                 else
	//                 {
	//                     $errors = $this->upload->display_errors();
	//                     array_push($upload_error, $error);
	//                 }
	//             }
	//             else{
	// 	    		array_push($error, 'Error');
	//             }
	//         }
	//         print_r($details);

 //    	}
	// }

}

