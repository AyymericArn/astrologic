<?php

class TextShortener {

    public function shorten($text) {
        $textLength = strlen($text);
        $shortText;

        if ($textLength > 300)
        {
            $shorteningNumber = $textLength - 300;
            $cutText = substr($text, 0, -$shorteningNumber);

            $cutPoint = strrpos($cutText, '.');

            $shortText = substr($cutText, 0, $cutPoint+1);
            
        }

        return $shortText;
    }
}