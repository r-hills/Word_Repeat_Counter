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


    }

?>