<?php
// example
include 'viitenumero.php';

$invoiceNumber = 12345;

// generate 100 invoices
for($i = 0; $i < 100; $i++) {

	// generate invoice- & reference number 
	$invoiceNumber = $i + $invoiceNumber;
	$referenceNumber = viitenumero($invoiceNumber);

	// add to list
	$generatedList[] = array(
		'invoice' 	=> $invoiceNumber,
		'reference'	=> $referenceNumber
	);

}

// print the list
?>
<table>
	<thead>
		<tr>
			<th>Invoice number</th>
			<th>Reference number</th>
		</tr>
	</thead>
<?php foreach($generatedList as $row): ?>
	<tr>
		<td><?php echo $row['invoice']; ?></td>
		<td><?php echo $row['reference']; ?></td>
	</tr>
<?php endforeach; ?>
</table>