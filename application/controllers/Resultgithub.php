<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultgithub extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			// Getting access token
				function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
					$url = 'https://github.com/login/oauth/access_token';			
					
					$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code'.'&scope=user';
					$ch = curl_init();		
					curl_setopt($ch, CURLOPT_URL, $url);		
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
					curl_setopt($ch, CURLOPT_POST, 1);		
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));	
					$data = json_decode(curl_exec($ch), true);
					$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
					if($http_code != 200) 
						throw new Exception('Error : Failed to receieve access token');
						
					return $data;
				}
			// Getting user profile information
				function GetUserProfileInfo($access_token) {	
					$url = 'https://api.github.com/user';			
					
					$ch = curl_init();		
					curl_setopt($ch, CURLOPT_URL, $url);		
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: token '. $access_token, 'User-Agent: '.GITHUB_APP_OAUTH_NAME));
                    $data = json_decode(curl_exec($ch), true);
					$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
					if($http_code != 200) 
						throw new Exception('Error : Failed to get user information');
						
					return $data;
				}
				// Google will retun the code parameter after verification 
				if(isset($_GET['code'])) {
				try {
					// Get the access token 
					$data = GetAccessToken(GITHUB_APP_CLIENT_ID, GITHUB_APP_CLIENT_REDIRECT_URL, GITHUB_APP_CLIENT_SECRET, $_GET['code']);
                    // Get user information
					$userinfo = GetUserProfileInfo($data['access_token']);
					// Here yoiu can see all user detail 

                    echo print_r($userinfo);
					$userdata = array(
						'email'=> $userinfo['email'],
						'name' => $userinfo['name'].'('.$userinfo['login'].')',
						'firstname' => $userinfo['name'],
						'familyname' => '',
						'image' => $userinfo['avatar_url'],
						'id' => $userinfo['id']
					);

					// Now that the user is logged in you may want to start some session variables

					$this->session->set_userdata($userdata);
                    redirect('/News');
					
				}
				catch(Exception $e) {
					echo $e->getMessage();
				}
            }
            //show_404();
	}
}
