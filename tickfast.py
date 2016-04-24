#!/home2/ngtherap/python27/bin/python2.7
import cgitb
cgitb.enable()
import cgi
import threading
import time
import requests
import cgitb
from bs4 import BeautifulSoup
import html5lib

print "Content-type: text/html", "\n\n";


form = cgi.FieldStorage()
ticker = str(form.getvalue('ticker'))

ticker = ticker.upper()

	
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



print '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name=viewport content="width=device-width, initial-scale=1, user-scalable=no"><meta name="theme-color" content="#C8C8C8"><link rel="icon" sizes="192x192" href="//bullhornn.com/apple-touch-icon.png"><meta name="apple-mobile-web-app-title" content="Bullhornn"><link rel="apple-touch-icon" href="//bullhornn.com/apple-touch-icon.png"/><meta name="mobile-web-app-capable" content="yes"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"><title>Bullhornn</title><style>nav a{color: black!important;}nav,.nav-wrapper{color: black;background-color: white;}@media only screen and (max-width: 768px){.graph{padding:0px!important;width:100%!important;}}@media only screen and (max-width: 768px){html{overflow-x: hidden;}}</style></head><body><nav><div class="nav-wrapper"><a href="//bullhornn.com" class="brand-logo"><img style="border: 0;height: 60px;width: auto;padding: 5px; padding-left: 20px;" src="//bullhornn.com/lg1.svg"/></a><a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="padding-left: 20px; ">menu</i><ul class="right hide-on-med-and-down"><li><a href="//bullhornn.com/account.html">My Account</a></li><li><a href="//bullhornn.com/signup.html">Sign Up</a></li><li><a href="//bullhornn.com/login.html">Login</a></li><li><a href="//bullhornn.com/help.html">Help</a></li></ul><ul class="side-nav" id="mobile-demo"><li><a href="//bullhornn.com/account.html">My Account</a></li><li><a href="//bullhornn.com/signup.html">Sign Up</a></li><li><a href="//bullhornn.com/login.html">Login</a></li><li><a href="//bullhornn.com/help.html">Help</a></li></ul></div></nav>'
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
print '<script>$( document ).ready(function(){$(".button-collapse").sideNav();})</script>'
print '<div style="width: 100%;float: right;"><h3 align="center">Management Team</h3></div>'
print '<div style="width: 70%;margin-left: 20%;" class="bordered">'

print soup.find('table', {'class' :'id-mgmt-table'})
print '</div></div><script>$( "table" ).addClass( "bordered" );</script><script src="https://code.highcharts.com"></script><style>@media only screen and (min-width: 768px){img.footer-logos{width:8%}}@media only screen and (max-width: 768px){img.footer-logos{width:15%}}.site-footer{color:rgb( 136, 136, 136);background-color:rgb( 17, 17, 17);;padding-bottom:2px}.site-footer a{color:rgb(204, 204, 204)}.site-footer a:focus,.site-footer a:hover{color:white}.site-footer .footer-logo{padding:80px 0 30px;text-align:center}.site-footer .footer-widgets{padding:80px 0;background-color:rgb(20, 20, 20)}.site-footer .footer-widgets .widget-title{color:white;text-transform:uppercase}.site-footer .footer-bottom{text-align:center}.site-footer .footer-bottom .footer-text{padding:0 0 30px}.col-md-12,.cscontainer{padding-left:15px;padding-right:15px}.site-footer .footer-bottom .social-list ul{display:inline-block;background-color:black}.site-footer .footer-bottom .social-list a{width:44px;height:44px;line-height:44px}.site-footer .footer-bottom .social-list a:hover{background-color:rgb(69, 143, 47)}.site-footer .footer-bottom:first-child .footer-text,.site-footer .footer-widgets+.footer-bottom .footer-text{padding-top:30px}.cscontainer{margin-right:auto;margin-left:auto}@media (min-width:768px){.cscontainer{width:750px}}@media (min-width:992px){.cscontainer{width:970px}}@media (min-width:1200px){.cscontainer{width:1170px}}.col-md-12{position:relative;min-height:1px}@media (min-width:992px){.col-md-12{float:left;width:100%}}</style>'<footer class="site-footer"> <div class="footer-logo"> <div class="cscontainer"> <div class="row"> <div class="col-md-12"> <a href="index.html"><img class="circle footer-logos" src="//bullhornn.com/apple-touch-icon.png"></a></div></div></div></div><div class="footer-bottom"> <div class="cscontainer"> <div class="row"> <div class="col-md-12"> <div class="footer-text"> Copyright 2015. <a href="index.html">Next Generation Therapeutics LLC. </a>. All Rights Reserved. </div></div></div><p style="margin-bottom:2px;margin-right:-10px;font-size:xx-small">* CONTENT DISCLAIMER: ALL INFORMATION PROVIDED ON NEXT GENERATION THERAPEUTICS LLC WEBSITES ARE PROVIDED FOR INFORMATION PURPOSES ONLY. INFORMATION ON OFFICIAL NEXT GENERATION THERAPEUTICS LLC WEBSITES IS SUBJECT TO CHANGE WITHOUT PRIOR NOTICE. ALTHOUGH EVERY REASONABLE EFFORT IS MADE TO PRESENT CURRENT AND ACCURATE INFORMATION, NEXT GENERATION THERAPEUTICS LLC MAKES NO GUARANTEES OF ANY KIND. IN NO EVENT SHALL NEXT GENERATION THERAPEUTICS LLC BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR INCIDENTAL DAMAGE RESULTING FROM, ARISING OUT OF OR IN CONNECTION WITH THE USE OF THE INFORMATION FROM THE SITE </p></div></div></footer><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script></body></html>'