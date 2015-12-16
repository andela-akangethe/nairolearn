[![Coverage Status](https://coveralls.io/repos/andela-akangethe/nairolearn/badge.svg?branch=develop&service=github)](https://coveralls.io/github/andela-akangethe/nairolearn?branch=develop)
[![Circle CI](https://circleci.com/gh/andela-akangethe/nairolearn/tree/develop.svg?style=svg)](https://circleci.com/gh/andela-akangethe/nairolearn/tree/develop)

## Nairolearn

Nairolearn is an awesome stopover for developers around the world who fancy well curated YouTube tutorial videos.
It is user-collated, and only gets populated with awesome content by awesome developers around the world! This app is currently running [here](https://nairolearn.herokuapp.com).



## Installation

[PHP](https://php.net) 5.5+ and [Composer](https://getcomposer.org) are required.

1. Clone this repository: `git clone git@github.com:andela-akangethe/nairolearn.git nairolearn/`
2. `cd` into the nairolearn folder and run `composer install`
3. Run php -S localhost:8000 -t public
4. Visit localhost:8000 in your browser to see the app running.

## Database set-up

1. Create a mysql database with the name `nairolearn`
2. `cd` into the nairolearn folder and run `php artisan:migrate` to set up the required tables for the app.

## homestead

If you are using homestead, here are instructions to make the app available under `http://nairolearn.app`.

1. edit your `~/.homestead/Homestead.yaml`:
- in the section for `sites`, add
```
    map: nairolearn.app
    to: /home/homestead/nairolearn
```

2  in the section for `databases`, add
```
     nairolearn
```

3. run `vagrant provision` in your Homestead directory.

4. edit your `/etc/hosts` and add the following:
```
    192.168.10.10    nairolearn.app
```
