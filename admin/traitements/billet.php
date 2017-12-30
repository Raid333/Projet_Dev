<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 26/12/2017
 * Time: 19:11
 */

require('../fpdf181/fpdf.php');
require ('../includes/pdo.php');
require('modeleUtilisateurs.php');
//Récupération des infos clients et affichage sur le pdf
$id = $_GET['user'];
$user = getUtilisateur($id);

class PDF_EAN13 extends FPDF
{
    function EAN13($x, $y, $barcode, $h=16, $w=.35)
    {
        $this->Barcode($x,$y,$barcode,$h,$w,13);
    }

    function UPC_A($x, $y, $barcode, $h=16, $w=.35)
    {
        $this->Barcode($x,$y,$barcode,$h,$w,12);
    }

    function GetCheckDigit($barcode)
    {
        //Calcule le chiffre de contrôle
        $sum=0;
        for($i=1;$i<=11;$i+=2)
            $sum+=3*$barcode[$i];
        for($i=0;$i<=10;$i+=2)
            $sum+=$barcode[$i];
        $r=$sum%10;
        if($r>0)
            $r=10-$r;
        return $r;
    }

    function TestCheckDigit($barcode)
    {
        //Vérifie le chiffre de contrôle
        $sum=0;
        for($i=1;$i<=11;$i+=2)
            $sum+=3*$barcode[$i];
        for($i=0;$i<=10;$i+=2)
            $sum+=$barcode[$i];
        return ($sum+$barcode[12])%10==0;
    }

    function Barcode($x, $y, $barcode, $h, $w, $len)
    {
        //Ajoute des 0 si nécessaire
        $barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
        if($len==12)
            $barcode='0'.$barcode;
        //Ajoute ou teste le chiffre de contrôle
        if(strlen($barcode)==12)
            $barcode.=$this->GetCheckDigit($barcode);
        elseif(!$this->TestCheckDigit($barcode))
            $this->Error('Incorrect check digit');
        //Convertit les chiffres en barres
        $codes=array(
            'A'=>array(
                '0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
                '5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
            'B'=>array(
                '0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
                '5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
            'C'=>array(
                '0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
                '5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
        );
        $parities=array(
            '0'=>array('A','A','A','A','A','A'),
            '1'=>array('A','A','B','A','B','B'),
            '2'=>array('A','A','B','B','A','B'),
            '3'=>array('A','A','B','B','B','A'),
            '4'=>array('A','B','A','A','B','B'),
            '5'=>array('A','B','B','A','A','B'),
            '6'=>array('A','B','B','B','A','A'),
            '7'=>array('A','B','A','B','A','B'),
            '8'=>array('A','B','A','B','B','A'),
            '9'=>array('A','B','B','A','B','A')
        );
        $code='101';
        $p=$parities[$barcode[0]];
        for($i=1;$i<=6;$i++)
            $code.=$codes[$p[$i-1]][$barcode[$i]];
        $code.='01010';
        for($i=7;$i<=12;$i++)
            $code.=$codes['C'][$barcode[$i]];
        $code.='101';
        //Dessine les barres
        for($i=0;$i<strlen($code);$i++)
        {
            if($code[$i]=='1')
                $this->Rect($x+$i*$w,$y,$w,$h,'F');
        }
        //Imprime le texte sous le code-barres
        $this->SetFont('Arial','',12);
        $this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
    }
}


// Instanciation de la classe dérivée

if ($user['codeBarre'] == 0) {
    $codeBarre = rand(000000000000, 999999999999);
    $rq = "UPDATE utilisateurs SET codeBarre = $codeBarre WHERE id = $id";
    $pdo->query($rq);
} else {
    $codeBarre = $user['codeBarre'];
}

$pdf=new PDF_EAN13();
$pdf->AddPage('L','A4');
$pdf->Image('logo.jpg',240,6,50);
$pdf->SetFont('Arial','B',25);
$pdf->Cell(100,10,'"J\'aime la techno"',1, 2,'C');
$pdf->SetFont('Arial',"",18);
$pdf->Cell(100,10,'Ile des Impressionistes | 78400 Chatou',0, 2,'L');
$pdf->Cell(100,10,'Du 25/08 au 30/08',0, 1,'L');
$pdf->SetFont('Arial',"",18);
$pdf->Cell(0,50,$user['nom'] . " " . $user['prenom'],0, 1,'L');
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,0,"1 personne",0, 1,'L');

$pdf->EAN13(250, 160, $codeBarre);
$pdf->Output('I',$user['nom'] . " " . $user['prenom']);
