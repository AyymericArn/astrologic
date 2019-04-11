<?php

require '../vendor/autoload.php';
use \Mailjet\Resources;

class Mailer {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function sendMail($adress) {
        $apikey = 'd89c13a09ade2fd37e177ca5b1899ff8';
        $apisecret = 'c6661ba7160162d3fff2436c68f84105';
        
        $mj = new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3.1']);
        
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "ulysse.ferte@hetic.net",
                        'Name' => "Ulysse Ferté"
                    ],
                    'To' => [
                        [
                            'Email' => "aymericarnoult@gmail.com",
                            'Name' => "passenger 1"
                        ]
                    ],
                    'Subject' => "Your email flight plan!",
                    'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
                    'HTMLPart' => "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
                ]
            ]
        ];
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);
    }

    public function sendAllMails() {
        # code...
    }
}