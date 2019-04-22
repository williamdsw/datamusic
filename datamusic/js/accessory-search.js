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
        url: "../../private/accessory-select.php",
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
                template += `<tr class="accessory_row">`;
                template += `<td><input type="radio" name="accessory_id" value="${value.accessory_id}"></td>`;
                template += `<td class="td-ellipsis" title="${value.name}">${value.name}</td>`;
                template += `<td class="td-ellipsis" title="${value.description}">${value.description}</td>`;
                template += `<td class="td-ellipsis" title="${value.brand}">${value.brand}</td>`;
                template += `<td>${value.type}</td>`;
                template += `<td>${value.price}</td>`;
                template += `<td>${value.quantity}</td>`;
                template += `<td>${value.last_changed}</td>`;
                template += `</tr>`;
            });
            
            /* Pass template */
            $("table#table_accessory tbody").html (template);
            
            /* Each radio button */
            $("input[name=accessory_id]").each (function (index, element)
            {
                $(element).click (function (ev)
                {
                    let accessory_id = $(this).val ();
                    let accessory_row = $(this).parent ("td").parent ("tr.accessory_row");
                    
                    $("a#btn_update").attr ("href", "../update?accessory_id=" + accessory_id);
                    $("a#btn_update").removeClass ("disabled");
                    $("a#btn_delete").removeClass ("disabled");
                    $("a#btn_delete").click ("click", function (ev)
                    {
                        ev.preventDefault ();
                        callModalConfirm (accessory_id, accessory_row);
                    });
                });
            });
        }
        else 
        {
            let template = `<tr><td colspan="11"> No records found </td></tr>`;
            $("table#table_accessory tbody").html (template);
        }
        
    }).fail (function ()
    {
        $("div#modal_fail div.modal-header h4.modal-title b").html ("Attention");
        $("div#modal_fail div.modal-body").html ("System error, please try later or contact the administrator");
        $("div#modal_fail").modal();
    });
}


function callModalConfirm (accessory_id, accessory_row)
{
    $("div#modal_operation div.modal-header h4.modal-title b").html ("Exclusion");
    $("div#modal_operation div.modal-body").html ("Do you want to delete the record?");
    
    $("div#modal_operation div.modal-footer button.btn.btn-success").unbind ("click").bind ("click", function ()
    {
        deleteAccessory (accessory_id, accessory_row);
    });
    
    $("div#modal_operation").modal ();
}

function deleteAccessory (accessory_id, accessory_row)
{
    $.ajax (
    {
        type: "POST",
        data: "accessory_id=" + accessory_id,
        url: "../../private/accessory-delete.php",
        async: true
    }).done (function (data)
    {
        data = $.parseJSON (data);

        if (data.success)
        {
            /* Remove row from table */
            $(accessory_row).remove ();
            
            if ($("tr.accessory_row").length === 0)
            {
                let template = `<tr><td colspan="11"> No records found </td></tr>`;
                $("table#table_accessory tbody").html (template);
            }
            
            /* Reset buttons */
            $("a#btn_update").attr ("href", "");
            $("a#btn_update").addClass ("disabled");
            $("a#btn_delete").addClass ("disabled");
            
            /* Call modal */
            $("div#modal_success div.modal-header h4.modal-title b").html ("Success");
            $("div#modal_success div.modal-body").html ("Accessory deleted successfully");
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
