FROM php:8.0-apache
ADD php.ini /usr/local/etc/php/php.ini
ADD 000-default.conf /etc/apache2/sites-enabled

# 常に最新版のcomposerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libxrender1 \
libfontconfig \
fonts-ipafont \
# PHPからmysqlへはPDO接続をしていて、これがないと接続ができない
&& docker-php-ext-install pdo_mysql \
# mods-rewriteを有効化しないとルーティングが効かないらしい
&& mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled

# XDebugをインストール. xDebugは Dockerfile, php.ini, .vscode/launch.json それぞれに設定が必要
RUN pecl install redis xdebug && docker-php-ext-enable redis xdebug

# なぜか上のRUNと分けて書かないと上手く動かない
RUN /bin/sh -c a2enmod rewrite