<?php

/**
 * Public Folder:
 * Front of the application (root)
 * - main index.php
 * - all the routing happens in here
 * - static assets [html, css, javascript]
 * - site built in image
 */

/*
 # make sure mode_rewrite is enabled [usually turned on by defaults]
<IfModule mod_rewrite>
Options -Multiviews
# turning on rewrite engine
RewriteEngine On
# rewrite base to specified folder
RewriteBase /phpmvc/public
# check if requested file is not found
# go to rewrite rule 
# which is to redirects to index.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
# routing everything through index.php
# index.php will cgange url
# from index.php?=posts
# to equivalent public/posts
</IfModule>
 */