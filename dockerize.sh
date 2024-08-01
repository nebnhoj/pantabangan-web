#!/bin/bash
rm -rf public/hot
npm run build
docker build -t pantabangan-web --platform linux/amd64 .
aws ecr get-login-password --region eu-central-1 | docker login --username AWS --password-stdin 548397470830.dkr.ecr.eu-central-1.amazonaws.com
docker tag pantabangan-web:latest 548397470830.dkr.ecr.eu-central-1.amazonaws.com/pantabangan-web:latest
docker push 548397470830.dkr.ecr.eu-central-1.amazonaws.com/pantabangan-web:latest
