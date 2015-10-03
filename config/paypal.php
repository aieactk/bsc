<?php
return array(
    // set your paypal credential
    'client_id' => 'AdQqKgItSNspRGK50cUQ2j890zTCP0EnAdiAwqp9sdREyC-CP7DPS2u3-UVzwLNq9z0JY7SkzZPKs9us',
    'secret' => 'EFEqasByuaK-yVx6uirkz3iaomLVKxbRFqeO8VjVXacz1OHsy0fSoCfnqZYuhnUPNyXyETt7mNdFIsv0',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
