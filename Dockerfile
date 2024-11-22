FROM bitnami/laravel:10.3.3-debian-12-r5

COPY scripts/liblaravel.sh /opt/bitnami/scripts
WORKDIR /app
RUN chown -R www-data:www-data /app && chmod -R 775 /app
ENTRYPOINT [ "/opt/bitnami/scripts/laravel/entrypoint.sh" ]
CMD [ "/opt/bitnami/scripts/laravel/run.sh" ]
