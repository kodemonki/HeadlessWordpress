FROM  ubuntu:xenial
RUN apt update && apt install -y nginx
EXPOSE 80
COPY . /var/www/html
CMD ["nginx", "-g", "daemon off;"]