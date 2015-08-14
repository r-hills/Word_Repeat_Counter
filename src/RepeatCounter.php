<?php

    class RepeatCounter
    {
 
        function countRepeats($string_of_words, $match_word)
        {
            // WARNING! *************************************************************
            // The following line must be uncommented for use locally on Windows PCs
            
            // set_include_path('C:\\uniserver\\www\\word_repeat');

            // Variable declaration
            $count = 0; 
            $output_array = array(); 

            // If input strings are empty return error and exit function
            if ( $string_of_words == "" || $match_word == "") { 
                array_push($output_array, "Error: Both fields must have entries!", -1); 
                return $output_array;
            }

            // If input match_word contains non-alpha chars return error and exit function
            if ( ! (ctype_alpha($match_word)) ) { 
                array_push($output_array, "Error: Search word must only contain letters!", -1); 
                return $output_array;
            } 

            // Format input strings
            $string_of_words = strtolower($string_of_words);
            $match_word = strtolower($match_word); 

            $string_array = explode(" ", $string_of_words);

            // Create dictionary array to verify match-word is an actual word
            $dictionary_array = file('dictionary.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ( in_array($match_word, $dictionary_array) === true ) {

                foreach ( $string_array as $token ) {

                    // Format tokenized strings to strip non-alpha characters
                    $token = $this->stripNonAlphaChars($token); 

                    // Count number of whole word matches
                    if( $match_word == $token ) {
                        $count++;
                    }

                }
            } else {
                // If input match_word is not found in our dictionary return error and exit function
                array_push($output_array,"Error: Search word not found in our dictionary!", -1);
                return $output_array;
            }

            // Prepare output strings for return results
            if ( $count == 0 ) { 
                $out_string = "Word was not found in the input string of words!";
            } else {
                $out_string = "Your word \"" . $match_word . "\" was found!";
            }

            array_push($output_array, $out_string, $count); 

            return $output_array;
        }


        //==========================================================================
        //  Function stripNonAlphaChars
        //  
        //  Returns string with leading and trailing spaces and punctuation removed.
        //--------------------------------------------------------------------------

        function stripNonAlphaChars($str)
        {
            // Replaces any non-alpha characters with nothing ''.
            return preg_replace('/[^[:alpha:]]/', '', $str);

        }

    }

?>

