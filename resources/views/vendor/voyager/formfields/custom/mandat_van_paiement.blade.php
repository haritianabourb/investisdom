@if(!is_null($dataTypeContent->getKey()))
<?php
// XXX $dataTypeContent equals to model
// XXX $row represent field type in BREAD (here "resultats" from model)
$van_paiements = json_decode($dataTypeContent->{$row->field});
// var_dump($van_paiements);
?>
{{-- {{ dd($dataTypeContent->{$row->field}) }} --}}

<table class="table table-responsive table-bordered table-stripped">
  <thead>
    <tr>
      <td colspan="5" class="text-center bg-primary text-white">Ventilation de la valeur net actuelle</td>
    </tr>
    <tr>
      <td># periode</td>
      <td class="text-center">paiement</td>
      <td class="text-center">interet</td>
      <td class="text-center">principal</td>
      <td class="text-center">balance</td>
    </tr>
  </thead>
  <tbody>
    <?php
      $total_payment = $total_interest = $total_balance = $total_principal =  0;
    ?>
    @foreach ($van_paiements as $van_paiement)
      <?php
        $total_payment += $van_paiement->payment;
        $total_interest += $van_paiement->interest;
        $total_balance += $van_paiement->principal;
        $total_principal +=  $van_paiement->balance;
      ?>
      <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td class="text-center">{{number_format($van_paiement->payment, 2, ",", " ")}} &euro;</td>
        <td class="text-center">{{number_format($van_paiement->interest, 2, ",", " ")}} &euro;</td>
        <td class="text-center">{{number_format($van_paiement->principal, 2, ",", " ")}} &euro;</td>
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
