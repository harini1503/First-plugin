<?php
/**
* @package abctrack Plugin
*/
/*
Plugin Name: abctrack Plugin
Plugin URI: http://abctrack.com
Description: This is my first attempt.
Version: 1.0.0
Author: Harini "abctrack" Thenraj
Author URI: http://abctrack.com
License: GPLv2 or later
Text Domain: abctrack plugin
*/
class Tracker
{
// added comment to your code
	//gtufibkjb8o
	function __construct()
	{

		add_action( 'admin_menu',array($this, 'main_menu'));

		add_action('wp_login',array($this,'count_user_login'),10,2);

	}
	function page()
	{
		//Get list of all users

		$users = get_users();
		//var_dump($users);exit;


			?>
			<!DOCTYPE html>
			<html>
			<body>
				<h1>User Data</h1>
					<h2>User verification!!!!</h2>
			<table>
				<tr>
				    <th> User Id &nbsp &nbsp </th>
				   	<th> User Name &nbsp &nbsp</th>
				   	<th> Login Attempts &nbsp &nbsp</th>
			 	</tr><br>
			 	<?php
			 	foreach ($users as $user)
			 	{
			 		$login_count =get_user_meta($user->ID,'sp_login_count',true);
			 		if(empty($login_count))
			 		{

			 			$login_count =0;
			 		}
			 		?>
			 		<tr>
				 		<td><?php echo $user->ID ?></td>
					   	<td><?php echo $user->user_nicename?></td>
					   	<td><?php echo $login_count ?></td>
					   	<td></td>
		 			</tr>
			 		<?php
			 	}
			 	exit;
			 	?>

		 	</table>
			</body>
			</html>

	           <?php


		}

		function count_user_login($user_login,$user)
		{


    		if ( ! empty( get_user_meta( $user->ID, 'sp_login_count', true ) ) )
    		{
            	$login_count = get_user_meta( $user->ID, 'sp_login_count', true );
            	update_user_meta( $user->ID, 'sp_login_count', ( (int) $login_count + 1 ) );
        	}
        	else
        	{
            	update_user_meta( $user->ID, 'sp_login_count', 1 );
        	}

		}










		//Print it
		//Get counts list for same users
		//print it



	function main_menu()
	{

		add_menu_page( 'abctrack plugin', 'details', 'activate_plugins','Tracking',array($this, 'page'));
		//$submenu=add_submenu_page('Tracking', 'abctrack plugin' ,'details','adminstrator','Tracked_info');
	}

}

new Tracker;// function page()

?>
