<?php 
	function getActiveCartId() {
 		global $aid; 		
		$sql_statement = "SELECT id FROM shoppingcart WHERE STATUS = 'ACTIVE' AND accountid = :aid";
		$params = array(':aid' => $aid);
		$cartId = queryForSingleRow($sql_statement, $params);
        if (isset($cartId)){
            return $cartId['id'];
        }
	}
	function createOrderSummary(OrderSummary $order) {
        print "        <tr>\n";
        print "            <td>" . $order->getProductId()     . "</td>\n";
        print "            <td>" . $order->getName()   . "</td>\n";
        print "            <td>" . $order->getPrice() . "</td>\n";
        print "            <td>" . $order->getQuantity() . "</td>\n";
        print "            <td>" . $order->getTotal() . "</td>\n";
        print "        </tr>\n";
    }

    function addressP(Address $addr, $c) {
    	print "<div class=\"panel panel-default\"> \n";
	    print "    <div class=\"panel-heading\"> \n";
		print "		<h4 class=\"panel-title\"> \n";
		print "			<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" .$c."\">Address#" .$c."</a> \n";
		print "		</h4> \n";
		print "	</div> \n";
		print " <div id=\"collapse" .$c."\"  class=\"panel-collapse collapse\"> \n";
		print "		<div class=\"panel-body\"> \n";
		print "			<div class=\"row\"> \n";
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Id</label> \n";
		print "						<span></span>\n";
		print "						<p id=\"addrId" .$c."\" class='form-control-static'>" . $addr->getId() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Unit Number</label> \n";
		print "						<p id=\"addrUnit" .$c."\" class='form-control-static'>" . $addr->getUnitNumber() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Street Name</label> \n";
		print "						<p id=\"addrStreet" .$c."\" class='form-control-static'>" . $addr->getStreetName() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>City</label> \n";
		print "						<p id=\"addrCity" .$c."\" class='form-control-static'>" . $addr->getCity() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>State</label> \n";
		print "						<p id=\"addrState" .$c."\" class='form-control-static'>" . $addr->getState() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Country</label> \n";
		print "						<p id=\"addrCountry" .$c."\" class='form-control-static'>" . $addr->getCountry() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Zip Code</label> \n";
		print "						<p id=\"addrZip" .$c."\" class='form-control-static'>" . $addr->getZipCode() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";	
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "				<span class=\"input-group-btn\"> \n";
        print "             <button class=\"btn btn-success\" name=\"submit\" onclick = \"populateOrder( $c )\" type=\"button\" id =\"button" .$c."\" value=\"val\">Use this address</button> \n";
        print "             </span>\n";
		print "				</div> \n";			
		print "			</div> \n";
		print "		</div> \n";
		print "	</div> \n";
		print " </div> \n";
    }

     function paymentPrint(Payment $pmt, $c) {
    	print "<div class=\"panel panel-default\"> \n";
	    print "    <div class=\"panel-heading\"> \n";
		print "		<h4 class=\"panel-title\"> \n";
		print "			<a data-toggle=\"collapse\" data-parent=\"#paymentAcc\" href=\"#collapsePmt" .$c."\">Payment Method #" .$c."</a> \n";
		print "		</h4> \n";
		print "	</div> \n";
		print " <div id=\"collapsePmt" .$c."\" class=\"panel-collapse collapse \"> \n";
		print "		<div class=\"panel-body\"> \n";
		print "			<div class=\"row\"> \n";
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Id</label> \n";
		print "						<p id=\"pmtId" .$c."\" class='form-control-static'>" . $pmt->getId() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";			
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Card Type</label> \n";
		print "						<p id=\"pmtType" .$c."\" class='form-control-static'>" . $pmt->getType() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Full Number</label> \n";
		print "						<p id=\"pmtFullName" .$c."\" class='form-control-static'>" . $pmt->getFullName() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Card Number</label> \n";
		print "						<p id=\"pmtCardNumber" .$c."\" class='form-control-static'>" . $pmt->getCardNumber() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>PIN/CVV</label> \n";
		print "						<p id=\"pmtPIN" .$c."\" class='form-control-static'>" . $pmt->getPinCVV() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";		
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "					<div class=\"form-group\"> \n";
		print "						<label>Expiry Date</label> \n";
		print "						<p id=\"pmtExpDate" .$c."\" class='form-control-static'>" . $pmt->getExpDate() . "</p>\n";
		print "					</div> \n";
		print "				</div> \n";
		print "				<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-6\"> \n";
		print "				<span class=\"input-group-btn\"> \n";
        print "             <button class=\"btn btn-success\" name=\"submit\" onclick = \"populatePayment( $c )\" type=\"button\" id =\"button" .$c."\" value=\"val\">Use this Payment Mode</button> \n";
        print "             </span>\n";
		print "				</div> \n";			
		print "			</div> \n";
		print "		</div> \n";
		print "	</div> \n";
		print " </div> \n";
    }
?>