# baixiu
this is a project that I make it with my own framework witch simulate ThinkPHP

I try to make it like the MVC frame,

all the core class file is in the lib/ directory,

and the view template is smarty which is in the frame directory,

now there are 3 group:admin,blog,employ,

the most work is done in the controller directory like blog/controller



some techinologies:

1,smarty framework, to separate the php and the html;

2,image process class, to add water to the image, to create the thumb image, to create the verify image(english or Chinese), adn etc;

3,pdo model to communicate with mysql;

4,send email, use phpmailer class, user sina mail proxy server;

5,use mysql to save the session;

6,use memcached to save some datas, reduce the request of mysql;

7,use phpminify to minify the size of js/css files and reduce the request of js/css files;

8,use my ajax model for XMLHttprequest;

9,use my event model to deal with the problems along different browsers;