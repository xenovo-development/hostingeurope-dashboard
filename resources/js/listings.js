/**
 * Theme: Hosting Europe -  Dashboard
 * Author: Emin Çomoğlu
 * Module/App: Data tables
 */

import bootstrap from 'bootstrap/dist/js/bootstrap.min';
import DataTable from "datatables.net";
$.fn.dataTable = DataTable;

import "datatables.net-bs5";

// import "datatables.net-buttons/js/buttons.flash";
let loadingModal = new bootstrap.Modal(document.getElementById('loading-modal'), {backdrop: 'static'});
let listingDiv = document.getElementById('listing_id');
let nameDiv = $('#listing_name');
$(document).ready(function () {
    "use strict";

    new DataTable('#listings-table', {
        responsive:true,
        scrollX:true,
        paging:true,
        stateSave:true,
        "language": {
            "paginate": {
                "previous": "<i class='ri-arrow-left-s-line'>",
                "next": "<i class='ri-arrow-right-s-line'>"
            }
        },
        "drawCallback": function () {
            $('#basic-datatable_paginate').addClass('pagination-rounded');
        }
    });
    $(document).on('submit', '#owner-form', function (e) {
        e.preventDefault();
        loadingModal.show();
        this.submit();
    });
    $(document).on('click', '#owner-link', function (e) {
        listingDiv.value = $(this).data('id');
        nameDiv.find('strong').remove();
        nameDiv.append('<strong class="text-info">' + $(this).data('name') + '</strong>');
    });
});

