import requests
import BeautifulSoup

url = 'http://www.reuters.com/finance/stocks/companyOfficers?symbol=GOOGL.O&WTmodLOC=C4-Officers-5'
response = requests.get(url)
html = response.content
print html

soup = BeautifulSoup(html)
table = soup.find('table', attrs={'class': 'dataTable'})
print table
