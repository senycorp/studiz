<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    //'storage'   => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '401666166663578',
            'client_secret' => '82a85fb0a227543ffeebefd6db04c7dc',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),

    )

);