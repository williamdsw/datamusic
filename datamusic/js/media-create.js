"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    getMusicalGenres ();
    getMediaTypes ();
    getLanguages ();
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        insert ($(this));
    });
});

/**
 * Insert the form data into the table
 */
function insert (form)
{
    $.ajax (
    {
        type: "POST",
        data: form.serialize (),
        url: "../../private/media-insert.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            $("div#modal_success div.modal-header h4.modal-title b").html ("Success");
            $("div#modal_success div.modal-body").html ("Media created successfully");
            $("div#modal_success").modal ();
            $("button#btn_reset").click ();
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