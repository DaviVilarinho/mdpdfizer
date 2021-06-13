# Dockerfile for php buster + pandoc image
FROM php:apache-buster

RUN apt update && apt install -y pandoc