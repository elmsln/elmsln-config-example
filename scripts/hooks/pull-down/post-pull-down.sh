#!/usr/bin/sh

# run whatever calls you need to after a site has been pulled down into this instance
# this important when used for pulling a production / dev instance down to local vagrant
# for example.
# arguement $1 passed in is the email address entered in the source file since its a common variable
# to use to rewrite settings / reroute email
# argument $2 is the aliasgroup to perform executions against in drush like @elmsln or @courses-all
