<?php
    session_start();

    error_reporting( E_ALL ^ E_STRICT ^ E_DEPRECATED );
    ini_set( 'display_errors', '1' );
    date_default_timezone_set( "Europe/Athens" );
    /*
    Redirects to a given URL or resource:

    go( "http://www.google.com" ); // full URL
    go( "user", "view", [ "example" => "argument" ] ); // resource & method
    go(); // home page
    */
    function go( $resource_or_url = false, $method = false, $args = [] ) {
        throw new RedirectException( $resource_or_url, $method, $args );
    }

    class RedirectException extends Exception {
        private $url;

        public function getURL() {
            return $this->url;
        }

        public function __construct( $resource_or_url = false, $method = false, $args = [] ) {
            if ( $resource_or_url === false ) {
                $this->__construct( 'dashboard', 'view' );
            }
            else if ( $method === false ) {
                $this->url = $resource_or_url;
            }
            else {
                $resource = $resource_or_url;
                foreach ( $args as $key => $arg ) {
                    if ( $arg === true ) {
                        $arg = 'yes';
                    }
                    else if ( $arg === false ) {
                        $arg = 'no';
                    }
                    $args[ $key ] = "$key=" . urlencode( $arg );
                }
                $this->url = "$resource/$method?" . implode( "&", $args );
            }
        }
    }

    class HTTPErrorException extends Exception {
        public $header;

        public function __construct( $error, $description = "" ) {
            if ( !empty( $description ) ) {
                $this->header = "HTTP/1.1 $error $description";
                parent::__construct( "HTTP/1.1 $error $description" );
            }
            else {
                $this->header = "HTTP/1.1 $error";
                parent::__construct( "HTTP/1.1 $error" );
            }
        }
    }

    class HTTPNotFoundException extends HTTPErrorException {
        public function __construct() {
            parent::__construct( 404, 'Not Found' );
        }
    }

    class HTTPUnauthorizedException extends HTTPErrorException {
        public function __construct() {
            parent::__construct( 401, 'Unauthorized' );
        }
    }
?>
