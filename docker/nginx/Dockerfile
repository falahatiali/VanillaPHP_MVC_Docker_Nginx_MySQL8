FROM nginx:1.19.1-alpine

RUN ln -sf /dev/stdout /var/log/nginx/access.log && \
    ln -sf /dev/stderr /var/log/nginx/error.log && \
    rm -rf /etc/nginx/conf.d/*

#RUN apk add --update openssl && \
#    rm -rf /var/cache/apk/*
#
#RUN mkdir -p /etc/nginx/certificates
#
#RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/certificates/key.pem -out /etc/nginx/certificates/cert.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=example.com"

# put nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf
