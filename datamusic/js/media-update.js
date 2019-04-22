"use strict";

$(document).ready (function ()
{
    /* Fill selects */
    getMusicalGenres ();
    getMediaTypes ();
    getLanguages ();
    
    /* Calls data */
    let media_id = $("input#media_id").val ();
    getMediaData (media_id);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

function getMediaData (media_id)
{
    $.ajax (
    {
        type: "GET",
        data: "media_id=" + media_id,
        url: "../../private/media-select-unique.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        /* Filling fields */
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
        $("div#modal_fail div.modal-header h4.modal-title b").html ("Attention");
        $("div#modal_fail div.modal-body").html ("System error, please try later or contact the administrator");
        $("div#modal_fail").modal();
    });
}

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
            $("div#modal_fail div.modal-header h4.modal-title b").html ("Attention");
            $("div#modal_fail div.modal-body").html ("System error, please try later or contact the administrator");
            $("div#modal_fail").modal();
        }

    }).fail (function ()
    {
        $("div#modal_fail div.modal-header h4.modal-title b").html ("Attention");
        $("div#modal_fail div.modal-body").html ("System error, please try later or contact the administrator");
        $("div#modal_fail").modal();
    });
}