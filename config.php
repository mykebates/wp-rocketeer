<?php return array(

	// Logging
	////////////////////////////////////////////////////////////////////

	// The schema to use to name log files
	'logs' => function ($rocketeer) {
		return sprintf('%s-%s-%s.log', $rocketeer->getConnection(), $rocketeer->getStage(), date('Ymd'));
	},

	// Remote access
	//
	// You can either use a single connection or an array of connections
	////////////////////////////////////////////////////////////////////

	// The default remote connection(s) to execute tasks on
	'default' => array('production'),

	// The various connections you defined
	// You can leave all of this empty or remove it entirely if you don't want
	// to track files with credentials : Rocketeer will prompt you for your credentials
	// and store them locally
	'connections' => array(
		'production' => array(
			'host'      => '192.168.50.4',
			'username'  => 'vagrant',
			'password'  => 'vagrant',
			'key'       => '',
			'keyphrase' => '',
		),
	),

	// Contextual options
	//
	// In this section you can fine-tune the above configuration according
	// to the stage or connection currently in use.
	// Per example :
	// 'stages' => array(
	// 	'staging' => array(
	// 		'scm' => array('branch' => 'staging'),
	// 	),
	//  'production' => array(
	//    'scm' => array('branch' => 'master'),
	//  ),
	// ),
	////////////////////////////////////////////////////////////////////

	'on' => array(

		// Stages configurations
		'stages' => array(
		),

		// Connections configuration
		'connections' => array(
		),

	),

	'local' => array(
		'domain_name' => 'wpsite.dev',
		'db' => array(
			'host' 		=> 'localhost',
			'user' 		=> 'root',
			'password' 	=> 'password',
			'name' 		=> 'wpsite',
		),
		'mysql_path' => '/Applications/MAMP/Library/bin/' // Optional.  May need supply a path in the event you use something like MAMP - EX: /Applications/MAMP/Library/bin/
	),

);
