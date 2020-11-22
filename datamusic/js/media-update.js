"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    getMusicalGenres ();
    getMediaTypes ();
    getLanguages ();
    
    // Gets data
    let mediaID = $("input#media_id").val ();
    getMediaData (mediaID);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

/**
 * Gets the accessory data by ID
 */
function getMediaData (mediaID)
{
    $.ajax (
    {
        type: "GET",
        data: `media_id=${mediaID}`,
        url: "../../private/media-select-unique.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        // Filling fields
        if (data.length !== 0)
        {
            $("input#name").val (data.name);
            $("input#artist").val (data.artist);
            $("textarea#description").val (data.description);
            $("select#genre").val (data.genre);
            $("select#language").val (data.language);
            $("input#price").val (data.price);
            $("input#quantity").val (data.quantity);
            $("select#state").val (data.state);
            $("select#type").val (data.type);
            $("input#year").val (data.year);
        }
    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Send the form data to update
 */
function update (form)
{
    $.ajax (
    {
        type: "POST",
        data: form.serialize (),
        url: "../../private/media-update.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            window.location.replace ("../search");
        }
        else 
        {
            showFailModal ();
        }

    }).fail (function ()
    {
        showFailModal ();
    });
}