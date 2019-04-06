<?php
/**

 * file used for core configuration
 */

//show error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//home page url
$home_url="http://localhost/test_mencatatKehadiran/";

//page given in url parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//set number of records per page
$records_per_page = 5;

//calculate for query limit clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
