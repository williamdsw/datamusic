"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    $("form#login_form").submit (function (ev)
    {
        ev.preventDefault ();
        checkLogin ($(this));
    });
});

/**
 * Checks the user input for login
 */
function checkLogin (form)
{
    $.ajax (
    {
        type: "POST",
        data: form.serialize (),
        url: "private/user-login.php",
        async: false
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            createSessionRedirect (data);
        }
        else 
        {
            $("div#modal_fail div.modal-header h4.modal-title b").html ("Incorrect");
            $("div#modal_fail div.modal-body").html ("User or password incorrect. Try again");
            $("div#modal_fail").modal ();
        }

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Creates an user session based on data
 */
function createSessionRedirect (data)
{
    let user = JSON.stringify (data.user);

    $.ajax (
    {
        type: "POST",
        data: `user=${user}`,
        url: "private/create-session.php",
        async: false
    }).done (function (data)
    {
        window.location.replace ("main.php");
    }).fail (function ()
    {
        showFailModal ();
    });
}