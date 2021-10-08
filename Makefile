# # GENERAL # #

install:
	./shell/install.sh

# # NPM # #

npm-run:
	docker-compose run --rm npm run dev

npm-watch:
	docker-compose run --rm npm run watch    
