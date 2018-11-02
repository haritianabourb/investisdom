<?php

namespace App\Validators;

class SIRENValidator {

    const SIREN_LENGTH = 9;

    public function validate($attribute, $value, $parameters, $validator)
    {
        // dd($value, $parameters, $validator, $attribute, $this->is_siren($value));

        // XXX for now we get only the siren response as ok
        // Number are used for siren validation
        if($this->is_siren($value) === 0){
            return true;
        }

        return false;
    }

    // fonction permettant de contrôler la validité d'un numéro SIREN
    function is_siren($siren)
    {
      // XXX we make it here in order to save the siren length
      if (strlen($siren) != self::SIREN_LENGTH) return 1; // le SIREN doit contenir 9 caractères
      if (!is_numeric($siren)) return 2; // le SIREN ne doit contenir que des chiffres

      // on prend chaque chiffre un par un
      // si son index (position dans la chaîne en commence à 0 au premier caractère) est impair
      // on double sa valeur et si cette dernière est supérieure à 9, on lui retranche 9
      // on ajoute cette valeur à la somme totale
      $sum = 0;
      for ($index = 0; $index < self::SIREN_LENGTH; $index ++)
      {
        $number = (int) $siren[$index];
        if (($index % 2) != 0) { if (($number *= 2) > self::SIREN_LENGTH) $number -= self::SIREN_LENGTH; }
        $sum += $number;
      }

      // le numéro est valide si la somme des chiffres est multiple de 10
      if (($sum % 10) != 0) return 3; else return 0;
    }
}


// // fonction permettant de contrôler la validité d'un numéro SIRET
// function is_siret($siret)
// {
// 	if (strlen($siret) != 14) return 1; // le SIRET doit contenir 14 caractères
// 	if (!is_numeric($siret)) return 2; // le SIRET ne doit contenir que des chiffres
//
// 	// on prend chaque chiffre un par un
// 	// si son index (position dans la chaîne en commence à 0 au premier caractère) est pair
// 	// on double sa valeur et si cette dernière est supérieure à 9, on lui retranche 9
// 	// on ajoute cette valeur à la somme totale
//
// 	for ($index = 0; $index < 14; $index ++)
// 	{
// 		$number = (int) $siret[$index];
// 		if (($index % 2) == 0) { if (($number *= 2) > 9) $number -= 9; }
// 		$sum += $number;
// 	}
//
// 	// le numéro est valide si la somme des chiffres est multiple de 10
// 	if (($sum % 10) != 0) return 3; else return 0;
// }
//
// // fonction permettant de contrôler la validité d'un code-barres de type EAN-13
// function is_ean13($ean13)
// {
// 	if (strlen($ean13) != 13) return 1; // le code-barres doit contenir 13 caractères
// 	if (!is_numeric($ean13)) return 2; // le code-barres ne doit contenir que des chiffres
//
// 	// on prend chaque chiffre un par un
// 	// si son index (position dans la chaîne en commence à 0 au premier caractère) est impair
// 	// on triple sa valeur
// 	// on ajoute cette valeur à la somme totale
//
// 	for ($index = 0; $index < 12; $index ++)
// 	{
// 		$number = (int) $ean13[$index];
// 		if (($index % 2) != 0) $number *= 3;
// 		$sum += $number;
// 	}
//
// 	$key = $ean13[12]; // clé de contrôle égale au dernier chiffre
//
// 	// la clé de contrôle doit être égale à : 10 - (reste de la division de la somme des 12 premiers chiffres)
// 	if (10 - ($sum % 10) != $key) return 3; else return 0;
// }
