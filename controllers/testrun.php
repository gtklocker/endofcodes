<?php
    class TestrunController extends ControllerBase {
        protected $environment = 'test';

        public function create( $name ) {
            include_once 'models/test/base.php';
            include_once 'models/test/withfixtures.php';

            $path = 'tests/' . $name . '.php';
            if ( !file_exists( $path ) ) {
                throw new HTTPNotFoundException();
            }
            $unittest = include_once $path;
            $unittest->run();

            include_once 'views/testrun/results.php';
        }

        public function createView() {
            include_once 'models/test/base.php';

            $tests = UnitTest::findAll();
            include_once 'views/testrun/create.php';
        }
    }
?>
