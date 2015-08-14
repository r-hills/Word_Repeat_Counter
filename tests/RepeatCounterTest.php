<?php

    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase
    {

        function test_countRepeats_noStringOfWords()
        {
            //Arange
            $test_RepeatCounter = new RepeatCounter;
            $words_string = "";
            $match_word = "bob";

            //Act
            $result = $test_RepeatCounter->countRepeats($words_string, $match_word);

            //Assert
            $this->assertEquals(0, $result);
        }
        
        function test_countRepeats_noMatchString()
        {
            $test_RepeatCounter = new RepeatCounter;
            $words_string = "This is a string!";
            $match_word = "";

            $result = $test_RepeatCounter->countRepeats($words_string, $match_word);

            $this->assertEquals(0, $result);
        }

        function test_countRepeats_mixedCaseInput()
        {
            $test_RepeatCounter = new RepeatCounter;
            $words_string = "iS it A STring of woRds";
            $match_word = "is";

            $result = $test_RepeatCounter->countRepeats($words_string, $match_word);

            $this->assertEquals(1, $result);
        }

        function test_countRepeats_inputNonAlphaChars()
        {
            $test_RepeatCounter = new RepeatCounter;
            $words_string = "~It is + junk!!";
            $match_word = ">is?";

            $result = $test_RepeatCounter->countRepeats($words_string, $match_word);

            $this->assertEquals(0, $result);
        }

    }

?>