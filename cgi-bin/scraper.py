from bs4 import BeautifulSoup

import requests
ticker = raw_input("Enter a ticker: ")
url = 'https://www.google.com/finance?q=' + ticker

headers={'User-Agent':' Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36'}
r = requests.get(url, headers=headers)


data = r.text
#print data
soup = BeautifulSoup(data , "html.parser")
soup.find('table', {'class' :'id-mgmt-table'})

print "Soupe Time"
print soup.find('table', {'class' :'id-mgmt-table'})
