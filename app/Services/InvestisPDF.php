<?php

namespace App\Services;

// use Codedge\Fpdf\Fpdf\Fpdf;
use Mpdf\Mpdf as Fpdf;
use Voyager;

class InvestisPDF extends FPDF {

  function Header($content = '')
  	{
      // Logo
      $this->Image(resource_path('assets/images/logo2.jpg'),10,6,72);
      // Police Arial gras 15
      $this->SetFont('Arial','B',15);
      // Décalage à droite
      $this->Cell(80);
      // Saut de ligne
      $this->Ln(20);
  	}

  // Pied de page
  function Footer()
  {
      // Positionnement à 1,5 cm du bas
  	$this->Line(10,285,200,285);
      $this->SetY(-10);
      // Police Arial italique 8
      $this->SetFont('Arial','I',8);
  	$this->SetTextColor(0,0,0);
      // Numéro de page
      //$this->MultiCell(0,5,'Page '.$this->PageNo().'/{nb}',0,'C',0);
  	$this->SetFont('Arial','',6);
  	$this->SetTextColor(0,0,0);
  	$this->MultiCell(0,5,utf8_decode("INVESTIS DEFISCALISATION OUTRE MER, SAS au capital de 10 000 euros, immatriculée au RCS de Saint Denis sous le numméro 820 090 652\n62 Boulevard du chaudron - 97490 - SAINTE CLOTILDE\n"),0,'C',0);
  }

}
