## Nginx

* 1.1 添加nginx官方库

在http://nginx.org/packages/centos/7/noarch/RPMS/ 查看最新库信息
~~~
    # rpm -Uvh http://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm
~~~

* 1.2 安装nginx

~~~
    # yum -y install nginx
~~~

* 1.3 查看Nginx版本

~~~
    # nginx -v
    nginx version: nginx/1.12.0
~~~

* 1.4 配置防火墙开启HTTP服务端口

~~~
    # firewall-cmd --permanent --add-service=http
    # firewall-cmd --reload
~~~

* 1.5 启动nginx并设为开机自启

~~~
    # systemctl start nginx.service
    # systemctl enable nginx.service
~~~

* 1.6 如果Apache服务在运行会出现冲突，关闭并移除Apache

~~~
    # systemctl stop httpd.service
    # systemctl disable httpd.service
    # yum -y remove httpd
~~~

* 1.7查看Nignx状态

~~~
    # systemctl status nginx
~~~

~~~
   server
   {
       listen 80; #监听80端口
       server_name default.com www.default.com; #绑定域名 default.com 和 www.default.com
       index index.html index.htm index.php; #设置首页文件，越前优先级越高
       charset utf-8; #设置网页编码

       root  /home/wwwroot/default; #设置站点根目录

       #运行 PHP
       location ~ .*\.php$
       {
           fastcgi_pass  127.0.0.1:9000 #默认使用9000端口和PHP通信
           #fastcgi_pass  unix:/dev/shm/php-fpm-default.sock; #使用 unix sock 和PHP通信
           fastcgi_index index.php;
           fastcgi_param DOCUMENT_ROOT  /home/wwwroot/default; #PHP 文档根目录
           fastcgi_param SCRIPT_FILENAME  /home/wwwroot/default$fastcgi_script_name; #PHP 脚本目录
           include fastcgi_params;
           try_files $uri = 404;
       }

       #设置文件过期时间
       location ~ .*\.(gif|jpg|jpeg|png|bmp|swf|flv|mp3|wma)$
       {
           expires      30d;
       }

       #设置文件过期时间
       location ~ .*\.(js|css)$
       {
           expires      12h;
       }

       #设置文件访问权限
       location ~* /templates(/.*)\.(bak|html|htm|ini|old|php|tpl)$ {
           allow 127.0.0.1;
           deny all;
       }

       #设置文件访问权限
       location ~* \.(ftpquota|htaccess|htpasswd|asp|aspx|jsp|asa|mdb)?$ {
           deny all;
       }

       #保存日志
       access_log /var/log/nginx/default-access.log main;
       error_log /var/log/nginx/default-error.log crit;
   }
~~~

