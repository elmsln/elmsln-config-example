elmsln-config-example
=====================
ELMSLN example config directory, this has been abstracted from the management
of the original elmsln.git repo so that there are less file conflicts when in
production. If you are building a new ELMSLN deployment you'll want to delete
the config directory in the base repo and swap it out with this one.

ELMSLN has gone out of its way in structure to ensure that all loose ends are tied up and that all data it stores (in code) that could have security implications only lives in one directory; config.
