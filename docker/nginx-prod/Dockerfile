FROM nginx:1.9

RUN mkdir /app
WORKDIR /app

COPY ./docker/nginx-prod/vhost.conf /etc/nginx/conf.d/default.conf
COPY ./public /app/public