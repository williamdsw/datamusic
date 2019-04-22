"use strict";

$(document).ready (function ()
{
    /* Fill selects */
    getAccessoryTypes ();
    
    /* Calls data */
    let accessory_id = $("input#accessory_id").val ();
    getAccessoryData (accessory_id);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

function getAccessoryData (accessory_id)
{
    $.ajax (
    {
        type: "GET",
        data: "accessory_id=" + accessory_id,
        url: "../../private/accessory-select-unique.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        /* Filling fields */
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