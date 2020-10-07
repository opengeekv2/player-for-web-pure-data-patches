web-pure-data.zip:
	cd ../../../.. && make composer-install-plugin-player-for-web-pure-data-patches-for-deploy
	yarn install
	yarn start
	zip -r player-for-web-pure-data-patches.zip dist inc vendor composer.json LICENSE README.md web-pure-data.php
