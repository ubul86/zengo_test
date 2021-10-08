#!/bin/sh

chown -R www-data:www-data /srv/app && chmod -R 755 /srv/app

exec "$@"
