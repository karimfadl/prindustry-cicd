FROM wordpress

MAINTAINER "KarimFadl" <karim.fadl@prindustry.nl>

COPY code/ /var/www/html

RUN chmod -R 775 /var/www/html
RUN chown -R www-data:www-data /var/www/html
