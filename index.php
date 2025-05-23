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
	// require_once('views/dashbo.php');
	check_session($site_url);

}
function index2()
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
	header("location: " . $site_url . "dashboard");
}
function g_oauth()
{
	// check_session($site_url);

	require_once('views/goauth.php');

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

function kaunseling_analytics()
{
	check_session($site_url, 1);
	require_once('views/kaunseling/analytics.php');

}
function kaunseling_senarai()
{
	check_session($site_url);
	if (($_SESSION['user_details']['role'] != 1)) {
		require_once('views/kaunseling/senarai_student.php');

	} else {
		require_once('views/kaunseling/senarai.php');

	}

}

function kaunseling_senarai_student()
{
	check_session($site_url);
	require_once('views/kaunseling/senarai_student.php');

}
function kaunseling_temujanji($request)
{

	check_session($site_url);
	$product_id = basename($request);

	if (($_SESSION['user_details']['role'] == 1)) {


		require_once('views/kaunseling/temujanji.php');
	} else {

		require_once('views/kaunseling/temujanji_student.php');
	}

}

//email
function email_meeting_link($request)
{

	require_once('views/email/meeting_link.php');

}
function email_meeting_approve($request)
{

	require_once('views/email/meeting_approve.php');

}
function email_meeting_reject($request)
{

	require_once('views/email/meeting_reject.php');

}
//custom pages
function page404()
{
	require_once('views/404.php');

	// die('Page not found. Please try some different url.');
}


function student_profile($request)
{
	check_session($site_url, 1);
	$product_id = basename($request);

	require_once('views/kaunseling/student_profile.php');
}


function student_profile_psikologi($request)
{
	check_session($site_url, 1);
	$product_id = basename($request);

	require_once('admin/server.php');
}

function settings_user_dashboard()
{
	check_session($site_url, 1);

	require_once('views/settings/user_dashboard.php');
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

function test_chat()
{
	require_once('views/user/testchat.php');
}


function test()
{
	require_once('views/test.php');

	// die('Page not found. Please try some different url.');
}

function testclient()
{
	require_once('views/client.php');

	// die('Page not found. Please try some different url.');
}
// debug_to_console2($current_url);

//If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
switch (true) {

	// st outside
	case $request == '' || $request == '/':
		index();
		break;

	case $request == 'dashboard':
		index2();
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

	case str_contains($request, 'goauth'):
		g_oauth();
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
	case str_contains($request, 'bar_chart_kaunseling_total'):
		server();
		break;
	case str_contains($request, 'card_chart_kaunseling_total_day'):
		server();
		break;

	case $request == 'kaunseling/editborang':
		kaunseling_edit_borang();
		break;

	case $request == 'kaunseling/manage':
		kaunseling_booking_kaunselor();
		break;

	case $request == 'kaunseling/analytics':
		kaunseling_analytics();
		break;


	case str_starts_with($request, 'student/senarai'):
		kaunseling_student();
		break;

	case str_starts_with($request, 'student'):
		student_profile($request);
		break;



	case str_contains($request, 'kaunseling/student/psikologi'):
		server();
		break;



	case str_contains($request, 'editborang/reorder'):
		server();
		break;

	case str_contains($request, 'editsoalan'):
		server();
		break;

	case str_contains($request, 'deletesoalan'):
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


	case str_contains($request, 'kaunselor_reject'):
		server();
		break;

	case str_contains($request, 'kaunselor_approve'):
		server();
		break;



	case str_starts_with($request, 'kaunseling/senarai'):
		kaunseling_senarai();
		break;

	case str_contains($request, 'senaraitemujanji'):
		server();
		break;
	case str_contains($request, 'senaraitemujanji2'):
		server();
		break;

	case str_contains($request, 'senaraitemujanji3'):
		server();
		break;


	case str_starts_with($request, 'kaunseling/temujanji'):
		kaunseling_temujanji($request);
		break;

	case str_contains($request, 'fetch_masalah'):
		server();
		break;


	case str_contains($request, 'kaunseling_analytics'):
		server();
		break;

	//end kaunselor


	case str_contains($request, 'temujanji_update'):
		server();
		break;


	case str_contains($request, 'temujanji_end'):
		server();
		break;



	//settings
	case $request == 'settings/user_dashboard':
		settings_user_dashboard();
		break;

	case str_contains($request, 'senaraigambar'):
		server();
		break;


	case str_contains($request, 'deletegambar'):
		server();
		break;
	case str_contains($request, 'editgambar/reorder'):
		server();
		break;


	//test
	case str_contains($request, 'testemail'):
		test();
		break;

	case str_contains($request, 'client'):
		testclient();
		break;


	case str_contains($request, 'email/meeting_link'):
		email_meeting_link($request);
		break;
	case str_contains($request, 'email/meeting_approve'):
		email_meeting_approve($request);
		break;
	case str_contains($request, 'email/meeting_reject'):
		email_meeting_reject($request);
		break;
	//t estend

	case str_contains($request, 'test_chat'):
		test_chat();
		break;

	case str_contains($request, 'send_chat'):
		server();
		break;
	case str_contains($request, 'get_chat'):
		server();
		break;


	default:
		echo $request;
		http_response_code(404);
		page404();
		break;
}



