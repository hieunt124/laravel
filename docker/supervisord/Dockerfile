FROM python:3.8

# Install supervisor
RUN apt-get update && \
    apt-get install -y supervisor && \
    mkdir -p /var/log/supervisor && \
    mkdir -p /etc/supervisor/conf.d

# Copy your supervisor config file
COPY supervisord.conf /etc/supervisor/conf.d/

# Install any other dependencies you need
RUN pip install requests

CMD ["/usr/bin/supervisord", "-n"]
