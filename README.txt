Apache rewrite rules
====================
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule .* - [L]

RewriteRule ^(torrent\/)?([0-F]{40})(\.torrent)?/?$ index.php?page_url=$2 [NC,QSA,L]
RewriteRule ^([_A-Za-z0-9-]+)/?$ index.php?page_url=$1 [NC,QSA,L]
RewriteRule ^([_A-Za-z0-9-]+)\/([_A-Za-z0-9-]+)/?$ index.php?page_url=$1&page_action=$2 [NC,QSA,L]


nginx rewrite rules
===================

rewrite "^/(torrent/)?([0-F]{40})(\.torrent)?$" /index.php?page_url=$2 last;
rewrite ^/([_A-Za-z0-9-]+)/?$ /index.php?page_url=$1 last;
rewrite ^/([_A-Za-z0-9-]+)\/([_A-Za-z0-9-]+)/?$ /index.php?page_url=$1&page_action=$2 last;