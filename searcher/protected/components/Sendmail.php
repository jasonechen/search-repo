<?php



class Sendmail{
	
	function send($to,$subject,$body,$from=''){
			
			Yii::import('application.extensions.phpmailer.JPhpMailer');
			if($from == '')   $from = Yii::app()->params['siteEmail'];
			$mailer = new JPhpMailer;
			$mailer->IsSMTP();
			$mailer->IsHTML(true);
			$mailer->SMTPAuth = true;
			$mailer->SMTPSecure = "ssl";
			$mailer->Host = Yii::app()->params['siteEmailSmtpHost'];
			$mailer->Port = 465;
			$mailer->Username = Yii::app()->params['siteEmail'];
			$mailer->Password = Yii::app()->params['siteEmailPassword'];;
			$mailer->From = $from;
			$mailer->FromName = Yii::app()->params['siteEmailName'];
			$mailer->AddAddress($to);
			$mailer->Subject = $subject;			
                        $mailer->MsgHTML($body);		
			$mailer->Send() ;	
	}	

}

?>