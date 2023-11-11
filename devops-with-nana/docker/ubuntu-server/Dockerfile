FROM ubuntu:latest

ENV TERM xterm
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone



# # Set Iran local settings
# RUN apt-get update && apt-get install -y --no-install-recommends \
#     locales \
#  && rm -rf /var/lib/apt/lists/* \
#  && localedef -i fa_IR -c -f UTF-8 -A /usr/share/locale/locale.alias fa_IR.UTF-8

# ENV LANG fa_IR.utf8
# ENV LANGUAGE fa_IR:fa
# ENV LC_ALL fa_IR.utf8


RUN apt update && apt upgrade -y \
    && apt install curl htop tree git -y


# # Install additional packages or configure your server here
# CMD ["bash"]

