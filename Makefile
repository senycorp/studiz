#####################################################
# Makefile for studiz								#
#													#
# @author Selcuk Kekec <senycorp@googlemail.com>    #
#####################################################

SHELL = /bin/sh

dump-autoload:
	@php artisan dump-autoload

clean:
	@php artisan cache:clear 
	@php artisan clear-compiled