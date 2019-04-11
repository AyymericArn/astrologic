<?php

// $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

// if ((time() - $hour) > filemtime()) {
//     # code...
// }

// echo '<pre>';
// var_dump(time() - $hour);
// echo '</pre>';

// echo '<pre>';
// var_dump(filemtime('./register.php'));
// echo '</pre>';

// $message = 'It works !';
// $headers = 'FROM: service@francoisxaviermanceau.fr';

// mail('aymericarnoult@gmail.com', 'Formulaire de contact', $message, $headers);

require '../vendor/autoload.php';
use \Mailjet\Resources;

$apikey = 'd89c13a09ade2fd37e177ca5b1899ff8';
$apisecret = 'c6661ba7160162d3fff2436c68f84105';

$mj = new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3.1']);

// echo '<pre>';
// var_dump($mj);
// echo '</pre>';
// exit;

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "daily@astrologiic.space",
                'Name' => "Astrologic daily recommandations"
            ],
            'To' => [
                [
                    'Email' => "aymericarnoult@gmail.com",
                    'Name' => "Aymeric"
                ]
            ],
            'Subject' => "You daily recommandations...",
            'TextPart' => "lorem ipsum dolor sit amet consectetur",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
        ]
    ]
];

$response = $mj->post(Resources::$Email, ['body' => $body]);
// $response->success() && var_dump($response->getData());