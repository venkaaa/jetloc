<?php
class TT_Security extends TeslaFramework {

	public $username;
	public $license = NULL;
	public $state = 'active';
	public $update_key = 'teslathemes_encription_key';

	function __construct(){
		$this->username = ($this->get_license())?base64_decode(file_get_contents($this->get_license())):NULL;
	}

	function get_license(){
		$location = TT_THEME_DIR . "/theme_config/tt_license.txt";
		if (file_exists($location)){
			$this->license = $location;			
			return $location;
		}else{
			$this->state = 'corrupt';
			return NULL;
		}
	}

	public function check_state(){
		$this->check_username();
		return $this->throw_errors();
	}

	public function throw_errors(){
		switch ($this->state) {
			case 'active':
				break;
			case 'warning' :
				$this->error_message(true);
				break;
			case 'no data':
				$this->error_message(true);
				break;
			case 'blocked':
				$this->error_message();
				return FALSE;
			case 'corrupt':
				$this->error_message( false, "<span>Note :</span> Don't change the code or license file contents please.");
				return FALSE;
		}
		return TRUE;
	}

	public function change_state($new_state){
		$this->state = $new_state;
		return;
	}

	public function check_username(){
		delete_transient( 'security_api_result' );
		if ($this->username){
			if( in_array( $this->username, array( 'tt_general_user','tt_other_marketplaces_user' ) ) )
				return;
			$result = get_transient( 'security_api_result' );
			if(!$result){
				if(ini_get('allow_url_fopen')){
					$api = file_get_contents( 'http://teslathemes.com/amember/api/check-access/by-login?_key=n7RYtMjOm9qjzmiWQlta&login=' . $this->username);
				}
				if(empty($api) && function_exists('curl_init')){
					$api = curl_get_file_contents('http://teslathemes.com/amember/api/check-access/by-login?_key=n7RYtMjOm9qjzmiWQlta&login=' . $this->username);
				}
				if(!empty($api)){
					$result = json_decode($api);
					set_transient( 'security_api_result', $result, 30 * MINUTE_IN_SECONDS );
				}else{
					$this->state = 'no data' ;
				}
			}
			
			if ( $result->ok ){
				if (!empty($result->subscriptions)){
					if ( !empty($result->subscriptions->{28}) ){
						$this->state = 'blocked' ;
					}elseif(!empty($result->subscriptions->{34})){
						$this->state = 'warning' ;
					}
				}
			}else
				$this->state = 'corrupt';
		}else
			$this->state = 'corrupt';
		return;
	}

	private function error_message($just_warning=NULL,$custom=NULL){
		echo "<div id='result_content'><div id='tt_import_alert'>";
		if($custom)
			echo $custom;
		if ( $just_warning )
			echo '<span>WARNING :</span> We noticed some fraudulent activity with our theme or couldn\'t connect to our servers for some reasons. Please contact us in 5 days to fix this or '.THEME_PRETTY_NAME.' framework page will be blocked.<br> <span>State : ' . $this->state . '</span>';
		else{
			$mail_body = urlencode("Please help me with my security issue. Here are my credentials : \n ================== \n WP INSTALLATION URL: \n WP USERNAME: \n WP PASSWORD: \n \n FTP HOST: \n FTP USERNAME: \n FTP PASSWORD: \n ======================= \n");
			echo 'The '.THEME_PRETTY_NAME.' page is <span>blocked</span> by TeslaThemes due to some <span>fraudulent action</span>.<br> Please contact us at hi@teslathemes.com or click the link below to correct your license if you think that this is a mistake. <br><span>State : ' . $this->state . '</span>';
		}
		echo "</div><a href='mailto:support@teslathemes.com?subject=[".THEME_NAME."]%20Security&body=$mail_body' class='btn'>Contact TeslaThemes</a></div>";
		return;
	}

}