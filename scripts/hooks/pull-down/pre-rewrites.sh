#!/usr/bin/sh

# function JUST before we start to write all the new systems to this instance
# this fires after the rsync has pulled everything down into this instance but
# before it actually starts to cycle through and forcibly replace things local
# to this server its running on. This can be used in vagrant to replace any files
# needed from the config directory we just pulled down OR to do critical backups
# and other things you might not have taken otherwise