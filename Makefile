HOST := amirunninglinux.com
DIR  := ~/srv/www/amirunninglinux.com

all:
	@echo "This Makefile is used only for deployment."

deploy:
	ssh $(HOST) 'cd $(DIR); pwd; git pull && git submodule update'
