#!/home2/ngtherap/python27/bin/python27
import sys, os

# Add a custom Python path.
sys.path.insert(0, '/home2/ngtherap/python27')
sys.path.insert(13, '/home2/ngtherap/thinkster_django_angular_boilerplate')

os.environ['DJANGO_SETTINGS_MODULE'] = 'thinkster_django_angular_boilerplate.settings'
from django.core.servers.fastcgi import runfastcgi
runfastcgi(method="threaded", daemonize="false")
