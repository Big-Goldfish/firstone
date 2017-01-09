<?php



/**
 * @link http://blog.kunx.org/.
 * @copyright Copyright (c) 2016-12-18
 * @license kunx-edu@qq.com.
 */

/**
 * 将模型中的错误信息,转成一个有序列表,返回
 * @param \Think\Model $model 模型对象.
 * @return string 错误信息字符串.
 */
function get_errors(\Think\Model $model) {
    $errors = $model->getError();
    if (!is_array($errors)) {
        $errors = [$errors];
    }
    $html = '<ol>';
    foreach ($errors as $error) {
        $html .= '<li>' . $error . '</li>';
    }
    $html .= '</ol>';
    return $html;
}




/**
 * 加盐加密
 * @param string $password 原始密码.
 * @param string $salt     盐.
 * @return string 加盐加密后的结果.
 */
function salt_mcrypt($password, $salt) {
    return md5(md5($password) . $salt);
}

function sendEmail($address, $subject, $content) {
    vendor('PHPMailer.PHPMailerAutoload');

    $mail = new \PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host       = C('MAILER.HOST');  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = C('MAILER.USERNAME');                 // SMTP username
    $mail->Password   = C('MAILER.PASSWORD');                           // SMTP password
    $mail->SMTPSecure = C('MAILER.SECURE');                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = C('MAILER.PORT');                                    // TCP port to connect to

    $mail->CharSet = 'UTF-8';
    $mail->setFrom(C('MAILER.USERNAME'));
    $mail->addAddress($address);     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $content;

    /**
     * [
     *  status=>0|1
     *  msg=>成功,错误的原因
     * ]
     */
    if (!$mail->send()) {
        $data = [
            'status' => 0,
            'msg'    => $mail->ErrorInfo,
        ];
    } else {
        $data = [
            'status' => 1,
            'msg'    => '发送成功',
        ];
    }
   return $data;
}

function sendSms() {
    vendor('alidayu.TopSdk');
    $c            = new \TopClient;
    $c->appkey    ='23587086';
    $c->secretKey = '9eb3d06225deb1bd26941c20913b7a2f';
    $req          = new \AlibabaAliqinFcSmsNumSendRequest;
    $req->setExtend("");
    $req->setSmsType("normal");
    $req->setSmsFreeSignName("验证码测试");
  //  $json         = json_encode($data);

    $req ->setSmsParam( "{product:'留言栏',code:'444'}" );
    $req ->setRecNum( "18380460781" );
    $req ->setSmsTemplateCode( "SMS_36755018" );
    $resp         = $c->execute($req);
    dump($resp);die;
    if (isset($resp->result) && isset($resp->result->success)) {
        $data = [
            'status' => 1,
            'msg'    => '发送成功',
        ];
    } else {
        $data = [
            'status' => 0,
            'msg'    => $resp->error_response->sub_msg,
        ];
    }

    //return $data;
}
