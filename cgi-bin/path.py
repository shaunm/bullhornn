#!/usr/bin/python
import cgitb
cgitb.enable()
import sys
print "Content-type: text/html", "\n\n";
print"<h1>The PATH is: " + str(sys.path) + "</h1>"