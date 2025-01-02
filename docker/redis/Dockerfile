FROM redis

# Set a default value for the cache expiration time (in seconds)
ENV CACHE_EXPIRATION_TIME 3600

# Copy the configuration file to the container
#COPY redis.conf /usr/local/etc/redis/redis.conf

# Start Redis with the custom configuration file
CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]
