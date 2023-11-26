FROM ubuntu:22.04

ARG NEXUS_VERSION=3.62.0-01
ARG NEXUS_DOWNLOAD_URL=https://download.sonatype.com/nexus/3/nexus-3.62.0-01-unix.tar.gz

ENV SONATYPE_DIR=/opt/sonatype
ENV NEXUS_HOME=/opt/sonatype/nexus SONATYPE_WORK=/opt/sonatype/sonatype-work

ENV DEBIAN_FRONTEND noninteractive

RUN apt update && apt upgrade -y && apt install -y \
    curl openjdk-8-jdk-headless 

RUN groupadd --gid 200 -r nexus \
    && useradd --uid 200 -r nexus -g nexus -s /bin/false -d /opt/sonatype/nexus -c 'Nexus Repository Manager user' 

WORKDIR ${SONATYPE_DIR}

RUN curl -L ${NEXUS_DOWNLOAD_URL} --output nexus-${NEXUS_VERSION}-unix.tar.gz
RUN tar -xvf nexus-${NEXUS_VERSION}-unix.tar.gz \
     && rm -f nexus-${NEXUS_VERSION}-unix.tar.gz \
     && mv nexus-${NEXUS_VERSION} $NEXUS_HOME \
     && chown -R nexus:nexus ${SONATYPE_DIR} \
     && sed -ie s/^#run_as_user\=\"\"/run_as_user\=\"nexus\"/ ${NEXUS_HOME}/bin/nexus.rc
 

EXPOSE 8081/tcp

USER nexus

CMD ["sh", "-c", "/opt/sonatype/nexus/bin/nexus run"]
