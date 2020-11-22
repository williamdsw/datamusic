"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    getAccessoryTypes ();
    
    // Gets data
    let accessoryID = $("input#accessory_id").val ();
    getAccessoryData (accessoryID);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

/**
 * Gets the accessory data by ID
 */
function getAccessoryData (accessoryID)
{
    $.ajax (
    {
        type: "GET",
        data: `accessory_id=${accessoryID}`,
        url: "../../private/accessory-select-unique.php",
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
        url: "../../private/accessory-update.php",
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