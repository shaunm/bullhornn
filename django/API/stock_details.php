<?php
error_reporting(0);
//include_once('simple_html_dom.php');
//use PHPImageWorkshop\ImageWorkshop as ImageWorkshop;
//require_once('autoload.php');
header("Content-type\: text/xml");
$term = 'RTIX';
if (isset($_GET['ticker'])) {
	$term = $_GET['ticker'];
}

$site_name = 'Rajesh.com';
if (isset($_GET['site_name'])) {
	$site_name = $_GET['site_name'];
	$site_name = (strlen($site_name) > 9) ? $site_name : 'Site--' . $site_name;
}

try {
	$html = file_get_html('http://www.finviz.com/quote.ashx?t='.$term.'&ty=l&ta=0&p=d');
	$table['Stock'] = array();
	$i = 0;

	foreach ($html->find('[class="snapshot-table2"] tbody tr[class=table-dark-row]') as $data) {
		$table['Stock'][$i][0] = $data->find('td', 0)->innertext;
		$table['Stock'][$i][1] = $data->find('td', 1)->innertext;
		$table['Stock'][$i][2] = $data->find('td', 2)->innertext;
		$table['Stock'][$i][3] = $data->find('td', 3)->innertext;
		$table['Stock'][$i][4] = $data->find('td', 4)->innertext;
		$table['Stock'][$i][5] = $data->find('td', 5)->innertext;
		$table['Stock'][$i][6] = $data->find('td', 6)->innertext;
		$table['Stock'][$i][7] = $data->find('td', 7)->innertext;
		$table['Stock'][$i][8] = $data->find('td', 8)->innertext;
		$table['Stock'][$i][9] = $data->find('td', 9)->innertext;
		$table['Stock'][$i][10] = $data->find('td', 10)->innertext;
		$table['Stock'][$i][11] = $data->find('td', 11)->innertext;
		++$i;
	}

	//$url = 'http://www.finviz.com/chart.ashx?t='.$term.'&ty=l&ta=0&p=d&s=l';
	//$img_name = time().'loaded_file.png';
	//file_put_contents($img_name, file_get_contents($url));

	//$norwayLayer = ImageWorkshop::initFromPath($img_name);

	//$watermark = time() . 'watermark.jpg';
	//$layer = ImageWorkshop::initTextLayer($site_name, 'arial.ttf', 10, '92D292', 8, 'ffffff');
	//$layer->save(__DIR__, $watermark, false, $null, 100);

	//$watermarkLayer = ImageWorkshop::initFromPath($watermark);
	//$norwayLayer->addLayerOnTop($watermarkLayer, 5, 0, "RT");

	//$dirPath = __DIR__;
	//$final_file = time(). '_' . $term . ".png";
	//$norwayLayer->save(__DIR__, $final_file, false, $null, 100);

	//unlink(__DIR__ . '/' . $img_name);
	//unlink(__DIR__ . '/' . $watermark);

	//$table['Graph'] = 'http://localhost/API/' . $final_file;

	$table['Profile'] = '';
	foreach ($html->find('[class="fullview-profile"]') as $data) {
		$table['Profile'] = $data->innertext;
	}

	$table['News'] = array();
	$i = 0;
	foreach ($html->find('[id="news-table"] tbody tr') as $data) {
		if ($i > 10) {
			break;
		}
		$table['News'][$i]['news'] = $data->find('td[align=left] a', 0)->innertext;
		$table['News'][$i]['link'] = $data->find('td[align=left] a', 0)->href;
		++$i;
	}

	echo json_encode($table);
}
catch (Exception $e) {
}
