FROM registry.access.redhat.com/jboss-webserver-3/webserver31-tomcat7-openshift

USER root
RUN mkdir -p /home/jboss/.postgresql && \
    chmod 777 /home/jboss/.postgresql

COPY CERTS /tmp/CERTS

RUN chmod -R 777 /tmp/CERTS && \
    cp /tmp/CERTS/bundle.pem /home/jboss/.postgresql/bundle.pem && \
    cp /tmp/CERTS/mykeystore.jks $JAVA_HOME/jre/lib/security/pgkey.jks && \
    cp /tmp/CERTS/bundle.pem /etc/pki/ca-trust/source/anchors/ && \
    update-ca-trust enable && \
    update-ca-trust extract && \
    rm -rf $JWS_HOME/lib/mongo.jar && rm -rf $JWS_HOME/lib/mysql-connector-java.jar
    
USER jboss

RUN cat /tmp/CERTS/client-key.pem > /tmp/CERTS/client-userkey.pem && \
    chmod 600 /tmp/CERTS/client-userkey.pem

COPY icps.war $JWS_HOME/webapps/app#scr#icps#api.war
