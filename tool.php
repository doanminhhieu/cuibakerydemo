<?php
    include("myadmin/config/sql.php");
     
    GUI_email_new("administrator@cuibakery.com;linhhuynhpa@gmail.com","to_name","subject","cuibakery.com","body", $thongtin);

    function GUI_email_new($to_email,$to_name,$subject,$domain,$body, $thongtin){         
        require_once('myadmin/config/class.phpmailer.php');

        $body             = @eregi_replace("[\]",'',$body);
        $mail             = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host       = $thongtin['em_ip'];
        $mail->SMTPDebug  = 2;  
        $mail->SMTPAuth   = true;  
        $mail->CharSet     = "utf-8";
        $mail->Username   = $thongtin['em_taikhoan']; 
        $mail->Password   = $thongtin['em_pass'];
        $frommail         = "info@".$domain;
        $mail->SetFrom($frommail, $domain);
        $subject          = $subject . " - " .date("H:i A | d/m/Y") ;
        $mail->Subject    = $subject;
        $mail->AltBody    = $body; 
        $mail->MsgHTML($body);
        $get_name   = explode(";",$to_name);
        $get_email  = explode(";",$to_email);
        $soluongmail = count($get_email);
        for($in=0;$in<$soluongmail;$in++)
            {
                if(!empty($get_name[$in]))
                    {
                        $get_name_in = @$get_name[$in];
                    }
                else    $get_name_in = @$get_name[0];
                if($in==0) { if(is_email(trim($get_email[$in]))) $mail->AddAddress(trim($get_email[$in]),$get_name_in); }
                else       { if(is_email(trim($get_email[$in]))) $mail->AddBCC(trim($get_email[$in]),$get_name_in); }
            }
        $mail->WordWrap   = 50;
        $mail->IsHTML(true);
        if(!$mail->Send())
            return 0;
        else
            return 1;
    }
 
?>