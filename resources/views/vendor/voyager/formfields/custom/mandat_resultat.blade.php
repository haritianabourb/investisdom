@if(!is_null($dataTypeContent->getKey()))
<?php
// XXX $dataTypeContent equals to model
// XXX $row represent field type in BREAD (here "resultats" from model)
$resultat = json_decode($dataTypeContent->{$row->field});
?>
<div class="panel panel-primary panel-bordered">
  <div class="panel-body">
      @isset($resultat->loan_amount)
      <p class="lead">Montant du credit: {{number_format($resultat->loan_amount, 2, ",", " ")}} &euro;</p>
      @endisset
      @isset($resultat->base_defiscalisable)
      <p class="lead">Base éligible: {{number_format($resultat->base_defiscalisable, 2, ",", " ")}} &euro;</p>
      @endisset
      <hr/>
      @isset($resultat->tva_npr)
      <p class="lead">TVA NPR: {{number_format($resultat->tva_npr, 2, ",", " ")}} &euro;</p>
      @endisset
      @isset($resultat->ht_amount)
      <p class="lead">Montant H.T.: {{number_format($resultat->ht_amount, 2, ",", " ")}} &euro;</p>
      @endisset
      <hr/>
      @isset($resultat->ri_amount)
      <p class="lead text-primary">R&eacute;duction d'impôt: {{number_format($resultat->ri_amount, 2, ",", " ")}} &euro;</p>
      @endisset
      <hr/>
      @isset($resultat->ttc_amount)
      <p class="lead">Montant TTC: {{number_format($resultat->ttc_amount, 2, ",", " ")}} &euro;</p>
      @endisset
      <hr/>
      @isset($resultat->apport_net)
      <p class="lead text-primary">Apport Net: {{number_format($resultat->apport_net, 2, ",", " ")}} &euro;</p>
      @endisset
      <p class="lead text-primary">Taux de rétrocession: {{number_format($resultat->retrocession*100, 2, ",", " ")}} %</p>

      <table class="table table-responsive table-stripped">
        <tbody>
          @isset($resultat->term_pay)
          <tr>
            <td class="font-weight-bold">Echeance H.T.</td>
            <td class="text-right">{{number_format($resultat->term_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          @endisset
          @isset($resultat->term_pay_ttc)
          <tr>
            <td class="font-weight-bold">Echeance T.T.C.</td>
            <td class="text-right">{{number_format($resultat->term_pay_ttc, 2, ",", " ")}} &euro;</td>
          </tr>
          @endisset
          {{-- <tr>
            <td class="font-weight-bold">Fraix Judiciaire</td>
            <td class="text-right">{{number_format($resultat->juridical_fee, 2, ",", " ")}} &euro;</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Fraix Annexe</td>
            <td class="text-right">{{number_format($resultat->annexe_fee, 2, ",", " ")}} &euro;</td>
          </tr> --}}
          {{-- <tr>
            <td class="font-weight-bold">Taxe Globale</td>
            <td class="text-right">{{number_format($resultat->total_vat, 2, ",", " ")}} &euro;</td>
          </tr> --}}
          @isset($resultat->total_pay)
          <tr>
            <td class="font-weight-bold">Total des échéances</td>
            <td class="text-right">{{number_format($resultat->total_pay, 2, ",", " ")}} &euro;</td>
          </tr>
          @endisset
          {{-- <tr>
            <td class="font-weight-bold">Interêt à terme</td>
            <td class="text-right">{{number_format($resultat->total_interest, 2, ",", " ")}} &euro;</td>
          </tr> --}}
        </tbody>
      </table>

      @isset($resultat->van_paiement)
      <p class="lead text-primary">Valeur actualisée des débours: {{number_format($resultat->van_paiement, 2, ",", " ")}} &euro;</p>
      @endisset
      {{-- <p>Retrocession net: {{number_format($resultat->retrocession_net, 2, ",", " ")}} &euro;</p> --}}
  </div>

</div>
@endif
