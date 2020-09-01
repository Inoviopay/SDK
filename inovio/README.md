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

==========================================================
1- Credit On Fail :Refund a previously captured authorization, BUT if that capture has not happened, then void the authorization. When you click on source code button after clicked on Credit On Fail method in the left side UI.
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
            ->setMethodName('ccCredit')
            ->setParams([
                    'request_ref_po_id'=> '77777',
                    'credit_on_fail'=> 1
            ]) 
            ->getResponse();            

    } catch(Exception $e) {
        echo $e->getMessage();
    }

=========================================================


Navigate to sample folder in browser (eg. http://domainname/inovio/sample) to run the test user interface in browser. In UI, left panel is have list of al SDK call. Once you click on a particular method, required request parameters will be shown in request fields textarea for the respective method. Request parameters should be change as per your credentials.

After execution of any SDK method, you will be able to see source code by simply click on "source code" button.