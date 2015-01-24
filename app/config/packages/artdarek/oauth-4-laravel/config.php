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
    'storage'   => 'Session',

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

        /**
         * Google
         */
        'Google' => array(
            'client_id'     => '191410386444-mn7637i6p9bu32ot3t51tpiakulbehji.apps.googleusercontent.com',
            'client_secret' => 'xSjDp0kiPMtly-Md1rJ-LAyG',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),
    )

);