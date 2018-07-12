# Learnosity API Demos

Jumpstart your integration of the Learnosity APIs into your learning platform.


## Overview

This repository has been designed to allow users to quickly view and interact with some of the core Learnosity APIs.

Each page shows a basic integration to a specific Learnosity API which you can utilise and learn from.

There is also a SignatureUtils class which simplifies the generation of the security signatures for each of the types.

### Requirements

* PHP 5.6+
* the `make` utility (usually available in the development tools of your platform)
* You must be connected to the internet to use this site


## Getting Started

The following shows you how to get the code in this repository up and running as
a stand-alone site. First, get the code with

    git clone https://github.com/Learnosity/learnosity-demos.git

You can then use the simple `Makefile` included with this project to just start
one or the other modes, by running either of the following commands from the
directory that was just created.

    make run-php  # See “Using PHP's native server” below to see what this does

or

    make run-vagrant  # See “Using Vagrant” below for additional information

You can then visit http://localhost:8080 in a browser.

Note that you must use *localhost* as the domain (not 127.0.0.1). Any port is
fine but the internal security in some of the APIs is domain restricted. So
until you contact Learnosity to whitelist specific domains, access is restricted
to *localhost*.

### Using PHP's native server

You can use the local server to quickly get up and running, no Apache/IIS is
required.

*Additional requirement*: You will need [composer] to fetch dependencies such as
the Learnosity SDK. Please refer to the next section about installing composer.
Note that the `make`-based instructions in the “Getting Started” section take
care of this for you.

    git clone https://github.com/Learnosity/learnosity-demos.git
    cd learnosity-demos
    composer install
    cd www
    php -S localhost:8080

#### Installing composer

See [composer-getting-started] for instructions on setting it up on your
platform.

Note that the `make`-based instructions in the “Getting Started” section take
care of the following for you.

For simplicity, the `get-composer.sh` script can be used to fetch a
local version of composer. It will be named `composer.phar`, and will have to be
called as `./composer.phar` instead of just `composer`.

If using Mac OS X, you can set up [Homebrew] to use a specific tap.

    brew tap homebrew/php
    brew install composer

### Using Vagrant

Vagrant is a wrapper for controlling Virtual Machines in a controlled and
isolated manner. Vagrant supports all the major platforms and is simple to use
and very handy for other development tasks (if you're not already using it!).
Vagrant by default supports VirtualBox as it's VM host, but it does support
others like VMWare, Parallels, and even AWS EC2.

The included `Vagrantfile` will download a VM image and install all the needed
PHP dependancies. Once the VM is running the demos can be used (and modified)
without you needing to install anything else.

*Additional requirements*: In order to use this method, you need to have installed:
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

Once these are installed using this demo is as easy as :

    git clone https://github.com/Learnosity/learnosity-demos.git
    cd learnosity-demos
    vagrant up

You can modify files and have the results served by the VM instantly.

To control the VM you can do one of the following :
* Stop the VM: `vagrant halt`
* Start the VM: `vagrant up`
* Destroy the VM: `vagrant destroy`


## Consumer


This package comes with demo security (consumer) credentials. If you have your own consumer details (as provided by Learnosity) you may use them by editing ```config.php```


## Documentation

More API documentation is available at the [Learnosity Docs site](http://docs.learnosity.com)


[composer]: https://getcomposer.org
[composer-getting-started]: https://getcomposer.org/doc/00-intro.md
[homebrew]: https://brew.sh/
