<?php
    class UnitTest {
        public $assertCount = 0;
        public $passCount = 0;

        public function assertTrue( $condition, $description = '' ) {
            ++$this->assertCount;

            if ( !$condition ) {
                throw new UnitTestFailedException( $description );
            }

            ++$this->passCount;
        }
        public function assertEquals( $expected, $actual, $description = '' ) {
            if ( $description != '' ) {
                $description .= '. ';
            }
            $description .= "Expected '$expected', found '$actual'.";
            $this->assertTrue( $expected === $actual, $description );
        }
    }
?>