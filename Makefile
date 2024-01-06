composer-install:
	docker run --rm \
		--volume ${PWD}:/app \
  		--volume ${HOME}/.config/composer:/tmp \
  		--volume /etc/passwd:/etc/passwd:ro \
  		--volume /etc/group:/etc/group:ro \
  		--user $(id -u):$(id -g) \
  		--interactive \
  		composer composer install
