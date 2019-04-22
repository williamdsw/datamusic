"use strict";

$(document).ready (function ()
{
    getAccessoryTypes ();
    
    $("form#create_form").submit (function (ev)
    {
        ev.preventDefault ();
        insert ($(this));
    });
});

function insert (form)
{
    $.ajax (
    {
        type: "POST",
        data: form.serialize (),
        url: "../../private/accessory-insert.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            $("div#modal_success div.modal-header h4.modal-title b").html ("Success");
            $("div#modal_success div.modal-body").html ("Accessory created successfully");
            $("div#modal_success").modal();
            $("button#btn_reset").click ();
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