<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		table.minimalistBlack {
		  border: 3px solid #000000;
		  width: 100%;
		  text-align: left;
		  border-collapse: collapse;
		}
		table.minimalistBlack td, table.minimalistBlack th {
		  border: 1px solid #000000;
		  padding: 5px 4px;
		}
		table.minimalistBlack tbody td {
		  font-size: 13px;
		}
		table.minimalistBlack thead {
		  background: #CFCFCF;
		  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		  border-bottom: 3px solid #000000;
		}
		table.minimalistBlack thead th {
		  font-size: 15px;
		  font-weight: bold;
		  color: #000000;
		  text-align: left;
		}
		table.minimalistBlack tfoot {
		  font-size: 14px;
		  font-weight: bold;
		  color: #000000;
		  border-top: 3px solid #000000;
		}
		table.minimalistBlack tfoot td {
		  font-size: 14px;
		}
	</style>
</head>
<body>
	<h6>Printed Date : <?= date('d F Y || H:i:s'); ?></h6>
	<h6>Printed By : <?= $user['name']; ?>, [<?=$user['nim']; ?>]</h6>
	<h3>Data Voter</h3>
	<table class="minimalistBlack">
		<thead>
			<tr>
				<th>#</th>
				<th>Date Vote</th>
				<th>NIM</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($voter as $v) : ?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= date("d F Y || H:i:s", $v['date_voted']); ?></td>
				<td><?= $v['nim']; ?></td>
				<td><?= $v['name']; ?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">Total voters : <?= $count['total']; ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>
