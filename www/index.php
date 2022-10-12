<?php
/**
 * Default landing for when people come to this module.
 *
 * Show some menu.
 */

use SimpleSAML\Module\samltool\Authentication;

if (isset($_GET['logout'])) {
	Authentication::logout();
}

Authentication::authenticate();
require('ajax-handler.php');

?><!doctype html>
<html lang='en'>
	<head>
		<title>samltools</title>
		<script>
// a button clicked, json data sent, when received puts in result
function sendRequest(function) {
	let data = {"function": function };
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if ((xhr.readyState == 4) && (xhr.status == 200))
		{
			let Response = JSON.parse(xhr.responseText);
		}
	};
	xhr.open('POST', 'ajax-handler.php', true);
	xhr.send(JSON.stringify(data));
}
		<script>
	</head>
	<body>
		<div>
			<div class="header">X.509 Certs</div>
			<div>Generate Self-Signed Certs</div>
			<div>Calculate Fingerprint</div>
			<div>Format a X.509 certificate</div>
			<div>Format a Private Key</div>

			<div class="header">Code/Decode</div>
			<div>Base64</div>
			<div>Gzip</div>
			<div>URL Encode/Decode</div>
			<div>Deflate + Base64 Encode</div>
			<div>Base64 Decode + Inflate</div>

			<div class="header">Encrypt/Decrypt</div>
			<div>Encrypt XML</div>
			<div>Decrypt XML</div>

			<div class="header">Sign</div>
			<div>Sign SAML AuthNRequest</div>
			<div>Sign SAML Response</div>
			<div>Sign SAML Logout Request</div>
			<div>Sign SAML Logout Response</div>
			<div>Sign Metadata</div>

			<div class="header">Validate</div>
			<div>Validate XML with the XSD schema</div>
			<div>Validate SAML AuthN Request</div>
			<div>Validate SAML Response</div>
			<div>Validate SAML Logout Request</div>
			<div>Validate SAML Logout Response</div>

			<div class="header">Attribute Extractor</div>
			<div>Get Attributes and NameID from a SAML Response</div>

			<div>XML Pretty Print</div>

			<div class="header">Build Metadata</div>
			<div>Build IdP Metadata</div>
			<div>Build SP Metadata</div>

			<div><a href='?logout=now'>Logout</a></div>
		</div>
		
	</body>
</html>
