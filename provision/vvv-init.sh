#!/bin/bash
# Init script for a development site with a monolithic Git repo
# v1.0

# Edit these variables to suit your porpoises
# -------------------------------------------

# Just a human readable description of this site
SITE_NAME="IIS Start"
# The name (to be) used by MySQL for the DB
DB_NAME="iisstart"


echo "---------------------------"
echo "Commencing $SITE_NAME setup"

# Make a database, if we don't already have one
mysql -u root --password=root -e "CREATE DATABASE IF NOT EXISTS $DB_NAME; GRANT ALL PRIVILEGES ON $DB_NAME.* TO wp@localhost IDENTIFIED BY 'wp';"

if [[ ! -d "${VVV_PATH_TO_SITE}/www/wp" ]]; then
	cd ${VVV_PATH_TO_SITE}/
	echo "Copy default .env"
	cp -n ${VVV_PATH_TO_SITE}/provision/.env ${VVV_PATH_TO_SITE}/
	noroot composer install

	cd ${VVV_PATH_TO_SITE}/www/wp
	if ! $(noroot wp core is-installed); then
		pwd
		noroot wp core install --url=vvv.iisstart.se --title="IIS Start dev" --admin_name="admin" --admin_email="admin@local.dev" --admin_password="admin"
		noroot wp theme activate iis-start
		cd ${VVV_PATH_TO_SITE}/www/app/themes/iis-start

	fi
	# Activate plugins
	noroot wp plugin activate nginx-helper query-monitor

	# Create js and css
	cd ${VVV_PATH_TO_SITE}/
	make

fi

echo "$SITE_NAME init is complete";

