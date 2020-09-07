<?php
$regexGmail = '/^(.)+(@)+(gmail\.com)$/';
$regexYahoo = '/^(.)+(@)+(yahoo\.com)$/';
$regexYahooFr = '/^(.)+(@)+(yahoo\.fr)$/';
$regexOutlook = '/^(.)+(@)+(outlook\.com)$/';
$regexOutlookFr = '/^(.)+(@)+(outlook\.fr)$/';
$regexLive = '/^(.)+(@)+(live\.fr)$/';
$regexHotmail = '/^(.)+(@)+(hotmail\.fr)$/';
//Vérification du type d'adresse mail
if (preg_match($regexGmail, $mailbox)) {
    $hrefTitle = 'Gmail';
    $mailhref = 'https://mail.google.com';
}
elseif (preg_match($regexYahoo, $mailbox) || preg_match($regexYahooFr, $mailbox)) {
    $hrefTitle = 'Yahoo';
    $mailhref = 'https://mail.yahoo.com';
}
elseif (preg_match($regexOutlook, $mailbox) || preg_match($regexLive, $mailbox) || preg_match($regexOutlookFr, $mailbox)) {
    $hrefTitle = 'Outlook';
    $mailhref = 'https://office.live.com/start/Outlook.aspx?ui=fr%2DFR&rs=FR';
}
elseif (preg_match($regexHotmail, $mailbox) || preg_match($regexLive, $mailbox)) {
    $hrefTitle = 'Hotmail';
    $mailhref = 'https://signup.live.com/signup.aspx?id=64855&mkt=fr-fr&lic=1';
}