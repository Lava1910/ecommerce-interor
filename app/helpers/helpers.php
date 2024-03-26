<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\GeneralSetting;
use App\Models\SocialNetwork;

/** SEND EMAIL FUNCTION USING PHPMAILER LIBRARY */
if( !function_exists('sendEmail') ){
    function sendEmail($mailConfig){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = env('EMAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('EMAIL_USERNAME');
        $mail->Password = env('EMAIL_PASSWORD');
        $mail->SMTPSecure =env('EMAIL_ENCRYPTION');
        $mail->Port = env('EMAIL_PORT');
        $mail->setFrom($mailConfig['mail_from_email'],$mailConfig['mail_from_name']);
        $mail->addAddress($mailConfig['mail_recipient_email'],$mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body =$mailConfig['mail_body'];
        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }
}

/*GET GENNERAL SETTINGS*/
if( !function_exists('get_settings')){
    function get_settings(){
        $result = null;
        $settings = new GeneralSetting();
        $settings_data = $settings->first();

        if($settings_data){
            $result = $settings_data;
        }else{
            $settings->insert([
                'site_name'=>'laravelcom',
                'site_email'=>'info@ecommerce.com'
            ]);
            $new_settings_data = $settings->first();
            $result = $new_settings_data;
        }
        return $result;
    }
}

/* Get social network */
if( !function_exists('get_social_network')){
    function get_social_network(){
        $result = null;
        $social_network = new SocialNetwork();
        $social_network_data = $social_network->first();

        if($social_network_data){
            $result = $social_network_data;
        }else{
            $social_network->insert([
                'facebook_url'=>null,
                'twitter_url'=>null,
                'instagram_url'=>null,
                'tiki_url'=>null,
                'lazada_url'=>null,
                'shopee_url'=>null
            ]);
            $new_social_network_data = $social_network->first();
            $result = $new_social_network_data;
        }
        return $result;
    }
}
