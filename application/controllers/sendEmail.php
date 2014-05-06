<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class sendEmail extends controlador {

    public function index()
    {
        $data = $this->load_page();

       
        $name = $this->input->post('name');
		$email = $this->input->post('email');
		$telefon = $this->input->post('phone');
		$subject = $this->input->post('subject');
		$comments = $this->input->post('comments');

		$comments = $comments."\r\n".str_replace(",","%2C",$this->input->post('urlProducte'));
		


		$contingut = "Nom: ".$name."\r\n";
		$contingut .= "Telèfon ".$telefon."\r\n"; 
		$contingut .= "Email ".$email."\r\n\r\n"; 
		$contingut .= $comments;

		$this->load->library('email');

		$this->email->from($email, $name);
		$this->email->to('info@ecopetit.cat'); 

		$this->email->subject($subject);
		$this->email->message($comments);	

		$this->email->send();


		//send_email("info@ecopetit.cat", $subject, $contingut);

		$data['main_template']  = 'sendEmail';
        $data['contacte'] = 'N';
        $data['formulari'] = 'N';
        $this->lang->load('contacte');
        $data['title'] = lang('menu.contacte');
		$data['description'] = lang('menu.subtitol2')." Ronda Mossèn Jacint Verdaguer, 13 08304 Mataró (Barcelona) - 937412496 - 628988917 - info@ecopetit.cat";
		$data['nom'] = $name;
		
        $this->load->view('main_template', $data);
		

/*
		require_once(APPPATH.'phpMailer\class.phpmailer.php');

		$site_owners_email = 'web@ecopetit.cat'; // Replace this with your own email address
		$site_owners_name = 'Ecopetit'; // replace with your name



		$mail = new PHPMailer();
						
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = $subject;
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->Body = "Nom: ".$name."\r\n";
		$mail->Body .= "Telèfon ".$telefon."\r\n"; 
		$mail->Body .= "Email ".$email."\r\n\r\n"; 
		$mail->Body .= $comments;
		
		// GMAIL STUFF
		
		$mail->Mailer = "smtp";
		$mail->Host = "smtp.ecopetit.cat";
		$mail->Port = 25;
		$mail->SMTPSecure = "tls"; 
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "ecopetit"; // SMTP username
		$mail->Password = "M4t4r0"; // SMTP password
		
		$mail->Send();
		
	
		echo "<div class='alert alert-success'><i class='icon-flag'></i>".lang('contacte.gracies').$name.". ".lang('contacte.resposta')."</div>";


$data['main_template']  = 'sendEmail';
$data['title'] = lang('menu.contacte');
		$data['description'] = lang('menu.subtitol2')." Ronda Mossèn Jacint Verdaguer, 13 08304 Mataró (Barcelona) - 937412496 - 628988917 - info@ecopetit.cat";
        $this->load->view('main_template', $data);*/


/*
		$error = "";
	
		if (strlen($name) < 2) {
			$error['name'] = lang('contacte.errorNom');
		}
		
		if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
			$error['email'] = lang('contacte.errorMail'];
		}
		
		if (strlen($comments) < 3) {
			$error['comments'] = lang('contacte.errorComentari');
		}

		if (!$error) {


		} else {

			$response = (isset($error['name'])) ? "<div class='alert alert-error'><i class='icon-warning-sign'></i>  " . $error['name'] . "</div> \n" : null;
			$response .= (isset($error['email'])) ? "<div class='alert alert-error'><i class='icon-warning-sign'></i> " . $error['email'] . "</div> \n" : null;
			$response .= (isset($error['comments'])) ? "<div class='alert alert-error'><i class='icon-warning-sign'></i> " . $error['comments'] . "</div>" : null;
			
			echo $response;

		}



		//$this->load->model('newsletter_model');







        $data['main_template']  = 'sendEmail';
        $data['contacte'] = 'N';
        $this->lang->load('contacte');
        $data['title'] = lang('menu.contacte');
		$data['description'] = lang('menu.subtitol2')." Ronda Mossèn Jacint Verdaguer, 13 08304 Mataró (Barcelona) - 937412496 - 628988917 - info@ecopetit.cat";
        $this->load->view('main_template', $data);*/

    }
}