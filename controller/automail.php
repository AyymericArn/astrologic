<?php

require '../model/db.php';
require '../model/DataManager.php';
require '../vendor/autoload.php';
use \Mailjet\Resources;

class Mailer extends DataManager {

    private $db;
    private $mailList;

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->db = $db;
    }

    public function fetchMailingList() {
        $req = $this->db->query('SELECT sign, mail FROM subscribers');

        $this->mailList = $req->fetchAll();

        // foreach mailList as subscriber...
    }

    public function generateMails() {

        $zodiacList = [
            'aries',
            'taurus',
            'gemini',
            'cancer',
            'leo',
            'virgo',
            'libra',
            'scorpio',
            'sagittarius',
            'capricorn',
            'aquarius',
            'pisces'
        ];
        
        foreach ($zodiacList as $zodiacSign) {
            $data = $this->getData($zodiacSign);

            require('../views/layout/mail_layout.php');

        }
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

$mailer = new Mailer($db);

$mailer->generateMails();