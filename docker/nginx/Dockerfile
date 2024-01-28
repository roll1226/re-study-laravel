FROM nginx:1.20-alpine
LABEL maintainer="ucan-lab <yes@u-can.pro>"
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

ENV TZ=UTC

RUN curl -sL https://deb.nodesource.com/setup_16.x
RUN apk add --update nodejs npm

RUN apk update && \
  apk add --update --no-cache --virtual=.build-dependencies g++
RUN apk add --no-cache libstdc++ && apk add --no-cache libgcc

# nginx config file
COPY ./docker/nginx/*.conf /etc/nginx/conf.d/

WORKDIR /work/backend
