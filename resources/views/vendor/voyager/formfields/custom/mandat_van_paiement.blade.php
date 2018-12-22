@if(!is_null($dataTypeContent->getKey()))
<?php
// XXX $dataTypeContent equals to model
// XXX $row represent field type in BREAD (here "resultats" from model)
$van_paiements = json_decode($dataTypeContent->{$row->field});
// var_dump($dataTypeContent->{$row->field}, $van_paiements);
?>
{{-- {{ dd($dataTypeContent->{$row->field}) }} --}}

@if(is_array($van_paiements))
<table class="table table-responsive table-bordered table-stripped">
  <thead>
    <tr>
      <td colspan="5" class="text-center bg-primary text-white">Ventilation de la valeur net actuelle</td>
    </tr>
    <tr>
      <td># periode</td>
      <td class="text-center">paiement</td>
      <td class="text-center">interet</td>
      <td class="text-center">capital</td>
      <td class="text-center">balance</td>
    </tr>
  </thead>
  <tbody>
    <?php
      $total_payment = $total_interest = $total_balance = $total_principal =  0;
    ?>

    @foreach ($van_paiements as $van_paiement)
        @isset($van_paiement->period)
          <?php
            try{
              $van_paiement->period = \Carbon\Carbon::createFromFormat("m/d/Y", $van_paiement->period)->format("d-m-Y");
            }catch(\InvalidArgumentException $e){
              $van_paiement->period  = $loop->iteration;
            }
          ?>
        @endisset
      <?php
        $total_payment += $van_paiement->payment;
        $total_interest += $van_paiement->interet;
        $total_balance += $van_paiement->capital??$van_paiement->principal?? 0;
        $total_principal +=  $van_paiement->balance;
      ?>
      <tr>
        @isset($van_paiement->period)
          <td class="text-center">{{$van_paiement->period}}</td>
        @endisset
        <td class="text-center">{{number_format($van_paiement->payment, 2, ",", " ")}} &euro;</td>
        <td class="text-center">{{number_format($van_paiement->interet, 2, ",", " ")}} &euro;</td>
        <td class="text-center">{{number_format($van_paiement->capital??$van_paiement->principal?? 0, 2, ",", " ")}} &euro;</td>
        <td class="text-center">{{number_format($van_paiement->balance, 2, ",", " ")}} &euro;</td>
      </tr>
    @endforeach
    <tr>
      <td>Totaux</td>
      <td class="text-center">{{number_format($total_payment, 2, ",", " ")}} &euro;</td>
      <td class="text-center">{{number_format($total_interest, 2, ",", " ")}} &euro;</td>
      <td class="text-center">{{number_format($total_balance, 2, ",", " ")}} &euro;</td>
      <td class="text-center bg-primary">&nbsp;</td>
    </tr>
  </tbody>
</table>
@endif
@endif
