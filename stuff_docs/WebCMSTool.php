<?php

// --------------------------------------------------------------
// WHITSPACE MARKETPLACE -- SAAS (The will power Whitespace publishing system)
//  the ws framework is an online service that developers can use
//  create new components. These components' source code will reside
//  on our servers and users can purchase these components and
//  create new instances of them to include on their page.
//  other users can now purchase these instances if made available. (like Gallo images).
//  components can be anything from galleries to sound clips and even a navbar component.
// --------------------------------------------------------------

Components : [
    0 : {
       
        id : 293429340923409723097029375,
        parent_id : 234082739587249594334,
        type : 'ComponentGroup',        // component container ... almost like adding widgets to a story
        description : '',
        pay_type : null || {
            amount : 500,
            '' ...
        },
        developer_id : 123,
        data : { 0: "all custome widget data" },
    }
    1 : {
       
        id : 239482394923750972409724053,
        parent_id : 293429340923409723097029375,
        type : 'Gallery',
        description : '',
        pay_type : null || {
            amount : 500,
            '' ...
        },
        developer_id : 123,
        data : { 0: "all custome widget data" },
    }
]


//------------------------------------------------------------------------------------------------------------
// PUBLISHING SYSTEM ON TOP OF THE WHITSPACE MARKETPLACE API..(Could be called Whitespace, which would be fitting) Others devs can use this api to build a site. (We would use it to build the publishing system)
// This will create a global network of website sharing. devs can even create components such as games (rugby widget).
// i.e supersport can create a rugby widget and sell it online in the whitespace market place.
//------------------------------------------------------------------------------------------------------------

?>

-- Static page build by a developer with assets, hosting etc.. the usual
-- this page will be using the whitespace API. Components will be added that where build online by the dev.

-- THIS WILL BE THE WHITESPACE PUBLISHING SYSTEM USING THE WHITESPACE FRAMEWORK.

<html>
    <head>
        <script type="text/javascript" src="//cdn.whitespace.com/v1.js?apiKey=API-key"></script> <!-- whitespace api -->
    </head>

    <body>

        {{{ComponentGroup-id}}}
        <br>
        {{{Gallery-id}}}
    </body>
</html>
