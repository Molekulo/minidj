![MINI - A naked barebone PHP application](_install/mini-logo.png)

# Short description of project
Application create and register user, login and CRUD system for songs in database and creating playlists.

# Instruction for configuration
Required:
*HTTP server (Apache, Nginx or similar)   
*PHP 7.0+
*MySQL or MariaDB
*PHP mod_rewrite activated

#Follow next steps for proper install
1. Install web server (LAMP, WAMP, MAMP or similar)
2. Make sure you have mod_rewrite activated on your server / in your environment. Some guidelines:
   [Ubuntu 14.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-14-04-lts/),
   [Ubuntu 12.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-12-04-lts/),
   [EasyPHP on Windows](http://stackoverflow.com/questions/8158770/easyphp-and-htaccess),
   [AMPPS on Windows/Mac OS](http://www.softaculous.com/board/index.php?tid=3634&title=AMPPS_rewrite_enable/disable_option%3F_please%3F),
   [XAMPP for Windows](http://www.leonardaustin.com/blog/technical/enable-mod_rewrite-in-xampp/),
   [MAMP on Mac OS](http://stackoverflow.com/questions/7670561/how-to-get-htaccess-to-work-on-mamp)
3. Install Git 
4. Clone MINI : git clone http://git.quantox.tech/milos.vidanovic/mini-mvc.git 'path/to/{project_root}'
5. Run sql scripts in order from _install/
6. Install Composer
7. Run composer install in your project dir
8. Edit database configuration in config/config.php
9. Edit your hosts file

# Description of functionality
1. Application allow to create user and add songs in playlist
2. List all songs from the database and adding, editing and soft deleting for users
3. Registration and login system for registered users
4. Administration panel for adding, changing and deleting roles privileges
