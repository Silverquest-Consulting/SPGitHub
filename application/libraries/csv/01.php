<?php
    include('simple_html_dom.php');

    $table = '<table class="table">
				<thead>
					<tr>
						<td>Date</td><td>Order</td> <td>Name</td> <td>Address</td> <td>Suburb</td> <td>Postcode</td> 
 <td>State</td> 
 <td>Email</td> 
 <td>Phone</td> 
 <td>PaymentMetdod</td> 
 <td>CardHolderName</td> 
 <td>GiftCategory</td> 
 <td>GiftItem</td> 
 <td>GiftId</td> 
 <td>GiftQty</td> 
 <td>GiftUnitPrice</td> 
 <td>GiftAmount</td> 
 <td>Receipt</td>
					</tr>
				</thead>
				<tbody><tr class="init">	
							<td>2015-12-02</td>
							<td>M002083</td>
							<td> </td>
							<td> </td>
							<td></td>
							<td></td>		
							<td></td>
							<td></td>
							<td></td>
							<td>AMEX</td>
							<td>mytest</td>
							<td>Operation Christmas Child</td>		
									
							<td>Adopt a box</td>
							<td>GC-AU-6843</td>
							<td>1</td>
							<td>9</td>
							<td>9</td>
							<td>722131440</td>		
									
						</tr><tr class="init">	
							<td>2015-12-02</td>
							<td>M002083</td>
							<td> </td>
							<td> </td>
							<td></td>
							<td></td>		
							<td></td>
							<td></td>
							<td></td>
							<td>AMEX</td>
							<td>mytest</td>
							<td>Operation Christmas Child</td>		
									
							<td>Shoebox transport</td>
							<td>GC-AU-6875</td>
							<td>1</td>
							<td>75</td>
							<td>75</td>
							<td>722131440</td>		
									
						</tr><tr class="init">	
							<td>2015-12-02</td>
							<td>M002083</td>
							<td> </td>
							<td> </td>
							<td></td>
							<td></td>		
							<td></td>
							<td></td>
							<td></td>
							<td>AMEX</td>
							<td>mytest</td>
							<td>Operation Christmas Child</td>		
									
							<td>Adopt a carton of shoeboxes</td>
							<td>GC-AU-6873</td>
							<td>1</td>
							<td>198</td>
							<td>198</td>
							<td>722131440</td>		
									
						</tr></tbody>
			</table>
';
        $html = str_get_html($table);

        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename=sample.csv');

        //$fp = fopen("php://output", "w");
        $fp = fopen("myreport2.csv", "w");
        
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
?>