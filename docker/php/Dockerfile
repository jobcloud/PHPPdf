FROM php:8.3-alpine3.22

ARG USER_ID

# PHP: Copy configuration files & remove dist files
RUN mkdir /phpIni
COPY php/files/bin/ /usr/local/bin/

# SYS: Install required packages
RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh autoconf gcc g++ make gettext sudo shadow

RUN if [ -n "$USER_ID" ] && [ "$USER_ID" -lt 60001 ]; then \
        usermod -u ${USER_ID} -o www-data; \
    fi

# USER: set /bin/bash and allow www-data to become root
RUN usermod -s /bin/bash www-data && \
    echo 'www-data ALL=(ALL) NOPASSWD: ALL' > '/etc/sudoers.d/www-data'

# USER: copy home
COPY --chown=www-data:www-data php/files/user-home /home/www-data

# USER: add ssh key and fix permission of the ssh directory
RUN ln -s /run/secrets/ssh_host_key /home/www-data/.ssh/id_rsa && \
    chmod 700 /home/www-data/.ssh && \
    chmod 400 /home/www-data/.ssh/config

# PHP: Install php extensions
RUN pecl channel-update pecl.php.net

# COMPOSER: install binary
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

USER www-data

WORKDIR /var/www/html
