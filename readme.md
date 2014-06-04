# Leaderboard App

## Overview

A rebuild of the meteor.js app demo (http://michael.meteor.com/) in PHP and basic JQuery. In particular implemented with WebSockets so that the leaderboard is updated in real time as other clients connect to the server

## Build Specs

- A bundled local development server using Vagrant/VirtualBox via [Homestead](http://laravel.com/docs/homestead)
- PHP (with [Laravel Framework](http://laravel.com/))
    - Realtime event driven via websockets using [BrainSocket](https://github.com/BrainBoxLabs/brain-socket)
- JQuery
- Bootstrap with HTML5 Boilerplate
- MySQL

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

## Future Improvements

- Have server provisioning handled by [Ansible](http://www.ansible.com/home) instead
- Add websockets
- Add a queueing system(ZeroMQ) to sum up the transactions on a separate process
- Reimplement frontend in meteor or AngularJS