function Task6_HideFieldsForInvestorsAndIntermediaries() {
    if (!(window.location.href.indexOf("investors")!=-1 ||
        window.location.href.indexOf("intermediaries")!=-1))
        return;
    var elementsToHide=[
        "[name=name]",
        "[name=registration_entities_id]",
        "[name=registration_city]",
        "[name=started_at]",
        "[name=capital]",
        "[name=registered_key]",
        "[name=etablishment_code]"
    ].join(", "); //getting selector string for jQuery
    $("[name=nature_entities_id]").change(function() {

        if (this.value=="2") { //Société, show fields
            $(elementsToHide)
            .parent().show("fast");
            // $("[name=capital]").prop("required", true);
        }

        else { //otherwise, hide fields
            $(elementsToHide).val("")
            .parent().hide("fast");
            // $("[name=capital]").prop("required", false);
        }
    });

    if ($("[name=nature_entities_id]").val()=="2") { //setting default visibility
        $("#option-nature-entities-id-1").click();
        $("#option-nature-entities-id-2").click();
    }

    else {
        $("#option-nature-entities-id-2").click();
        $("#option-nature-entities-id-1").click();
    }
}

function Task5_HideFieldsForMandat() {
    if (!(window.location.href.indexOf("mandat")!=-1))
        return;
    var elementsToHide=[
        "[name=type_subvention]",
        "[name=montant_subvention]",
        "[name=other_subvention]"
    ].join(", "); //getting selector string for jQuery

    $("[name=is_subvention]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
            .parent().show("fast");
        }

        else { //otherwise, hide fields
            $(elementsToHide).val("")
            .parent().hide("fast");
        }
    });

    $("[name=is_subvention]").trigger('change'); //setting default visibility

}


function Task2_HideImmatriculationMandat() {
    if (!(window.location.href.indexOf("mandat")!=-1))
        return;
    var elementsToHide=[
        "[name=genre_vehicle]",
        "[name=marque_vehicle]",
        "[name=type_vehicle]"
    ].join(", "); //getting selector string for jQuery

    $("[name=immatriculation_materiel]").change(function() {
        if (this.value=="Oui") { //Oui, show fields
            $(elementsToHide)
            .parent().show("fast");
        }

        else { //otherwise, hide fields
            $(elementsToHide).val("")
            .parent().hide("fast");
        }
    });

    $("[name=immatriculation_materiel]").trigger('change');
}


function Task4_IsReplacement() {
    if (!(window.location.href.indexOf("mandat")!=-1))
        return;
    var elementsToHide=[
        "[name=montant_remplacement]"
    ].join(", "); //getting selector string for jQuery

    $("[name=is_remplacement]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
            .parent().fadeTo("fast",1);
        }

        else { //otherwise, hide fields
            $(elementsToHide).val("")
            .parent().fadeTo("fast",0);
        }
    });

    $("[name=is_remplacement]").trigger('change'); //setting default visibility

}



function Task4_IsRepriseFournisseur() {
    if (!(window.location.href.indexOf("mandat")!=-1))
        return;
    var elementsToHide=[
        "[name=montant_reprise_fournisseur]"
    ].join(", "); //getting selector string for jQuery

    $("[name=is_reprise_fournisseur]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
            .parent().fadeTo("fast",1);
        }

        else { //otherwise, hide fields
            $(elementsToHide).val("")
            .parent().fadeTo("fast",0);
        }
    });

    $("[name=is_reprise_fournisseur]").trigger('change'); //setting default visibility

}


// function Task3_MandatRenouvellement() {
//     if (!(window.location.href.indexOf("mandat")!=-1))
//         return;
//     var elementsToHide=[
//         "[name=motivation]"
//     ].join(", "); //getting selector string for jQuery
//
//     $("[name=renouvellement]").change(function() {
//         if (this.value=="2") { //Motivé, show fields
//             $(elementsToHide)
//             .parent().fadeTo("fast",1);
//         }
//
//         else { //otherwise, hide fields
//             $(elementsToHide).val("")
//             .parent().fadeTo("fast",0);
//         }
//     });
//
//     $("[name=renouvellement]").trigger('change');
// }



$(document).ready(function() {

        Task6_HideFieldsForInvestorsAndIntermediaries();
        Task5_HideFieldsForMandat();
        Task4_IsReplacement();
        Task4_IsRepriseFournisseur();
        // Task3_MandatRenouvellement();
        Task2_HideImmatriculationMandat();
});
