#!/home2/ngtherap/python27/bin/python2.7
import cgit
cgitb.enable()
import cgi
import threading
import time
import requests
import cgitb
from bs4 import BeautifulSoup
import html5lib

import sys

from flup.server.fcgi_fork import WSGIServer

def test_app(environ, start_response):
    start_response('200 OK', [('Content-Type', 'text/plain')])
    yield 'Hello, world!\n'

WSGIServer(test_app).run()