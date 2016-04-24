#!/usr/bin/python
import threading
import time
import requests
import cgitb
import sys

cgitb.enable()
sys.stdout.write("Content-type: text/html")
tick = "goog"
ticker = tick.upper()
urls= "https://www.google.com/finance?q=" + ticker
url = "http://dev.markitondemand.com/Api/v2/Quote/json?symbol="  + ticker
fin = 'http://www.finviz.com/chart.ashx?t=' +ticker +'&ty=p&ta=0&p=d&s=l'

sys.stdout.write("")

headers={'User-Agent':' Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36'}
r = requests.get(url, headers=headers)

sys.stdout.write('<!Doctype HTML>')
sys.stdout.write('<html>')
sys.stdout.write('<head>')
sys.stdout.write('<meta charset="UTF-8">')
sys.stdout.write('<meta http-equiv="refresh" content="60; url=#">')
sys.stdout.write('<meta name="viewport" content="width=device-width, initial-scale=1">')
sys.stdout.write('<link rel="stylesheet" href="bootstrap.css">')
sys.stdout.write('<link rel="stylesheet" href="main2.css">')
sys.stdout.write('<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700" rel="stylesheet" type="text/css">')
sys.stdout.write('<title>Project X </title>')
sys.stdout.write('</head>')
sys.stdout.write('<body>')
sys.stdout.write('<div align="center">')
sys.stdout.write('<img src="'+fin+'" class="graph">')

sys.stdout.write('<h1> Name:'  + str(r.json()['Name']) + '</h1>')
sys.stdout.write('<h1> Last Price:'  + str(r.json()['LastPrice']) + '</h1>')
sys.stdout.write('<h1> Change:'  + str(r.json()['Change']) + '</h1>')
sys.stdout.write('<h1> Change in Percent:'  + str(r.json()['ChangePercent']) + '</h1>')
sys.stdout.write('<h1> High:'  + str(r.json()['High']) + '</h1>')
sys.stdout.write('<h1> Low:'  + str(r.json()['Low']) + '</h1>')
sys.stdout.write('<h1> Market Cap:'  + str(r.json()['MarketCap']) + '</h1>')
sys.stdout.write('<h1> Volume:'  + str(r.json()['Volume']) + '</h1>')

sys.stdout.write('</div>')
sys.stdout.write('</body>')
sys.stdout.write('<html>')

