#!/home2/ngtherap/python27/bin/python2.7
import cgitb
#cgitb.enable()
import cgi
import threading
import time
import requests
import cgitb
from bs4 import BeautifulSoup
import html5lib

print "Content-type: text/html", "\n\n";


form = cgi.FieldStorage()
verb = str(form.getvalue('verb'))

if ticker == "":
	print "<h1> Please enter a valid ticker </h1>"


ticker = ticker.upper()

	
url = "http://la-conjugaison.nouvelobs.com/du/verbe/"  + verb = ".php"


print ""

headers={'User-Agent':' Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36'}
r = requests.get(url, headers=headers)
data = r.text
soup = BeautifulSoup(data, "html5lib")



print '<!DOCTYPE html>'
print '<html>'
print '<head>'
print '<meta charset="utf-8">'
print '<meta name=viewport content="width=device-width, initial-scale=1, user-scalable=no">'
print '<meta name="theme-color" content="#C8C8C8">'

print '</head>'
print '<body>'
print '<div class="main">'
print '<div align="center">'
print '<h3>'+ str(r.json()['Name']) + '</h3>'
print '<img style="padding: 20px;float:left;" src="'+fin+'" class="graph">'
print '<div class="data" style="text-align: left;padding: 20px;float:left;">'
print '<p> Last Price: $'  + str(r.json()['LastPrice']) + '</p>'
print '<p> Change: $'  + str(r.json()['Change']) + '</p>'
#print '<p> Change in Percent:'  + str((round(r.json()['ChangePercent'] * 10, 2))) + '</p>'
print '<p> High: $'  + str(r.json()['High']) + '</p>'
print '<p> Low: $'  + str(r.json()['Low']) + '</p>'
print '<p> Market Cap: $'  + str(r.json()['MarketCap']) + '</p>'
print '<p> Volume: '  + str(r.json()['Volume']) + ' shares </p>'
print '</div></div>'

print '<div style="width: 100%;float: right;"><h3 align="center">Management Team</h3></div>'
print '<div class="bordered">'

print soup.find('div', {'class' :'tempscorps'})
print '</div>'
print '</div>'
print '</body>'
print '</html>'
