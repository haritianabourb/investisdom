function Task6_HideFieldsForInvestorsAndIntermediaries() {
    if (!(window.location.href.indexOf("investors") != -1 ||
            window.location.href.indexOf("intermediaries") != -1))
        return;
    var elementsToHide = [
        "[name=name]",
        "[name=registration_entities_id]",
        "[name=registration_city]",
        "[name=started_at]",
        "[name=capital]",
        "[name=registered_key]",
        "[name=etablishment_code]"
    ].join(", "); //getting selector string for jQuery
    $("[name=nature_entities_id]").change(function() {

        if (this.value == "2") { //Société, show fields
            $(elementsToHide)
                .parent().show("fast");
            // $("[name=capital]").prop("required", true);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
            // $("[name=capital]").prop("required", false);
        }
    });

    if ($("[name=nature_entities_id]").val() == "2") { //setting default visibility
        $("#option-nature-entities-id-1").click();
        $("#option-nature-entities-id-2").click();
    } else {
        $("#option-nature-entities-id-2").click();
        $("#option-nature-entities-id-1").click();
    }
}
function Task4_IsReplacement() {
    if (!(window.location.href.indexOf("mandat") != -1))
        return;
    var elementsToHide = [
        "[name=montant_remplacement]"
    ].join(", "); //getting selector string for jQuery

    $("[name=is_remplacement]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
                .parent().fadeTo("fast", 1);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().fadeTo("fast", 0);
        }
    });

    $("[name=is_remplacement]").trigger('change'); //setting default visibility

}

function Task4_IsRepriseFournisseur() {
    if (!(window.location.href.indexOf("mandat") != -1))
        return;
    var elementsToHide = [
        "[name=montant_reprise_fournisseur]"
    ].join(", "); //getting selector string for jQuery

    $("[name=is_reprise_fournisseur]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
                .parent().fadeTo("fast", 1);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().fadeTo("fast", 0);
        }
    });

    $("[name=is_reprise_fournisseur]").trigger('change'); //setting default visibility

}




function Task29_AssistanceJuridique() {
    if (!(window.location.href.indexOf("reservations") != -1))
        return;
    var elementsToHide = [
        "[name=type_aj]"
    ].join(", "); //getting selector string for jQuery

    $("[name=assistance_juridique]").change(function() {
        if (this.checked) { //Oui, show fields
            $(elementsToHide)
                .parent().addClass("opacity1").fadeTo("fast", 1);

        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().removeClass("opacity1").fadeTo("fast", 0);
        }

        $("[name=type_aj]").trigger("change");
    });

    $("[name=assistance_juridique]").trigger('change'); //setting default visibility
    

}

function Task29_ToggleReductionAj() {
    if (!(window.location.href.indexOf("reservations") != -1))
        return;
    var elementsToHide = [
        "[name=taux_ponctuel]"
    ].join(", "); //getting selector string for jQuery

    $("[name=type_aj]").change(function() {
        if ((this.value == "ponctuel") && ($(this).parent().hasClass("opacity1"))) { //Ponctuel, show fields
            $(elementsToHide)
                .parent().show("fast");
            // $("[name=capital]").prop("required", true);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
            // $("[name=capital]").prop("required", false);
        }
    });

    $("[name=type_aj]").trigger("change");
}



function Task24_Network() {
    // if (!(window.location.href.indexOf("reservations") != -1))
    //     return;
    var elementsToHide = [
        "[name=network_yes]"
    ].join(", "); //getting selector string for jQuery

    $("[name=network]").change(function() {
        if ((this.value == "oui")) { //show fields
            $(elementsToHide)
                .parent().show("fast");
            // $("[name=capital]").prop("required", true);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
            // $("[name=capital]").prop("required", false);
        }
    });

    $("[name=network]").trigger("change");
}


$(document).ready(function() {

    Task6_HideFieldsForInvestorsAndIntermediaries();
    // Task5_HideFieldsForMandat();
    Task4_IsReplacement();
    Task4_IsRepriseFournisseur();
    Task29_AssistanceJuridique();
    Task29_ToggleReductionAj();
    Task24_Network();

    $(document).on('hidden.bs.modal', '.modal', function (event) {
      if($('.modal.in').length > 0){
        $('body').addClass('modal-open');
      }
      // $('.modal.in').css('overflow-y', 'auto');
    });

    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

});
