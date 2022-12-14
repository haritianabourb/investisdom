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
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
        }
    });

    $("[name=nature_entities_id]").val($("[name=nature_entities_id]").val() === null ? "1" : $("[name=nature_entities_id]").val()).trigger('change');

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


function Task27_madame() {
    // if (!(window.location.href.indexOf("reservations") != -1))
    //     return;
    var elementsToHide = [
        "[name=name_jeunefille_invest]"
    ].join(", "); //getting selector string for jQuery

    $("[name=civilite]").change(function() {
        if ((this.value == "madame") || (this.value == "mademoiselle")) { // show fields
            $(elementsToHide)
                .parent().show("fast");
            // $("[name=capital]").prop("required", true);
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
            // $("[name=capital]").prop("required", false);
        }
    });

    $("[name=civilite]").trigger("change");
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

function Task31_RegimeMatrimonal() {
    if (!(window.location.href.indexOf("investors") != -1))
        return;

    var elementsToHide = "[name$=_conjoint]";

    $("[name=regime_mat_invest]").change(function() {
        if ((this.value == "02") || (this.value=="03") || (this.value=="04"))
        {//show fields
            $(elementsToHide)
                .parent().show("fast");
        } else { //otherwise, hide fields
            $(elementsToHide).val("")
                .parent().hide("fast");
        }
    });

    $("[name=regime_mat_invest]").trigger("change");
}

function Task101_PVTECH() {

    $("[name=type_contrats_id]").change(function(){
        if (this.value == "2" || this.value == "4" || this.value == "5" || this.value == "6")
        {
            $("[name=paiement]").val("echelonne");

            $("[name=paiement] option[value=unique]").prop("disabled", true);

        }else{
            $("[name=paiement] option[value=unique]").prop("disabled", false);
        }

        $("[name=paiement]").trigger("change");
    });

    $("[name=paiement]").change(function() {
        if (this.value == "unique")
        {
            $("[name=mode_paiement]").parent().show("fast");

        } else {

            $("[name=mode_paiement]").val("prelevement");
            $("[name=mode_paiement]").trigger("change");
            $("[name=mode_paiement]").parent().hide("fast");

        }
        // $("[name=type_contrats_id]").select2();
    });

    $("[name=type_contrats_id]").trigger("change");
    $("[name=paiement]").trigger("change");
}




$(document).ready(function() {

    Task6_HideFieldsForInvestorsAndIntermediaries();
    // Task5_HideFieldsForMandat();
    Task4_IsReplacement();
    Task4_IsRepriseFournisseur();
    Task29_AssistanceJuridique();
    Task29_ToggleReductionAj();
    Task24_Network();
    Task27_madame();
    Task31_RegimeMatrimonal();
    Task101_PVTECH();

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

    $('.panel-collapse').unbind('hide.bs.collapse');

    $('.panel-collapse').on('hide.bs.collapse', function(e) {
        var target = $(e.target);
        if (!target.is('a')) {
            target = target.parent();
        }
        if (!target.hasClass('collapsed')) {
            return;
        }
        e.stopPropagation();
        e.preventDefault();
    });

});
