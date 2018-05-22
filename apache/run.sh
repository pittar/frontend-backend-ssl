#!/bin/bash

cat /tmp/certs/postgresql.key > /tmp/postgresql-user.key
chmod 600 /tmp/postgresql-user.key

cat /tmp/certs/frontend.key > /etc/pki/tls/private/frontend.key
chmod 600 /etc/pki/tls/private/frontend.key

httpd -D FOREGROUND
