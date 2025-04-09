<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Oh iya pak terkait ini info dri pak Danang ini pak:
// account : no-replay@megadata.net.id

// Incoming mail : mail.megadata.net.id port 993

// Outgoing mail : mail.megadata.net.id port 465
$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_auth' => true,
    'smtp_host' => 'smtp.hostinger.com', 
    'smtp_port' => 465,
    'smtp_user' => 'info@kepoo.in',
    'smtp_pass' => '@Sincia2573',
    'mail_set_from' => 'info@kepoo.in',
    'mail_set_reply_to' => 'info@kepoo.in',    
    'mail_set_from_alias' => 'Kepoo.in',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);

// $config = array(
//     'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//     // 'smtp_host' => 'srv42.niagahoster.com', 
//     'smtp_host' => 'mail.murba.co.id',
//     'smtp_port' => 465,
//     'smtp_user' => 'moonpact@murba.co.id',
//     'smtp_pass' => 'masterjoe00',
//     'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
//     'mailtype' => 'text', //plaintext 'text' mails or 'html'
//     'smtp_timeout' => '4', //in seconds
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE
// );