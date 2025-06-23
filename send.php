<?php
require('fpdf/fpdf.php');

// Dane z formularza
$name = $_POST['name'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];

// Tworzenie PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Karta pracy z ulamkow zwyklych',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
$pdf->Cell(0,10,'Imie i nazwisko: '.$name,0,1);
$pdf->Ln(5);
$pdf->Cell(0,10,'1. 3/4 + 2/5 = '.$q1,0,1);
$pdf->Cell(0,10,'2. 7/8 - 1/3 = '.$q2,0,1);
$pdf->Cell(0,10,'3. 5/6 * 2/7 = '.$q3,0,1);
$pdf->Cell(0,10,'4. 9/10 : 3/5 = '.$q4,0,1);
$pdf->Cell(0,10,'5. 4/9 + 1/6 = '.$q5,0,1);

$file = 'odpowiedz.pdf';
$pdf->Output('F', $file);

// Wysylka maila
$to = 'aleksandra.rapala18@gmail.com';
$subject = 'Nowa odpowiedz ucznia';
$message = 'W zalaczniku odpowiedzi ucznia: '.$name;
$separator = md5(time());
$eol = "\r\n";

$filename = $file;
$attachment = chunk_split(base64_encode(file_get_contents($file)));

// Naglowki maila
$headers = "From: quiz@twojadomena.pl".$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;

$body = "--".$separator.$eol;
$body .= "Content-Type: text/plain; charset=\"utf-8\"".$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= $message.$eol;

$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// Wyslanie maila
mail($to, $subject, $body, $headers);

echo "Odpowiedzi wyslane. Dziekujemy!";
?>
