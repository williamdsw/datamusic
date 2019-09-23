"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    getInstrumentTypes ();
    
    // Gets data
    let instrumentID = $("input#instrument_id").val ();
    getInstrumentData (instrumentID);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

/**
 * Gets the accessory data by ID
 */
function getInstrumentData (instrumentID)
{
    $.ajax (
    {
        type: "GET",
        data: `instrument_id=${instrumentID}`,
        url: "../../private/instrument-select-unique.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        // Filling fields
        if (data.length !== 0)
        {
            $("input#name").val (data.name);
            $("textarea#description").val (data.description);
            $("input#brand").val (data.brand);
            $("input#price").val (data.price);
            $("input#quantity").val (data.quantity);
            $("select#type").val (data.type);
            $("select#state").val (data.state);
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
        url: "../../private/instrument-update.php",
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