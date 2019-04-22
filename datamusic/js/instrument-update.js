"use strict";

$(document).ready (function ()
{
    /* Fill selects */
    getInstrumentTypes ();
    
    /* Calls data */
    let instrument_id = $("input#instrument_id").val ();
    getInstrumentData (instrument_id);
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        update ($(this));
    });
});

function getInstrumentData (instrument_id)
{
    $.ajax (
    {
        type: "GET",
        data: "instrument_id=" + instrument_id,
        url: "../../private/instrument-select-unique.php",
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
            $("select#state").val (data.state);
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