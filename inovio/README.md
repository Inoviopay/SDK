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

1- Auth Capture: Capture of the authorized funds in a single request to the Payment Service.When you click on source code button after clicked on Auth Capture method in the left side UI.

    $requestParams = [
        'end_point'=> 'http://example.com',
        'site_id' => 'USER SITE ID',
        'req_username' => 'test@example.com',
        'req_password' => 'Passw0rd!1'
    ];

    try {
        $serviceConfig = new InovioServiceConfig($requestParams);
        $processor = new InovioProcessor($serviceConfig);

        $response = $processor
            ->setMethodName('authAndCapture')
            ->setParams([
                'merch_acct_id'=> 'XXX',
                'cust_fname'=> 'John',
                'cust_lname'=> 'Doe',
                'cust_email'=> 'email@example.com',
                'cust_login'=> 'email@example.com',
                'cust_password'=> 'testxxx',
                'xtl_cust_id'=> 'testcust11',
                'xtl_order_id'=> 'abc123',
                'li_prod_id_1'=> 41241,
                'li_value_1'=> 2.99,
                'li_count_1'=> 1,
                'request_currency'=> 'USD',
                'bill_addr'=> '1 Main',
                'bill_addr_city'=> 'LosAngeles',
                'bill_addr_state'=> 'CA',
                'bill_addr_zip'=> 90001,
                'bill_addr_country'=> 'US',
                'pmt_numb'=> '5105105105105100',
                'pmt_key'=> 123,
                'pmt_expiry'=> '122014',
                'xtl_ip'=> '10.00.000.90'
            ]) 
            ->getResponse();            

    } catch(Exception $e) {
        echo $e->getMessage();
    }

=========================================================


Navigate to sample folder in browser (eg. http://domainname/inovio/sample) to run the test user interface in browser. In UI, left panel is have list of al SDK call. Once you click on a particular method, required request parameters will be shown in request fields textarea for the respective method. Request parameters should be change as per your credentials.

After execution of any SDK method, you will be able to see source code by simply click on "source code" button.