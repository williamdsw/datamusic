"use strict";

$(document).ready (function ()
{
    searchRecords ("", "");
    
    /* Search */
    $("button#btn_search").click (function ()
    {
        let column = $("select#column").val ();
        let content = $("input#content").val ();
        searchRecords (column, content);
    });
});

function searchRecords (column, content)
{
    $.ajax (
    {
        type: "GET",
        data: "column=" + column + "&content=" + content + "&last=",
        url: "../../private/media-select.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);
        
        if (data.length !== 0)
        {
            let template = "";
            
            /* table template */
            $.each (data, function (index, value)
            {
                template += `<tr class="media_row">`;
                template += `<td><input type="radio" name="media_id" value="${value.media_id}"></td>`;
                template += `<td class="td-ellipsis" title="${value.name}">${value.name}</td>`;
                template += `<td class="td-ellipsis" title="${value.artist}">${value.artist}</td>`;
                template += `<td class="td-ellipsis" title="${value.description}">${value.description}</td>`;
                template += `<td>${value.genre}</td>`;
                template += `<td>${value.type}</td>`;
                template += `<td>${value.state}</td>`;
                template += `<td>${value.price}</td>`;
                template += `<td>${value.quantity}</td>`;
                template += `<td>${value.language}</td>`;
                template += `<td>${value.last_changed}</td>`;
                template += `</tr>`;
            });
            
            /* Pass template */
            $("table#table_media tbody").html (template);
            
            /* Each radio button */
            $("input[name=media_id]").each (function (index, element)
            {
                $(element).click (function (ev)
                {
                    let media_id = $(this).val ();
                    let media_row = $(this).parent ("td").parent ("tr.media_row");
                    
                    $("a#btn_update").attr ("href", "../update?media_id=" + media_id);
                    $("a#btn_update").removeClass ("disabled");
                    $("a#btn_delete").removeClass ("disabled");
                    $("a#btn_delete").click ("click", function (ev)
                    {
                        ev.preventDefault ();
                        callModalConfirm (media_id, media_row);
                    });
                });
            });
        }
        else 
        {
            let template = `<tr><td colspan="11"> No records found </td></tr>`;
            $("table#table_media tbody").html (template);
        }
        
    }).fail (function ()
    {
        $("div#modal_fail div.modal-header h4.modal-title b").html ("Attention");
        $("div#modal_fail div.modal-body").html ("System error, please try later or contact the administrator");
        $("div#modal_fail").modal();
    });
}


function callModalConfirm (media_id, media_row)
{
    $("div#modal_operation div.modal-header h4.modal-title b").html ("Exclusion");
    $("div#modal_operation div.modal-body").html ("Do you want to delete the record?");
    
    $("div#modal_operation div.modal-footer button.btn.btn-success").unbind ("click").bind ("click", function ()
    {
        deleteMedia (media_id, media_row);
    });
    
    $("div#modal_operation").modal ();
}

function deleteMedia (media_id, media_row)
{
    $.ajax (
    {
        type: "POST",
        data: "media_id=" + media_id,
        url: "../../private/media-delete.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            /* Remove row from table */
            $(media_row).remove ();
            
            /* Reset buttons */
            $("a#btn_update").attr ("href", "");
            $("a#btn_update").addClass ("disabled");
            $("a#btn_delete").addClass ("disabled");
            
            /* Call modal */
            $("div#modal_success div.modal-header h4.modal-title b").html ("Success");
            $("div#modal_success div.modal-body").html ("Media deleted successfully");
            $("div#modal_success").modal();
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
