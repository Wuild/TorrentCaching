TorrentCaching is an opensource torrent storage system.

Apache rewrite rules

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule .* - [L]

RewriteRule ^([_A-Za-z0-9-]+)/?$ index.php?module=$1 [NC,QSA,L]
RewriteRule ^([_A-Za-z0-9.]+).torrent/?$ index.php?module=torrent&var_a=$1 [NC,QSA,L]
RewriteRule ^([_A-Za-z0-9-]+)\/([_A-Za-z0-9\.]+)/?$ index.php?module=$1&var_a=$2 [NC,QSA,L]

nginx rewrite rules

if (-f $request_filename){
set $rule_0 1;
}
if (-d $request_filename){
set $rule_0 1;
}
if ($rule_0 = "1"){
}
rewrite ^/([_A-Za-z0-9-]+)/?$ /index.php?module=$1 last;
rewrite ^/([_A-Za-z0-9.]+).torrent/?$ /index.php?module=torrent&var_a=$1 last;
rewrite ^/([_A-Za-z0-9-]+)/([_A-Za-z0-9.]+)/?$ /index.php?module=$1&var_a=$2 last;