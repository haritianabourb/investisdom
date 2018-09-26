@if(!is_null($dataTypeContent->getKey()))
<?php
// XXX $dataTypeContent equals to model
// XXX $row represent field type in BREAD (here "resultats" from model)
$resultat = json_decode($dataTypeContent->{$row->field});
?>
<div class="panel panel-primary panel-bordered">
  <div class="panel-body">
      <p class="lead">Montant du credit: {{number_format($resultat->loan_amount, 2, ",", " ")}} &euro;</p>
      <p class="lead">Base éligible: {{number_format($resultat->taxe_base->tax_base, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead">TVA NPR: {{number_format($resultat->taxe_base->npr_vat, 2, ",", " ")}} &euro;</p>
      <p class="lead">Montant H.T.: {{number_format($resultat->taxe_base->ht_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead text-primary">Retour sur Investissement: {{number_format($resultat->taxe_base->ri_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead">Montant TTC: {{number_format($resultat->taxe_base->ttc_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead text-primary">Apport Net: {{number_format($resultat->net_intake->net_intake, 2, ",", " ")}} &euro;</p>
      <p class="lead text-primary">Taux de rétrocession: {{number_format($resultat->net_intake->retrocession*100, 2, ",", " ")}} %</p>

      <table class="table table-responsive table-stripped">
        <tbody>
          <tr>
            <td class="font-weight-bold">Echeance H.T.</td>
            <td class="text-right">{{number_format($resultat->summary->term_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Echeance T.T.C.</td>
            <td class="text-right">{{number_format($resultat->summary->term_pay_ttc, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Fraix Judiciaire</td>
            <td class="text-right">{{number_format($resultat->summary->legal_fee, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Fraix Annexe</td>
            <td class="text-right">{{number_format($resultat->summary->annexe_fee, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Taxe Globale</td>
            <td class="text-right">{{number_format($resultat->summary->total_vat, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Paiement à terme</td>
            <td class="text-right">{{number_format($resultat->summary->total_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Interêt à terme</td>
            <td class="text-right">{{number_format($resultat->summary->total_interest, 2, ",", " ")}} &euro;</td>
          </tr>
        </tbody>
      </table>
      <p class="lead text-primary">Valeur Nette Actuelle de l'investissement: {{number_format($resultat->npv, 2, ",", " ")}} &euro;</p>
      <p>Retrocession net: {{number_format($resultat->other->retro_net, 2, ",", " ")}} &euro;</p>
  </div>

</div>
@endif
