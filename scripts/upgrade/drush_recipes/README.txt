ELMSLN Config - upgrades for D7

by placing things in the correct naming convention, you can better structure updates that get rolled out to different stacks.

Example:

alias: @elmsln.courses.art010
path : elmsln/scripts/upgrade/drush_recipes/d7/elmsln/courses-all/
file : d7_elmsln_courses_art010_1630936991.drecipe
drush: drush @courses.art010 drup d7_elmsln_courses_art010 elmsln/scripts/upgrade/drush_recipes