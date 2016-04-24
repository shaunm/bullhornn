#!/home2/ngtherap/python27/bin/python2.7
import cgitb
cgitb.enable()
import threading
import time
import requests
import cgitb
from bs4 import BeautifulSoup
import html5lib

print "Content-type: text/html", "\n\n";
tick= "goog"
ticker = tick.upper()
urls= "https://www.google.com/finance?q=" + ticker
url = "http://dev.markitondemand.com/Api/v2/Quote/json?symbol="  + ticker
fin = 'http://www.finviz.com/chart.ashx?t=' +ticker +'&ty=p&ta=0&p=d&s=l'

print ""

headers={'User-Agent':' Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36'}
r = requests.get(url, headers=headers)

urlb = 'https://www.google.com/finance?q=' + ticker

t = requests.get(urlb, headers=headers)
data = t.text
soup = BeautifulSoup(data, "html5lib")


print '<!Doctype HTML>'
print '<html>'
print '<head>'
print '<meta charset="UTF-8">'
print '<meta http-equiv="refresh" content="60; url=#">'
print '<meta name="viewport" content="width=device-width, initial-scale=1">'
print '<link rel="stylesheet" href="bootstrap.css">'
print '<link rel="stylesheet" href="main2.css">'
print '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700" rel="stylesheet" type="text/css">'
print '<title>Project X </title>'
print '</head>'
print '<body>'
print '<div align="center">'
print '<img src="'+fin+'" class="graph"></div>'
print '<p> Name:'  + str(r.json()['Name']) + '</p>'
print '<p> Last Price:'  + str(r.json()['LastPrice']) + '</p>'
print '<p> Change:'  + str(r.json()['Change']) + '</p>'
#print '<p> Change in Percent:'  + str((round(r.json()['ChangePercent'] * 10, 2))) + '</p>'
print '<p> High:'  + str(r.json()['High']) + '</p>'
print '<p> Low:'  + str(r.json()['Low']) + '</p>'
print '<p> Market Cap:'  + str(r.json()['MarketCap']) + '</p>'
print '<p> Volume:'  + str(r.json()['Volume']) + '</p>'
print "<br><br><br>"
print soup.find('table', {'class' :'id-mgmt-table'})

print '</div>'
print '<script src="https://code.highcharts.com"></script>'
print '</body>'
print '<html>'
