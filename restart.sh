#!/bin/bash

microk8s kubectl delete deployment apache
microk8s kubectl delete service apache

docker image rm apache:latest localhost:32000/apache
docker image build . -t apache
docker image tag apache localhost:32000/apache
docker image push localhost:32000/apache

microk8s kubectl apply -f apache.yaml
