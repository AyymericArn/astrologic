<?php

require '../model/db.php';
require '../model/DataManager.php';
require '../vendor/autoload.php';
use \Mailjet\Resources;

class Mailer extends DataManager {

    private $db;
    private $mailList;
    private $mailTemplates = [];

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->db = $db;
        $this->fetchMailingList();
        $this->generateMails();
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

            $this->mailTemplates[$zodiacSign] = $mailContent;
        }

    }
    
    public function sendMail($adress, $mailContent) {
        $apikey = 'd89c13a09ade2fd37e177ca5b1899ff8';
        $apisecret = 'c6661ba7160162d3fff2436c68f84105';
        
        $mj = new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3.1']);
        
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "daily@astrologiic.space",
                        'Name' => "Astrologic"
                    ],
                    'To' => [
                        [
                            'Email' => $adress,
                            'Name' => "passenger 1"
                        ]
                    ],
                    'Subject' => "Your email flight plan!",
                    'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
                    'HTMLPart' => $mailContent
                ]
            ]
        ];
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);
    }

    public function sendAllMails() {
        foreach ($this->mailList as $subscriber) {
            $mailContent = $this->mailTemplates[$subscriber->sign];
            // change for prod

            $url = 'https://francoisxaviermanceau.fr/hetic_projects/astrologic/unsubscribe/'.md5($subscriber->mail);

            $mailBody = str_replace(
                'URLGOESHERE',
                $url,
                $mailContent
            );

            $this->sendMail($subscriber->mail, $mailBody);
        }
    }
}

$mailer = new Mailer($db);

$mailer->sendAllMails();