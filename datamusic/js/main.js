"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    // Links
    $("a#link_brand").attr ("href", "#");
    $("a#link_accessory_create").attr ("href", "accessory/create");
    $("a#link_accessory_search").attr ("href", "accessory/search");
    $("a#link_instrument_create").attr ("href", "instrument/create");
    $("a#link_instrument_search").attr ("href", "instrument/search");
    $("a#link_media_create").attr ("href", "media/create");
    $("a#link_media_search").attr ("href", "media/search");
    $("a#link_logout").attr ("href", "private/logout.php");
    
    getLastAccessories ();
});

/**
 * Get last five accessories
 */
function getLastAccessories ()
{
    $.ajax (
    {
        type: "GET",
        data: "column=&content=&last=true",
        url: "private/accessory-select.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        if (data.length !== 0)
        {
            let template = "";
            
            // Table's template
            $.each (data, function (index, value)
            {
                template += `<li class="item">`;
                template += `<a href="accessory/update?accessory_id=${value.accessory_id}" title="${value.name}"> ${value.name} </a>`;
                template += `</li>`;
            });
            
            $("ul#last_accessories").html (template);
        }
        else 
        {
            $("ul#last_accessories").html (`<li class="item"> No accessories found </li>`);
        }
        
    }).fail (function ()
    {
       $("ul#last_accessories").html (`<li class="item"> System error, try later </li>`);
    }).always (function ()
    {
        getLastInstruments ();
    });
}

/**
 * Get last five instruments
 */
function getLastInstruments ()
{
    $.ajax (
    {
        type: "GET",
        data: "column=&content=&last=true",
        url: "private/instrument-select.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        if (data.length !== 0)
        {
            let template = "";
            
            // Table's template
            $.each (data, function (index, value)
            {
                template += `<li class="item">`;
                template += `<a href="instrument/update?instrument_id=${value.instrument_id}" title="${value.name}"> ${value.name} </a>`;
                template += `</li>`;
            });
            
            $("ul#last_instruments").html (template);
        }
        else 
        {
            $("ul#last_instruments").html (`<li class="item"> No instruments found </li>`);
        }
        
    }).fail (function ()
    {
       $("ul#last_instruments").html (`<li class="item"> System error, try later </li>`);
    }).always (function ()
    {
        getLastMedia ();
    });
}

/**
 * Get last five media
 */
function getLastMedia ()
{
    $.ajax (
    {
        type: "GET",
        data: "column=&content=&last=true",
        url: "private/media-select.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        if (data.length !== 0)
        {
            let template = "";
            
            // Table's template
            $.each (data, function (index, value)
            {
                template += `<li class="item">`;
                template += `<a href="media/update?media_id=${value.media_id}" title="${value.name + " - " +  value.artist}"> ${value.name + " - " +  value.artist} </a>`;
                template += `</li>`;
            });
            
            $("ul#last_media").html (template);
        }
        else 
        {
            $("ul#last_media").html (`<li class="item"> No media found </li>`);
        }
        
    }).fail (function ()
    {
       $("ul#last_media").html (`<li class="item"> System error, try later </li>`);
    }).always (function ()
    {
        callCounter ();
    });
}

/**
 * Refresh the query every 30 seconds
 */
function callCounter ()
{
    let counter = 30;
    let timeout = 1000;
    let intervalID = setInterval (function ()
    {
        $("h4#counter").text (`Refreshing in ${counter} seconds`);
        counter--;
        
        if (counter === 0)
        {
            counter = 30;
            $("h4#counter").text ("Updating...");
            getLastAccessories ();
            clearInterval (intervalID);
        }
    }, timeout);
}