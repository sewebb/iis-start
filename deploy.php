<?php
namespace Deployer;

require 'recipe/common.php';
require 'recipe/npm.php';
require 'recipe/slack.php';
use Dotenv\Dotenv;
use function Env\env;

$dotenv = Dotenv::createUnsafeImmutable( __DIR__ );

if ( file_exists( __DIR__ . '/.env' ) ) {
	$dotenv->load();
} else {
	die( 'Please create an .env file to continue' );
}

/**
 * Clear transients listed in this array
 */
$clear_transients = [
	'iis_styleguide_sprite',
];

// Project name
set( 'application', 'iis-start.iis.se' );

// Project repository
set( 'repository', 'git@github.com:sewebb/iis-start.git' );

// [Optional] Allocate tty for git clone. Default value is false.
set( 'git_tty', true );

set( 'ssh_type', 'native' );

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
set( 'slack_text', '_{{user}}_ deploying `{{branch}}` to *{{target}}*' );
set( 'slack_success_text', 'Deploy to *{{target}}* successful' );
set( 'slack_failure_text', 'Deploy to *{{target}}* failed' );

// Hosts
host( 'stage' )
	->user( 'www-adm' )
	->hostname( getenv( 'DEPLOY_STAGE_IP' ) )
	->set( 'deploy_path', '/var/www/{{application}}' );

// Tasks
task( 'npm:production', 'npm run production' );

task(
	'reload:php-fpm',
	function () {
		run( 'sudo /etc/init.d/php7.4-fpm reload' );
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
		'deploy:info',
		'deploy:prepare',
		'deploy:lock',
		'deploy:release',
		'deploy:update_code',
		'deploy:shared',
		'deploy:writable',
		'deploy:vendors',
		'deploy:clear_paths',
		'deploy:symlink',
		'deploy:unlock',
		'cleanup',
		'success',
	]
);

before( 'deploy', 'slack:notify' );
after( 'success', 'slack:notify:success' );
after( 'deploy:failed', 'slack:notify:failure' );

after( 'deploy', 'reload:php-fpm' );

after( 'deploy:failed', 'deploy:unlock' );

after( 'deploy:shared', 'npm:install' );
after( 'deploy:shared', 'npm:production' );

before( 'cleanup', 'wp:clear-transients' );
