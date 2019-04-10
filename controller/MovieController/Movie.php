<?php

// require('./KwExtractor.php');

class Movie extends KwExtractor {

    private $existingKeywords;

    public function __construct($zodiacName) {
        parent::__construct($zodiacName);
        $this->getKeyword();
    }

    public function getKeyword() {

        $found = false;
        $i = 0;
        $result;

        while (!$found) {
            $keyword = parent::extract($i);

            $url = "https://api.themoviedb.org/3/search/keyword?";

            $url .= http_build_query([
                'api_key' => 'd855544639d03d8109ffab35d0662cd1',
                'query' => $keyword
            ]);

            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);

            $result = json_decode($response);

            curl_close($curl);

            if (intval($result->total_results) > 2) {
               $found = true;
            } else {
                $i++;
            }
        }

        $this->existingKeywords = $result->results;

    }

    public function getMovie() {

        $found = false;

        $i = 0;
        while (!$found) {
            
            $id = $this->existingKeywords[$i]->id;
    
            $url = "https://api.themoviedb.org/3/keyword/$id/movies?";
    
            $url .= http_build_query([
                'api_key' => 'd855544639d03d8109ffab35d0662cd1'
            ]);
    
            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
    
            $result = json_decode($response);
    
            curl_close($curl);

            if (intval($result->total_results) !== 0) {
                $found = true;
            } else {
                $i++;
            }
            
        }
        
        // shall be randomized
        return $result->results[0];
    }
}

// $movie = new Movie();

// $movie->getMovie();