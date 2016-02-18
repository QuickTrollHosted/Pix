pix
===============

setup
------------------

1.  create a MySQL database and import **schema.sql** or a PostgreSQL database and import **schema_postgres.sql**
2.  edit **config.php**
3.  create **upload** hierarchy and default temp files
        mkdir -p upload/{img,original,thumb}
        touch cron.last totalsize
4.  change write permissions for **upload** directory and **cron.last** file
        chown -R you:httpd upload/ cron.last totalsize
        chmod -R 775 upload/ cron.last totalsize
5.  enjoy
