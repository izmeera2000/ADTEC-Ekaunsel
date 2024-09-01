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
	$product_id = str_replace('kaunselor/student/', '', $request);
	$product_id = strtok($product_id, '/');
	require_once('views/user/profile.php');
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

// debug_to_console2($current_url);

//If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
if ($request == '' or $request == '/')
	// echo $request;
	index();
else if ($request == 'register')
	register();
else if (str_contains($request, 'login'))
	login();
else if (str_contains($request, 'logout'))
	logout();
else if ($request == 'kaunseling/booking')
	kaunseling_booking();


else if ($request == 'kaunseling/borang')
	kaunseling_borang();



else if ($request == 'kaunselor/booking')
	kaunseling_booking_kaunselor();
else if (str_contains($request, 'kaunselor/student/senarai'))
	kaunseling_student();
else if (str_contains($request, 'borang_psikologi_send'))
	server();
else if (str_contains($request, 'user/profile'))
	user_profile();
else if (str_contains($request, 'user/kaunseling'))
	user_kaunseling();
else if (str_contains($request, 'kaunseling_sejarah'))
	server();
else if (str_contains($request, 'calendarfetch'))
	server();
else if (str_contains($request, 'calendarfetch2'))
	server();
else if (str_contains($request, 'user_calendaradd'))
	server();
else if (str_contains($request, 'calendaraddna'))
	server();
else if (str_contains($request, 'calendardeletena'))
	server();
else if (str_contains($request, 'senaraistudent')) {
	// echo "asd";
	server();
} 
else if (str_contains($request, 'editborang/reorder')) {
	// echo "asd";
	server();
} 

else if (str_contains($request, 'senaraisoalan')) {
	// echo "asd";
	server();
} 



else if (str_starts_with($request, 'kaunselor/student'))
	student_profile($request);
else {
	echo $request;

	http_response_code(404);
	page404();
}


