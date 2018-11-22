@if(!is_null($dataTypeContent->getKey()))
<?php
// XXX $dataTypeContent equals to model
// XXX $row represent field type in BREAD (here "resultats" from model)
$resultat = json_decode($dataTypeContent->{$row->field});
?>
<div class="panel panel-primary panel-bordered">
  <div class="panel-body">
      <p class="lead">Montant du credit: {{number_format($resultat->loan_amount, 2, ",", " ")}} &euro;</p>
      <p class="lead">Base éligible: {{number_format($resultat->base_defiscalisable, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead">TVA NPR: {{number_format($resultat->tva_npr, 2, ",", " ")}} &euro;</p>
      <p class="lead">Montant H.T.: {{number_format($resultat->ht_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead text-primary">Retour sur Investissement: {{number_format($resultat->ri_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead">Montant TTC: {{number_format($resultat->ttc_amount, 2, ",", " ")}} &euro;</p>
      <hr/>
      <p class="lead text-primary">Apport Net: {{number_format($resultat->apport_net, 2, ",", " ")}} &euro;</p>
      <p class="lead text-primary">Taux de rétrocession: {{number_format($resultat->retrocession*100, 2, ",", " ")}} %</p>

      <table class="table table-responsive table-stripped">
        <tbody>
          <tr>
            <td class="font-weight-bold">Echeance H.T.</td>
            <td class="text-right">{{number_format($resultat->term_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Echeance T.T.C.</td>
            <td class="text-right">{{number_format($resultat->term_pay_ttc, 2, ",", " ")}} &euro;</td>
          </tr>
          {{-- <tr>
            <td class="font-weight-bold">Fraix Judiciaire</td>
            <td class="text-right">{{number_format($resultat->juridical_fee, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Fraix Annexe</td>
            <td class="text-right">{{number_format($resultat->annexe_fee, 2, ",", " ")}} &euro;</td>
          </tr> --}}
          <tr>
            <td class="font-weight-bold">Taxe Globale</td>
            <td class="text-right">{{number_format($resultat->total_vat, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Total des échéances</td>
            <td class="text-right">{{number_format($resultat->total_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          {{-- <tr>
            <td class="font-weight-bold">Interêt à terme</td>
            <td class="text-right">{{number_format($resultat->total_interest, 2, ",", " ")}} &euro;</td>
          </tr> --}}
        </tbody>
      </table>
      <p class="lead text-primary">Valeur actualisée des débours: {{number_format($resultat->van_paiement, 2, ",", " ")}} &euro;</p>
      {{-- <p>Retrocession net: {{number_format($resultat->retrocession_net, 2, ",", " ")}} &euro;</p> --}}
  </div>

</div>
@endif
