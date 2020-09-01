<?php
/**
 * Inovio API request Parameters
 */
return [
    'authenticate' => [
        'request_response_format' => 'json'
    ],
    'serviceAvailability' => [
        'request_response_format' => 'json'
    ],
    'authorization' => [
        "merch_acct_id"=> "25983",
        "cust_fname"=> "John",
        "cust_lname"=> "Doe",
        "cust_email"=> "email@example.com",
        "cust_login"=> "email@example.com",
        "cust_password"=> "password#!",
        "xtl_cust_id"=> "testcust11",
        "xtl_order_id"=> "abc123",
        "li_prod_id_1"=> "41241",
        "li_value_1"=> "2.99",
        "li_count_1"=> 1,
        "bill_addr"=> "1 Main",
        "bill_addr_city"=> "LosAngeles",
        "bill_addr_state"=> "CA",
        "bill_addr_zip"=> "90001",
        "bill_addr_country"=> "US",
        "pmt_numb"=> "5105105105105100",
        "pmt_key"=> "123",
        "pmt_expiry"=> "012023",
        "request_currency"=> "USD",
        "xtl_ip"=> "10.00.000.90"
    ],
    'authAndCapture' => [
        "merch_acct_id" => "25983",
        "cust_fname" => "John",
        "cust_lname" => "Doe",
        "cust_email" => "email@example.com",
        "xtl_cust_id" => "testcust11",
        "xtl_order_id" => "abc123",
        "li_prod_id_1" => "41241",
        "li_value_1" => "2.99",
        "request_currency" => "USD",
        "li_count_1" => 1,
        "bill_addr" => "1 Main",
        "bill_addr_city" => "LosAngeles",
        "bill_addr_state"=> "CA",
        "bill_addr_zip"=> "90001",
        "bill_addr_country"=> "US",
        "pmt_numb"=> "5105105105105100",
        "pmt_key"=> "123",
        "pmt_expiry"=> "012023",
        "xtl_ip"=> "10.00.000.90"
    ],
    'ccReverse' => [
        "site_id" => "22895",
        "request_action" => "CCREVERSE",
        "request_response_format" => "json",
        "request_ref_po_id" => "56185639",
        "li_value_1"=>"2"
    ],
    'capture' => [
        "site_id"=> "22895",
        "request_action"=> "CCCAPTURE",
        "request_ref_po_id"=> "56185639",
        "li_value_1"=> "2.99"
    ],
    'ccCredit' => [
        "site_id"=> "22895",
        "request_action"=> "CCCREDIT",
        "request_ref_po_id"=> "56185639",
        "li_value_1"=> 2.99
    ],
    'ccStatus' => [
        "site_id"=> "22895",
        "request_action"=> "CCSTATUS",
        "request_ref_po_id"=> "56185639"
    ],
    'creditOnFail' => [
        "site_id"=> "22895",
        "request_action"=> "CCREVERSE",     
        "request_ref_po_id"=> "56185639",
        "credit_on_fail"=> 1
    
    ],
    'forceCredit' => [
        "site_id"=> "22895",
        "request_action"=> "CCCREDIT",
        "force_credit"=> 1,
        "cust_fname"=> "John",
        "cust_lname"=> "Doe",
        "cust_email"=> "email@example.com",
        "li_prod_id_1"=> "41241",
        "li_value_1"=> "2.99",
        "li_value_count"=> 1,
        "pmt_numb"=> "4111111111111111",
        "pmt_expiry"=> "012023",
        "pmt_key"=> "123",
        "bill_addr"=> "1%20Main%20Street",
        "bill_addr_city"=> "Los Angeles",
        "bill_addr_state"=> "CA",
        "bill_addr_country"=> "US",
        "bill_addr_zip"=> "90001",
        "merch_acct_id"=> "25983"
    ],
    'authMultiLineItem' => [
        "site_id"=> "22895",
        "cust_fname"=> "John",
        "bill_addr_city"=> "Los Angeles",
        "bill_addr_state"=> "CA",
        "pmt_expiry"=> "012023",
        "xtl_cust_id"=> "testcust11",
        "pmt_key"=> "123",
        "pmt_numb"=> "4111111111111111",
        "cust_lname"=> "Doe",
        "cust_email"=> "email@example.com",
        "li_value_1"=> "2",
        "li_count_1"=> "1",
        "li_prod_id_1"=> "41241",
        "li_value_2"=> "2",
        "li_count_2"=> "1",
        "li_prod_id_2"=> "41241",
        "request_currency"=> "USD",
        "xtl_order_id"=> "abc123",
        "bill_addr_zip"=> "90001",
        "request_action"=> "CCAUTHORIZE",
        "merch_acct_id"=> "25983",
        "bill_addr"=> "1 Main Street",
        "bill_addr_country"=> "US"
    ]
];
