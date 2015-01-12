#!/bin/bash
# This hook fires at the end of elmsln/scripts/install/elmsln-install.sh
# You can put whatever you want in this file but below are some common needs
# that are used in other parts of the ELMSLN bash routines

# provide messaging colors for output to console
txtbld=$(tput bold)             # Bold
bldgrn=$(tput setaf 2)          #  green
bldred=${txtbld}$(tput setaf 1) #  red
txtreset=$(tput sgr0)
elmslnecho(){
  echo "${bldgrn}$1${txtreset}"
}
elmslnwarn(){
  echo "${bldred}$1${txtreset}"
}

# where am i? move to where I am. This ensures source is properly sourced
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR
# include our config settings
source ../../drush-create-site/config.cfg
# verify that the $elmsln variable is now set, meaning the source is included
if [ -z $elmsln ]; then
  elmslnwarn "please update your config.cfg file, elmsln variable missing"
  exit 1
fi

# whatever you want to do at this point at the end of the routine
# keep in mind that in most deployments, elmsln-install.sh has been recommended
# to run without sudo / as a non-root user. While it CAN be run as sudo, the
# directions included do not assume this
elmslnecho "elmsln-install post-install hook fired"
