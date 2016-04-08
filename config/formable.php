<?php

return [

    'site_title' => 'Crystal Peel',

    'site_description' => 'Crystal Peel, Dalvegi 28, sími 895-0575 / 571-6990.',

    'company_name' => 'Crystal Peel',
    'company_email' => 'crystalpeel@crystalpeel.is',

    'email' => 'crystalpeel@crystalpeel.is',
    
    /*
    |--------------------------------------------------------------------------
    | Formable hlutir (models)
    |--------------------------------------------------------------------------
    |
    | Hvaða hlutir eru í notkun?
    |
    */
    'hlutir' => [
        'Page',
        //'News',
        'Category',
        'Product'
    ],

    /*
    |--------------------------------------------------------------------------
    | Tungumál í boði
    |--------------------------------------------------------------------------
    |
    | Hvaða tungumál eru í boði? Fyrsti er sem kemur alltaf fremst allsstaðar, og er hann sá sem er stilltur sem default í kerfinu.
    |
    */
    'locales' => ['is'],

    'flagicons' => [
        'is' => 'flagicons/Iceland.png'
    ],



    'shipping_options' => [
        'sott' => 'Sótt á staðinn',
        'sent' => 'Sent á pósthús',
    ],


    'payment_options' => [
        'milli' => 'Greitt með millifærslu',
        'kort' => 'Greitt með greiðslukorti',
    ],


];  