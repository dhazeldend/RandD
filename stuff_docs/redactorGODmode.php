<?php

/*
--------------------------------------------------------------------------------------------
-------------------------------------  R E D A C T O R  ---  X  ----------------------------
--------------------------------------------------------------------------------------------
*/

/* ---------------------------------------- Features ------------------------------------ */

1. Plug any Widget ( CMS widget + FrontEnd )
2. Complete layout freedom
3. Support templating types ( Create new -> fixedTemplate, template, freeHand )
4. Support multiple instances of redactorX with timestamps i.e. Storify  -- "every article becomes a blog"(via @DylanRoux)
5. incorparate - article_view_style = [ "old", "new" ] -> affects render, old will support old aricles
6. re work current embeds to work as widgets NB store only Share links / Ids (no html) re-gen html though widget to be maintained i.e. Youtube changes embed  

/* -------------------------------------------------------------------------------------- */

/* ---------------------------------------- SideNotes ----------------------------------- */
1. headline Article page CMS widget takes param redactor = true | false
/* -------------------------------------------------------------------------------------- */

?>

<script>
Article = {
    _id: mongoId(w234234234234234),
    
    (Old fields like published, status)
    
    headline: "Bla",
    subhead: "Bl bl",
    overhead: "Blaaaaa"
    synopsis: "", // always generated from latest story

    view_style: "new", // old legacie will all be updated to "old" -> this will dictate the front end rendering
    image_id: mongoId(w234234234234234) // link to images collection, the articles selected thumb
    
    multimedia: true, // indexed in solr for search speed
    has_image: true, // indexed in solr for search speed
    has_video: true, // indexed in solr for search speed
    has_gallery: true, // indexed in solr for search speed
    
    storys: // these are instances of redactorX 
        [ 
            {
            active: true // true once editor has approved it
            timestamp: 123123,
            type: "fixedTemplate", // ref point 3 above
            body_html: "", // Hold web side content with place holders for widgets({{{1ASDS2830912389012381}}}) and html for styling i.e <b><b/>
            body: "", // clean text for apps 
            widgets: [
                {
                    id: mongoId(w234234234234234),
                    type: "imageCarosul",
                    fillType: "float",
                    edit: int userId, // used to lock controlls 
                    data:{ // anything widget requires
                        images:[
                            id: mongoId(w234234234234234),
                            title: "imageCarosul",
                            description: "float",
                            tags:["cat", "hat"]
                        ]
                    }
                },
            ]
        }
    ]
}
</script>