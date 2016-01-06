<?php
class Csv{
	public function __construct(){
				//echo __FILE__;
	}

	public function createCsv($table,$from,$to){
	//echo $table; die('die is called at class Csv');
	/* echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';	
		
	echo '<pre>';
	print_r($params);die('calldie');
	echo '<pre>'; */
		
		require_once 'csv/simple_html_dom.php';	
		
		
		$html = str_get_html($table);
		
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename=sample.csv');
		
		//$fp = fopen("php://output", "w");
		$fp = fopen("log/SP_".$from."_".$to.".csv", "w");
		
		foreach($html->find('tr') as $element)
		{
			$td = array();
			foreach( $element->find('td') as $row)
			{
				$td [] = $row->plaintext;
			}
			fputcsv($fp, $td);
		}
		
		fclose($fp);
	}
}
?>