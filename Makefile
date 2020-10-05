web-pure-data.zip:
	cd ../../../.. && make composer-install-plugin-wordpress-web-pure-data-for-deploy
	yarn install
	yarn start
	zip -r web-pure-data.zip dist inc vendor composer.json LICENSE README.txt web-pure-data.php
