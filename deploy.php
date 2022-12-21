<?php
namespace Deployer;

require 'recipe/common.php';
require 'contrib/npm.php';
require 'contrib/slack.php';

define( 'BASEPATH', __DIR__ );

require BASEPATH . '/vendor/autoload.php';
use \Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable( __DIR__ );

if ( file_exists( __DIR__ . '/.env' ) ) {
	$dotenv->load();
} else {
	exit( 'Please create an .env file to continue' );
}

/**
 * Clear transients listed in this array
 */
$clear_transients = [
	'iis_styleguide_sprite',
	'mix_manifest_transient',
];

// Project name
set( 'application', getenv( 'APPLICATION_NAME' ) );

// Project repository
set( 'repository', getenv( 'REPOSITORY' ) );

// [Optional] Allocate tty for git clone. Default value is false.
set( 'git_tty', true );

// Shared files/dirs between deploys
set(
	'shared_files',
	[
		'.env',
	]
);
set(
	'shared_dirs',
	[
		'www/app/uploads',
	]
);

// Writable dirs by web server
set(
	'writable_dirs',
	[]
);

set( 'allow_anonymous_stats', false );

set( 'slack_webhook', getenv( 'SLACK_WEBHOOK' ) );
set( 'slack_text', '_{{user}}_ deploying `{{target}}` to *{{host}}*' );
set( 'slack_success_text', 'Deploy to *{{host}}* successful' );
set( 'slack_failure_text', 'Deploy to *{{host}}* failed' );

// Hosts
host( 'stage' )
	->setRemoteUser( 'www-adm' )
	->setHostname( getenv( 'DEPLOY_STAGE_IP' ) )
	->set( 'deploy_path', '/var/www/{{application}}' )
	->set(
		'branch',
		function () {
			return input()->getOption( 'branch' ) ?: 'develop';
		}
	)
	->set( 'host', 'stage' );

// Tasks
task(
	'npm:production',
	function() {
		run( 'cd {{release_path}} && npm run production' );
	}
);

task(
	'wp:clear-transients',
	function () use ( $clear_transients ) {
		foreach ( $clear_transients as $transient ) {
			run( 'cd {{deploy_path}}/current/www/wp &&  wp transient delete ' . $transient );
		}
	}
);


desc( 'Deploy your project' );
task(
	'deploy',
	[
		'deploy:prepare',
		'deploy:vendors',
		'deploy:clear_paths',
		'deploy:symlink',
		'deploy:unlock',
		'deploy:cleanup',
		'deploy:success',
	]
);

before( 'deploy', 'slack:notify' );
after( 'deploy:success', 'slack:notify:success' );
after( 'deploy:failed', 'slack:notify:failure' );

after( 'deploy:failed', 'deploy:unlock' );

after( 'deploy:shared', 'npm:install' );
after( 'deploy:shared', 'npm:production' );

before( 'deploy:cleanup', 'wp:clear-transients' );
