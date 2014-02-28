<?php return array(

	// Remote server
	//////////////////////////////////////////////////////////////////////

	// Variables about the servers. Those can be guessed but in
	// case of problem it's best to input those manually
	'variables' => array(
		'directory_separator' => '/',
		'line_endings'        => "\n",
	),

	// The root directory where your applications will be deployed
	'root_directory'   => '/var/www/',
	'wp_content_director' => 'content', // relative to site root
	'domain_name' => 'wcstl.elemenopea.com',

	// DB connection details used for pull/push as well ad wp-config generation
	'db' => array(
		'host' => 'localhost',
		'user' => 'root',
		'password' => 'password',
		'name' => 'wcstl',
	),

	// The name of the application to deploy
	// This will create a folder of the same name in the root directory
	// configured above, so be careful about the characters used
	'application_name' => 'wcstl',

	// The number of releases to keep at all times
	'keep_releases'    => 4,

	// A list of folders/file to be shared between releases
	// Use this to list folders that need to keep their state, like
	// user uploaded data, file-based databases, etc.
	'shared' => array(
		'content/uploads',
	),

	'permissions' => array(

		// The folders and files to set as web writable
		// You can pass paths in brackets, so {path.public} will return
		// the correct path to the public folder
		'files' => array(
			'content/uploads',
			'content/plugins',
		),

		// Here you can configure what actions will be executed to set
		// permissions on the folder above. The Closure can return
		// a single command as a string or an array of commands
		'callback' => function ($task, $file) {
			return array(
				sprintf('chown -R www-data:www-data %s', $file),
				sprintf('chmod -R g+w %s', $file),
			);
		},

	),

);
