FROM python:3.9

RUN pip3.9 install flask 
RUN pip3.9 install pypandoc
RUN pip3.9 install pandoc
RUN pip3.9 install gunicorn
RUN apt update
RUN apt install -y pandoc 
RUN apt install -y gunicorn 
RUN apt install -y texlive-base texlive-pictures texlive-fonts-recommended
