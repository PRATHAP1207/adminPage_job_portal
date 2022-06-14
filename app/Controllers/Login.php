<?php

declare(strict_types=1);

namespace App\Controllers;

require 'vendor/autoload.php';
require 'newVendor/autoload.php';
class Login extends BaseController
{
	public function index()
	{
		$authenticator = new \PHPGangsta_GoogleAuthenticator();
		$secret = $authenticator->createSecret();
		$code = $authenticator->getQRCodeGoogleUrl('secretGenerator32', $secret, 'adminPanel');
		$simple_string = $secret;
		echo "Original String: " . $simple_string;
		$ciphering = "AES-128-CTR";
		$options = 0;
		$encryption_iv = '1234567891011121';
		$encryption_key = "demo";
		$encryption = openssl_encrypt(
			$simple_string,
			$ciphering,
			$encryption_key,
			$options,
			$encryption_iv
		);
		echo "Encrypted String: " . $encryption . "\n";
		$decryption_iv = '1234567891011121';
		$decryption_key = "demo";
		$decryption = openssl_decrypt(
			$encryption,
			$ciphering,
			$decryption_key,
			$options,
			$decryption_iv
		);
		echo "Decrypted String: " . $decryption;

		echo view('LoginView');
	}
	function loginPage()
	{
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');


		
		// print_r( password_hash($password,PASSWORD_BCRYPT)); exit;
		//Checking Empty String OR NOT
		if ((isset($username) && $username != '') && (isset($password) && $password != '')) {
			$userDetails = $this->Common_model->getLoginRecord('login_user', '*', array('user_email' => $username, 'status' => 1));
		//	var_dump(http_response_code());
			if (isset($userDetails) && password_verify($password, $userDetails->password)) { //Valid UserDetails

				if ($userDetails->loginToken == "") {
					$authenticator = new \PHPGangsta_GoogleAuthenticator();
					$secret = $authenticator->createSecret();
					$simple_string = $secret;
					$ciphering = "aes-256-ctr";
					$options = 0;
					$encryption_iv = '0101011010010101';
					$encryption_key = "Syneins";
					$encryption = openssl_encrypt(
						$simple_string,
						$ciphering,
						$encryption_key,
						$options,
						$encryption_iv
					);
					$code = $authenticator->getQRCodeGoogleUrl($username, $secret, 'adminPanel');
					$this->Common_model->updateRecord("login_user", array('status' => 1, 'google_Authentication' => $encryption), array('uid' => $userDetails->uid));
					$status = 1;
					$data['qrCode'] = $code;
				} else {
					$status = 2;
					// echo  json_encode($data);
					//    exit;
				}
				$data['status']=$status;
				$res['data']=$data;
				 echo json_encode($res);exit;
			} else {
				 $data['status'] = 3;
				 echo  json_encode($data);
					exit;
			}
		}
		
	}
	function confirm_google_auth()
	{
		$code = $this->request->getVar('code');
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		if ((isset($username) && $username != '') && (isset($password) && $password != '')) {
			$userDetails = $this->Common_model->getLoginRecord('login_user', '*', array('user_email' => $username, 'status' => 1));
			if (isset($userDetails) && password_verify($password, $userDetails->password)) { //Valid UserDetails
				$authenticator = new \PHPGangsta_GoogleAuthenticator();
				$encrptedValue = $userDetails->google_Authentication;
			$ciphering = "aes-256-ctr";
			$options = 0;
			$decryption_iv = '0101011010010101';
			$decryption_key = "Syneins";
			$decryption = openssl_decrypt(
				$encrptedValue,
				$ciphering,
				$decryption_key,
				$options,
				$decryption_iv
			);
			$secret=$decryption;
			if ($authenticator->verifyCode($secret,$code)) {
				$status = 1;
					$value['lastActive'] = (date('Y-m-d'));
				$value['loginToken'] = randomKey(24);
				$this->Common_model->updateRecord('login_user', $value, array('uid' => $userDetails->uid));
		         
			} else {
				$status = 2;
				$value['lastActive'] = (date('Y-m-d'));
			}
			$res['status']=$status;
				 echo json_encode($res);exit;
		}
		}else{
			echo "Wrong Person";exit;
		}
	}
	function logout()
	{
		$userId = getSession('session_id');
		$this->Common_model->updateRecord("login_user", array('status' => 1, 'loginToken' => ''), array('uid' => $userId));
		session_destroy();
		return redirect()->to('login');
	}
}
