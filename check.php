<?php
session_start();
$cc_ist = $_GET['cc'];
$vname=$_GET['name'];
$nname=$_GET['personen'];
$mail=$_GET['mail'];
$check=false;

$cc_soll=$_SESSION['rand_code'];
if ($cc_ist == $cc_soll){
	# Bitte passen Sie die folgenden Werte an, bevor Sie das Script benutzen!
	
	# An welche Adresse sollen die Mails gesendet werden?
	$strEmpfaenger = 'info@der-gaumenschmaus.de';
	
	# Welche Adresse soll als Absender angegeben werden?
	# (Manche Hoster lassen diese Angabe vor dem Versenden der Mail ueberschreiben)
	$strFrom       = '"Webseitenanfrage" <noreplay@der-gaumenschmaus.de>';
	
	# Welchen Betreff sollen die Mails erhalten?
	$strSubject    = 'Reservierungsanfrage von der Webseite';
	
	# Zu welcher Seite soll als "Danke-Seite" weitergeleitet werden?
	# Wichtig: Sie muessen hier eine gueltige HTTP-Adresse angeben!
	$strReturnhtml = '/reservierung.html';
	
	# Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
	$strDelimiter  = ":\t";
	### Ende Konfiguration ###
	if($_GET)
	{
	 $strMailtext = "";
	
	 while(list($strName,$value) = each($_GET))
	 {
	  if(is_array($value))
	  {
	   foreach($value as $value_array)
	   {
		   if($strName!="cc"){
				$strMailtext .= $strName.$strDelimiter.$value_array."\n";
		   }
	   }
	  }
	  else
	  {
	   $strMailtext .= $strName.$strDelimiter.$value."\n";
	  }
	 }
	
	 if(get_magic_quotes_gpc())
	 {
	  $strMailtext = stripslashes($strMailtext);
	 }
	
	 mail($strEmpfaenger, $strSubject, $strMailtext, "From: ".$strFrom);
	 mail("info@der-gaumenschmaus.de", $strSubject, $strMailtext, "From: ".$strFrom);
	 //exit;
	}
	  $check = "Vielen Dank! \nwir haben Ihre Nachricht erhalten und werden sie schnellstmöglich bearbeiten.\nIhr Gaumenschmaus.";
}else{
	$check= "Die aufgabe wurde nicht richtig gelöst!";
}
echo $check;
?>