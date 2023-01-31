<?php
namespace Deployer;

require 'vendor/iis/deployer/src/recipe.php';
require __DIR__ . '/vendor/autoload.php';
( \Dotenv\Dotenv::createUnsafeImmutable( __DIR__ ) )->load();

set( 'application', getenv( 'APPLICATION_NAME' ) );
set( 'repository', getenv( 'REPOSITORY' ) );
set( 'slack_webhook', getenv( 'SLACK_WEBHOOK' ) );

// Hosts
host( 'stage' )
	->setHostname( getenv( 'DEPLOY_STAGE_IP' ) )
	->setRemoteUser( 'www-adm' )
	->setDeployPath( '/var/www/{{application}}' )
	->set( 'host', 'stage' );
