<?php

// require('../Horoscop.php');

class KwExtractor extends Horoscop {

    protected $analysis;

    public function __construct() {
        $this->interpret();
    }

    public function interpret() {
        $text = parent::aggregate();

        $curlPostData = json_encode([
            'text' => $text,
            'features' => [
                'sentiment' => new stdClass(),
                'categories' => new stdClass(),
                'concepts' => new stdClass(),
                'entities' => new stdClass(),
                'keywords' => new stdClass()
            ]
        ]);

        $curl = curl_init();      
        curl_setopt($curl, CURLOPT_URL, "https://gateway-lon.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2018-11-16");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPostData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERPWD, "apikey:IO2wxp7-mSl34XeoBDSDFMUduBG1_aUsESYaLH-tvUx_");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "content-type: application/json"
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);

        curl_close($curl);

        $this->analysis = json_decode($response);
    }

    public function extract($i = 0) {

        return $this->analysis->keywords[$i]->text;
    }
    
}

// CACHE NEEDED

// $extractor = new KwExtractor();
// $extractor->interpret();
// $extractor->extract();