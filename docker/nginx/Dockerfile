FROM nginx

COPY nginx.conf /etc/nginx/nginx.conf
COPY sites-available.best-quest.local.conf /etc/nginx/sites-available/best-quest.local

RUN mkdir /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/best-quest.local /etc/nginx/sites-enabled/
RUN apt-get update --fix-missing
RUN apt-get install net-tools

RUN mkdir /app
