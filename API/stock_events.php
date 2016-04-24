<?php
error_reporting(0);
//include_once('simple_html_dom.php');
$term = 'RTIX';
if (isset($_GET['ticker'])) {
	$term = $_GET['ticker'];
}

try {
	$table['Events'] = array();
	$html = file_get_html('http://finance.yahoo.com/q/ce?s='.$term.'+Company+Events');
	$i = 0;
	foreach ($html->find('table[class="yfnc_datamodoutline1"] tbody tr td table tbody tr') as $data) {
		if ($i > 10) {
			break;
		}
		if ($i == 0) {
			++$i;
			continue;
		}
		$table['Events'][$i]['date'] = $data->find('td[align=left]', 0)->innertext;
		$table['Events'][$i]['link'] = $data->find('td a', 0)->href;
		$table['Events'][$i]['event'] = $data->find('td a', 0)->innertext;
		++$i;
	}

	echo json_encode($table);
}
catch (Exception $e) {

}
