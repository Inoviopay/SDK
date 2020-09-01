# InovioPayment PHP SDK Documentation 

## Installation:

Copy the inovio.zip to a web server directory. Then unzip inovio.zip to get all the files and folders of the PHP SDK. The SDK alone can be found in the actual src folder. Bootstrap (bootstrap.php) file is required and is used for Class autoloading. Sapmple directory is used to test SDK method call.

## To test the SDK methods, you need to set username and password in 'sample/index.php'. 

Sample SDK method call as shown below:
=========================================================
include_once 'bootstrap.php';

In index.php we need to change following parameters.

$requestParams = [ // required parameters for API request
 	'end_point'=> 'http://example.com',
    'site_id' => SITE_ID,
    'req_username' => 'YOUR_USERNAME',
    'req_password' => 'YOUR_PASSWORD'
];

try {
	$serviceConfig = new InovioServiceConfig($requestParams);
	$processor = new InovioProcessor($serviceConfig);

	$response = $processor
		->setMethodName('ccReverse')
		->setParams([
			'request_ref_po_id'=> '9890890'
		])
		->getResponse();

} catch(Exception $e) {
	echo $e->getMessage();
}
==============================================================
Below is API method:
==============================================================

1- Auth MultiLineItem: It use to authorise user and purchase product with multi items. When you click on source code button after clicked on Auth MultiLineItem method in the left side UI.
requestParams = [
        'end_point'=> 'http://example.com',
        'site_id' => 'USER SITE ID',
        'req_username' => 'test@example.com',
        'req_password' => 'Passw0rd!1'
    ];

    try {
        $serviceConfig = new InovioServiceConfig($requestParams);
        $processor = new InovioProcessor($serviceConfig);

        $response = $processor
            ->setMethodName('authorization')
            ->setParams([
                    'cust_fname'=> 'John',
                    'bill_addr_city'=> 'Los Angeles',
                    'bill_addr_state'=> 'CA',
                    'pmt_expiry'=> '122020',
                    'xtl_cust_id'=> 'testcust11',
                    'pmt_key'=> '123',
                    'pmt_numb'=> '4111111111111111',
                    'cust_lname'=> 'Doe',
                    'request_api_version'=> 3.6,
                    'cust_email'=> 'useremail@tests.com',
                    'li_value_1'=> '2.99',
                    'req_username'=> 'useremail@tests.com',
                    'li_prod_id_1'=> '41241',
                    'request_currency'=> 'USD',
                    'xtl_order_id'=> 'abc123',
                    'bill_addr_zip'=> '90001',
                    'merch_acct_id'=> '100',
                    'bill_addr'=> '1 Main Street',
                    'bill_addr_country'=> 'US'
            ]) 
            ->getResponse();            

    } catch(Exception $e) {
        echo $e->getMessage();
    }


=========================================================


Navigate to sample folder in browser (eg. http://domainname/inovio/sample) to run the test user interface in browser. In UI, left panel is have list of al SDK call. Once you click on a particular method, required request parameters will be shown in request fields textarea for the respective method. Request parameters should be change as per your credentials.

After execution of any SDK method, you will be able to see source code by simply click on "source code" button.