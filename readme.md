# Leaderboard App

## Overview

A rebuild of the meteor.js app demo (http://michael.meteor.com/) in PHP and basic JQuery.

## Local Dev Server

### Requirements

Please have the following installed on your local machine

- [Vagrant 1.6 and above](http://www.vagrantup.com/downloads.html)
- [Virtual Box (Latest)](https://www.virtualbox.org/wiki/Downloads)

### Start Up Instructions

To start up the local server please do the following in a command line interface of your choice (ie. Terminal)

* Clone this repo `git clone https://github.com/mechastorm/leaderboard.git`
* `cd leaderboard`
* Add the laravel dev box image - `vagrant box add laravel/homestead`
* Boot up the server - `vagrant up`. This will take about 5-8 mins
* Add the following urls to your local hosts file
    * `127.0.0.1            leaderboard.app`
* Assume the vagrant box has fully booted up fine, you can access the site now at `http://leaderboard.app:8000`

## Build Specs

- Vagrant via [Homestead](http://laravel.com/docs/homestead) (for Local Dev Server)
- PHP (with [Laravel Framework](http://laravel.com/))
- JQuery
- Bootstrap with HTML5 Boilerplate
- MySQL

## Future Improvements

- Add a queueing system(ZeroMQ) to sum up the transactions on a separate process
- Reimplement frontend in meteor or AngularJS