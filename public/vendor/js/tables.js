function formhash(form) {
    addInput("nda_registration_no", form);
    addInput("license_holder", form);
    addInput("local_technical_representative", form);
    addInput("name_of_drug", form);
    addInput("generic_name_of_drug", form);
    addInput("strength_of_drug", form);
    addInput("manufacturer", form);
    addInput("country_of_manufacture", form);
    addInput("dosage_form", form);
    addInput("pack_size", form);
    form.submit();
}

function addInput(input, form) {
    var p = document.createElement("input");
    // Add the new element to our form.
    form.appendChild(p);
    p.name = input;
    p.type = "hidden";
    p.value = document.getElementById(input).value;
    return form;
}

(function ($) {
    'use strict';

    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            lengthChange: false,
            responsive:true,
            buttons: [
                'print', 'excel', 'pdf', 'colvis'
            ],
            select: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
        table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
        new FormWizard("#form-wizard-b");

    });
})(jQuery);

