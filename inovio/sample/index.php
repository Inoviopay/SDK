<?php
require_once '../bootstrap.php';

try {
    $requestMethod = null;
    $txtParam      = null;

    if (!empty($_REQUEST['request_action'])) {
        $allRequestParams = include 'InovioRequestSample.php';

        if (!in_array($_REQUEST['request_action'], array_keys($allRequestParams))) {
            throw new Exception("Invalid request method");
        }
        $requestConfig = [
            'end_point' => 'https://api.inoviopay.com/payment/pmt_service.cfm',
            'site_id' => 22895,
            'req_username' => 'inovio_api@chetu.com',
            'req_password' => 'OUYJdBix3R',
        ];

        $commonMethod  = [ //check for additional request using existing methods.
            'creditOnFail' => 'ccReverse',
            'forceCredit' => 'ccCredit',
            'authMultiLineItem' => 'authorization'
        ];
        $requestMethod = trim($_REQUEST['request_action']);
        $requestParams = $allRequestParams[$requestMethod];

        if (array_key_exists($requestMethod, $commonMethod)) {
            $requestMethod = $commonMethod[$requestMethod];
        }
        $txtParam = isset($_POST['request_action']) ?
                $_POST['postdata'] : json_encode(($requestParams), JSON_PRETTY_PRINT);
        $txtParam = strlen($txtParam) > 2 ? $txtParam : null;

        if (isset($_POST['request_action'])) {
            
            $serviceConfig = new InovioServiceConfig($requestConfig);
            $processor     = new InovioProcessor($serviceConfig);

            $postdata = json_decode($_POST['postdata'], true);

            if (json_last_error() > 0 || empty($postdata)) {
                throw new Exception("Invalid request data");
            }
            $requestParams                            = $postdata + $requestParams;
            $requestParams['request_response_format'] = 'json';

            if (!empty($requestParams)) { //check for actual request parameter.
                $processor->setParams($requestParams);
            }
            $response = $processor
                    ->setMethodName($requestMethod)
                    ->getResponse();

            $response = json_decode($response, true);
        }
    }
} catch (Exception $e) { // set exception message
    $message = $e->getMessage();
}
?>

<!DOCTYPE html> <!-- ####### Sample Request using HTML ####### -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> NABInovioPayments-FI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="webroot/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="webroot/css/style.css" rel="stylesheet" type="text/css" />
        <link href="webroot/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900'
              rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="side-bar">
                <ul>
                    <li class="menu-head">
                        <img class="logo" src="webroot/img/logo.png" alt="logo">
                        <a href="#" class="push_menu visible-xs"><i class="fa fa-bars pull-right"></i></a>
                        <br />API METHOD
                    </li>
                    <div class="menu">
                        <li><a href="?request_action=authMultiLineItem" id="authMultiLineItem">
                                Auth MultiLineItem
                            </a>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="content">
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content"> <!-- Modal content-->
                            <div class="modal-header ">
                                <h4 class="modal-title">METHOD SOURCE CODE</h4>
                            </div>
                            <div class="modal-body" id="copytext">
                                <p>No, method you have selected!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="page-heading header">API Data</h3>

                <div class="page-content-box">
                    <div class="col-md-12">
                        <?php
                        if (!empty($message)) { //need to add method defination for customMessage
                            echo "<div class='alert alert-danger fade in alert-dismissable'>";
                            echo $message . "</div>";
                        }
                        ?>
                    </div>

                    <form method="post" action="#">
                        <div class="col-md-5">
                            <div class="panel panel-default custom-panel">
                                <div class="panel-heading text-center">REQUEST</div>
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <textarea name="postdata" id="postdata" rows="25"
                                                      class="form-control" placeholder="Request parameters">
<?php echo $txtParam; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 text-center btn_mg">
                            <div class="center-text">
                                <input type="hidden" name="request_action" value="<?php echo isset($_REQUEST['request_action']) ? $_REQUEST['request_action'] : ''; ?>"
                                       >
                                <input type="submit" value="Execute" 
                                       class="btn col-lg-8 btn-warning btn-lg btn-sunny execute-btn">
                                <input type="button" class="col-lg-8 default-button medium inovioreset-button"
                                       value="Reset" >
                                <input type="button" data-toggle="modal"data-target="#myModal"
                                       class="col-lg-8 green-button medium explore-source-code"
                                       value="Source code">
                            </div> 
                        </div>

                        <div class="col-md-5">
                            <div class="panel panel-default custom-panel">
                                <div class="panel-heading text-center">RESPONSE DATA</div>
                                <div class="panel-body">
                                    <div class="panel-body" id="responseData">
                                        <table class="table table-bordered">
                                            <?php
                                            if (!empty($response)) {
                                                if ($_REQUEST['request_action'] == 'ccStatus') {
                                                    if (isset($response['COLUMNS'])) {
                                                        $columns = $response['COLUMNS'];

                                                        foreach ($response['DATA'] as $value) {
                                                            foreach ($columns as $key => $col) {
                                                                echo "<tr><td>$col</td><td>$value[$key]</td></tr>";
                                                            }
                                                            echo '<tr><td colspan="2"></td></tr>';
                                                        }
                                                    }
                                                } else {
                                                    foreach ($response as $key => $val) {
                                                        echo "<tr><td>$key</td> <td>$val</td></tr>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </table>                     
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="row"><div class="col-md-12"></div></div>
            </div>
        </div>
    </div>

    <footer class="Footer bg-dark dker">
        <span><?php echo date('Y'); ?> &copy; Inovio Payment Gateway API</span>
    </footer>

    <!--- include js files-->
    <script type="text/javascript" src="webroot/js/jquery.min.js"></script> 
    <script type="text/javascript" src="webroot/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="webroot/js/InovioApi.js"></script>
</body>
</html>