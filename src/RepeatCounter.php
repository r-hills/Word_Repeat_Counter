<?php

    class RepeatCounter
    {
 
        function countRepeats($string_of_words, $match_word)
        {
            // Variable declaration
            $count = 0; 
            $string_array = array(); 

            // If input strings are empty exit function
            if ( $string_of_words == "" || $match_word == "") { return 0; }

            // Format input strings
            $string_of_words = strtolower($string_of_words);
            $match_word = strtolower($match_word); 


            $string_array = explode(" ", $string_of_words);

            foreach ( $string_array as $token ) {

                if( $match_word == $token ) {

                    $count++;
                }

            }

            return $count; 

        }

    }

?>

