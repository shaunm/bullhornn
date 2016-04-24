#!/usr/bin/python
import threading
import time
import cgitb

cgitb.enable()
print "Content-type: text/html", "\n\n";

print ""

headers={'User-Agent':' Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36'}
#r = requests.get(url, headers=headers)

print '<!Doctype HTML>'
print '<html>'
print '<head>'
print '<meta charset="UTF-8">'
print '<meta http-equiv="refresh" content="60; url=#">'
print '<meta name="viewport" content="width=device-width, initial-scale=1">'
print '<link rel="stylesheet" href="bootstrap.css">'
print '<link rel="stylesheet" href="main2.css">'
print '<title>Project X </title>'
print '</head>'
print '<body>'
print '<div align="center">'
print "Hello World <h1> Hello </h2>"
print '</div>'
print '</body>'
print '<html>'
