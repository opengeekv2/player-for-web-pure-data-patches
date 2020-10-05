wordpress-web-pure-data.zip:
	cd ../../../.. && make composer-install-plugin-wordpress-web-pure-data-for-deploy
	yarn install
	yarn start
	zip -r wordpress-web-pure-data.zip dist inc vendor composer.json LICENSE README.md wordpress-web-pure-data.php
