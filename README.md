# Expressive Skeleton PHP Application

## Requirements

Nginx, PHP >=5.5, php-ext: standarts + php redis, Composer, Redis Server, Mysql Server, shared public/media folder.

## Getting Started

Start your project with composer:

```bash
$ composer install
```

After choosing and installing the packages you want, go to the
`<project-path>` and start PHP's built-in web server to verify installation:

```bash
$ composer serve
```

You can then browse to http://localhost:8080.

## Skeleton Development

```bash
$ composer check
```

## Running with docker

Before start you should have working docker.

If using docker-machine run `eval $(docker-machine env)`

1. Build images, install project dependencies and run existing tests: `./init.sh`
2. Start local server: `docker-compose up -d nginx` 
