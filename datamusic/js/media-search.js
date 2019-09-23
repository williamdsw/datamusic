"use strict";

//--------------------------------------------------------------------------------------//
// HELPER FUNCTIONS

$(document).ready (function ()
{
    searchRecords ("", "");
    
    // Search button
    $("button#btn_search").click (function ()
    {
        let column = $("select#column").val ();
        let content = $("input#content").val ();
        searchRecords (column, content);
    });
});

/**
 * Search records based on column's name and content
 */
function searchRecords (column, content)
{
    $.ajax (
    {
        type: "GET",
        data: `column=${column}&content=${content}&last=`,
        url: "../../private/media-select.php",
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
            
            $("table#table_media tbody").html (template);
            
            // Table's radio buttons
            $("input[name=media_id]").each (function (index, element)
            {
                $(element).click (function (ev)
                {
                    let id = $(this).val ();
                    let row = $(this).parent ("td").parent ("tr.media_row");
                    
                    $("a#btn_update").attr ("href", "../update?media_id=".concat (id));
                    $("a#btn_update").removeClass ("disabled");
                    $("a#btn_delete").removeClass ("disabled");
                    $("a#btn_delete").click ("click", function (ev)
                    {
                        ev.preventDefault ();
                        callConfirmModal (id, row);
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
        showFailModal ();
    });
}

/**
 * Calls the confirm modal on delete
 */
function callConfirmModal (id, row)
{
    $("div#modal_operation div.modal-header h4.modal-title b").html ("Exclusion");
    $("div#modal_operation div.modal-body").html ("Do you want to delete the record?");
    $("div#modal_operation div.modal-footer button.btn.btn-success").unbind ("click").bind ("click", function ()
    {
        deleteMedia (id, row);
    });
    
    $("div#modal_operation").modal ();
}

/**
 * Deletes the data by ID and deletes the row
 */
function deleteMedia (id, row)
{
    $.ajax (
    {
        type: "POST",
        data: `media_id=${id}`,
        url: "../../private/media-delete.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            // Removes the row
            $(row).remove ();

            if ($("tr.media_row").length === 0)
            {
                let template = `<tr><td colspan="11"> No records found </td></tr>`;
                $("table#table_media tbody").html (template);
            }
            
            // Reset buttons
            $("a#btn_update").attr ("href", "");
            $("a#btn_update").addClass ("disabled");
            $("a#btn_delete").addClass ("disabled");
            
            // Call success modal
            $("div#modal_success div.modal-header h4.modal-title b").html ("Success");
            $("div#modal_success div.modal-body").html ("Media deleted successfully");
            $("div#modal_success").modal ();
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