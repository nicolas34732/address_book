# address_book

Simple responsive Address Book Webapp

Observations about development e testing

Development and testing machine platform:
Linux Mint 17.2 Rafaela 32bit / Kernel 3.16.0-38-generic

LAMP Stack:

Apache:
Server version: Apache/2.4.7 (Ubuntu)
Server built:   Oct 14 2015 14:18:49

MySQL:
Ver 14.14 Distrib 5.5.46, for debian-linux-gnu (i686) using readline 6.3

PHP:
PHP 5.5.9-1ubuntu4.14 (cli) (built: Oct 28 2015 01:32:13) 
Copyright (c) 1997-2014 The PHP Group
Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies
    with Zend OPcache v7.0.3, Copyright (c) 1999-2014, by Zend Technologies

Database Management:
MySQL Workbench Community (GPL) for Linux/Unix version 6.0.8  revision 11354 build 833
phpMyAdmin Version information: 4.0.10deb1

App worked as expected on the following Web Browsers:
Chromium Version 47.0.2526.73 Built on Ubuntu 14.04, running on LinuxMint 17.2
Opera for Linux Version 12.16 Build 1860

Minor responsiveness issues on:
Mozilla Firefox 42.0


OBS:

=> File /config.php: It has some constants that may need to be changed according how and "where" this code will be executed.

-> Line 3 defines directory path where source files must be put (file system);
-> Line 4 defines where the browser will find the page (web system).
-> Variables declared on lines 14-18 are used by ADOdb Database Abstraction Library (http://adodb.sourceforge.net/) as "arguments" from DB connection.

=> Original Database settings: Name:"address_book_db" Colation: "latin1_swedish_ci") .
=> Import address_book_table.sql .
=> Uncompress source files to run it locally ("address_book").

Author: Nicolas Corbellini Leipnitz
Further info: nicolas.nic@mail.com
