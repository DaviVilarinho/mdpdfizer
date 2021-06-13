# Dockerfile for php buster + pandoc image
FROM php:apache-buster

RUN apt update 
RUN apt install -y pandoc texlive-full