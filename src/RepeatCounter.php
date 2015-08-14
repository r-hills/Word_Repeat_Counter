<?php

    class RepeatCounter
    {
 
        function countRepeats($string_of_words, $match_word)
        {
            // must be uncommented for use locally on Windows PCs
            set_include_path('C:\\uniserver\\www\\word_repeat');


            // Variable declaration
            $count = 0; 
            $string_array = array(); 

            // If input strings are empty exit function
            if ( $string_of_words == "" || $match_word == "") { return 0; }

            // If input match_word contains non-alpha chars
            if ( ! (ctype_alpha($match_word)) ) { return 0; } 

            // Format input strings
            $string_of_words = strtolower($string_of_words);
            $match_word = strtolower($match_word); 

            $string_array = explode(" ", $string_of_words);

            // Create dictionary array to verify match-word is an actual word
            // $dictionary = file_get_contents("./..dictionary.txt","..\\");
            // $dictionary_array = explode("\n", $dictionary);

            $dictionary_array = file('dictionary.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ( in_array($match_word, $dictionary_array) === true ) {

                foreach ( $string_array as $token ) {

                    if( $match_word == $token ) {
                        $count++;
                    }

                }
            }

            return $count; 

        }

    }

?>

