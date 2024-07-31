#!/bin/bash
rm -rf public/hot
npm run build
docker build -t pantabangan-web --platform linux/amd64 .
docker tag pantabangan-web:latest 548397470830.dkr.ecr.eu-central-1.amazonaws.com/pantabangan-web:latest
docker push 548397470830.dkr.ecr.eu-central-1.amazonaws.com/pantabangan-web:latest
