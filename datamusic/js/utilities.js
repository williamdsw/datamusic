"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

/**
 * Fills the select with a list of accessory types
 */
function getAccessoryTypes ()
{
    $.ajax (
    {
        type: "GET",
        url: "../../files/accessory-types.txt",
        async: true
    }).done (function (data)
    {
        let types = data.split ("|");
        
        // Template
        let template = `<option value=""> * Choose an Accessory Type </option>`;
        $.each (types, function (index, value)
        {
            if (value !== "")
            {
                template += `<option value="${value}"> ${value} </option>`;    
            }
        });
        
        $("select#type").html (template);

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Fills the select with a list of instrument types
 */
function getInstrumentTypes ()
{
    $.ajax (
    {
        type: "GET",
        url: "../../files/instrument-types.txt",
        async: true
    }).done (function (data)
    {
        let types = data.split ("|");
        
        // Template
        let template = `<option value=""> * Choose an Instrument Type </option>`;
        $.each (types, function (index, value)
        {
            if (value !== "")
            {
                template += `<option value="${value}"> ${value} </option>`;    
            }
        });
        
        $("select#type").html (template);

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Fills the select with a list of languages
 */
function getLanguages ()
{
    $.ajax (
    {
        type: "GET",
        url: "../../files/languages.txt",
        async: true
    }).done (function (data)
    {
        let languages = data.split ("|");
        
        // Template
        let template = `<option value=""> Choose an Language </option>`;
        $.each (languages, function (index, value)
        {
            if (value !== "")
            {
                template += `<option value="${value}"> ${value} </option>`;    
            }
        });
        
        $("select#language").html (template);

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Fills the select with a list of media types
 */
function getMediaTypes ()
{
    $.ajax (
    {
        type: "GET",
        url: "../../files/media-types.txt",
        async: true
    }).done (function (data)
    {
        let types = data.split ("|");
        
        // Template
        let template = `<option value=""> * Choose an Media Type </option>`;
        $.each (types, function (index, value)
        {
            if (value !== "")
            {
                template += `<option value="${value}"> ${value} </option>`;    
            }
        });
        
        $("select#type").html (template);

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Fills the select with a list of musical genres
 */
function getMusicalGenres ()
{
    $.ajax (
    {
        type: "GET",
        url: "../../files/musical-genres.txt",
        async: true
    }).done (function (data)
    {
        let genres = data.split ("|");
        
        // Template
        let template = `<option value=""> * Choose an Musical Genre </option>`;
        $.each (genres, function (index, value)
        {
            if (value !== "")
            {
                template += `<option value="${value}"> ${value} </option>`;    
            }
        });
        
        $("select#genre").html (template);

    }).fail (function ()
    {
        showFailModal ();
    });
}

/**
 * Shows an fail modal
 */
function showFailModal(title, message) {
    title = (title || 'Attention');
    message = (message || 'System error, please try later or contact the administrator');

    const modal = document.querySelector('div#modal_fail');
    if (modal) {
        const header = modal.querySelector('.modal-title');
        const body = modal.querySelector('.modal-body');
        if (header && message) {
            header.textContent = title;
            body.textContent = message;
            $(modal).modal();
        }
    }
}