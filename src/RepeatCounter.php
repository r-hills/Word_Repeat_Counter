<?php

    class RepeatCounter
    {
 
        function countRepeats($string_of_words, $match_word)
        {
            // must be uncommented for use locally on Windows PCs
            set_include_path('C:\\uniserver\\www\\word_repeat');

            // Variable declaration
            $count = 0; 

            // If input strings are empty exit function
            if ( $string_of_words == "" || $match_word == "") { return 0; }

            // If input match_word contains non-alpha chars
            if ( ! (ctype_alpha($match_word)) ) { return 0; } 

            // Format input strings
            $string_of_words = strtolower($string_of_words);
            $match_word = strtolower($match_word); 

            $string_array = explode(" ", $string_of_words);

            // Create dictionary array to verify match-word is an actual word
            $dictionary_array = file('dictionary.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ( in_array($match_word, $dictionary_array) === true ) {

                foreach ( $string_array as $token ) {

                    $token = $this->stripNonAlphaChars($token); 

                    if( $match_word == $token ) {
                        $count++;
                    }

                }
            }

            return $count; 

        }

        //=================================================================
        //  Function for stripping all punctuation and spaces from string
        //-----------------------------------------------------------------

        function stripNonAlphaChars($str)
        {
            // Replaces any non-alpha characters with nothing ''.
            return preg_replace('/[^[:alpha:]]/', '', $str);

        }

    }

?>

