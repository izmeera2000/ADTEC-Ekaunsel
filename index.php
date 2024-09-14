<?php
session_start();

require('route.php');

// require __DIR__ . '/admin/vendor/autoload.php';

// echo __DIR__ . '/../';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();
// $site_url = $_ENV['site1'];


function index()
{
	check_session($site_url);
	require_once('views/index.php');
}


function server()
{

	require_once('admin/server.php');
}

function register()
{
	require_once('views/register.php');
}

function login()
{
	require_once('views/login.php');
}
function logout()
{
	require_once('admin/server.php');

	session_destroy();
	unset($_SESSION['user_details']);
	header("location: " . $site_url . "");
}


function user_profile()
{
	check_session($site_url);

	require_once('views/user/profile.php');

}
function user_kaunseling()
{
	check_session($site_url);
	require_once('views/user/kaunseling.php');

}


//kaunseling
function kaunseling_booking()
{
	check_session($site_url);
	require_once('views/kaunseling/booking.php');

}
function kaunseling_borang()
{
	// check_session($site_url);
	require_once('views/kaunseling/borang.php');

}
function kaunseling_edit_borang()
{
	check_session($site_url);
	require_once('views/kaunseling/edit_borang.php');

}

function kaunseling_booking_kaunselor()
{
	check_session($site_url, 1);
	require_once('views/kaunseling/booking_kaunselor.php');

}
function kaunseling_student()
{
	check_session($site_url, 1);
	require_once('views/kaunseling/student.php');

}




//custom pages
function page404()
{
	require_once('views/404.php');

	// die('Page not found. Please try some different url.');
}


function student_profile($request)
{
	$product_id = basename($request);

	require_once('views/kaunseling/student_profile.php');
}


function student_profile_psikologi($request)
{
	$product_id = basename($request);

	require_once('admin/server.php');
}


function check_session(&$site_url, $admin = 0)
{
	if (!isset($_SESSION['user_details'])) {


		header("location: " . $site_url . "login");

	}
	if ($admin) {
		// var_dump($_SESSION['user_details']['role']);

		if (($_SESSION['user_details']['role'] != 1)) {
			// header("location: " . $site_url . "login");
			// session_destroy();
			// unset($_SESSION['user_details']);
			header("location: " . $site_url . "logout");

		}


	}

}

function test()
{
	require_once('views/test.php');

	// die('Page not found. Please try some different url.');
}

// debug_to_console2($current_url);

//If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
switch (true) {

	// st outside
	case $request == '' || $request == '/':
		index();
		break;

	case $request == 'register':
		register();
		break;

	case str_contains($request, 'login'):
		login();
		break;

	case str_contains($request, 'logout'):
		logout();
		break;
	// end outside

	// st student

	case $request == 'kaunseling/booking':
		kaunseling_booking();
		break;

	case str_contains($request, 'user/kaunseling'):
		user_kaunseling();
		break;



	case $request == 'kaunseling/borang':
		kaunseling_borang();
		break;


	case str_contains($request, 'borang_psikologi_send'):
		server();
		break;


	case str_contains($request, 'kaunseling_sejarah'):
		server();
		break;

	case str_contains($request, 'calendarfetch'):
		server();
		break;



	case str_contains($request, 'user_calendaradd'):
		server();
		break;

	case str_contains($request, 'calendaraddna'):
		server();
		break;

	case str_contains($request, 'calendardeletena'):
		server();
		break;


	// end student










	// st common

	case str_contains($request, 'user/profile'):
		user_profile();
		break;

	case str_contains($request, 'user_change_image'):
		server();
		break;

	// end common

	//st kaunselor


	case $request == 'kaunseling/editborang':
		kaunseling_edit_borang();
		break;

	case $request == 'kaunseling/manage':
		kaunseling_booking_kaunselor();
		break;

	case str_starts_with($request, 'student/senarai'):
		kaunseling_student();
		break;

	case str_starts_with($request, 'student'):
		student_profile($request);
		break;



	case str_starts_with($request, 'kaunseling/student/psikologi'):
		server();
		break;

	case str_contains($request, 'editborang/reorder'):
		server();
		break;

	case str_contains($request, 'calendarfetch2'):
		server();
		break;

	case str_contains($request, 'senaraistudent'):
		server();
		break;




	case str_contains($request, 'senaraisoalan'):
		server();
		break;


	case $request == 'kaunseling/addsoalan':
		server();
		break;


	//end kaunselor













	//test
	case str_contains($request, 'testemail'):
		test();
		break;

	default:
		echo $request;
		http_response_code(404);
		page404();
		break;
}



