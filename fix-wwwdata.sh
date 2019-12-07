#!/bin/bash
chgrp www-data $1 -R
chmod g+rw $1 -R
find $1 -type d -exec chmod g+x {} \;
