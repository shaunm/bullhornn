#!/home2/ngtherap/python27/bin/python27
import sys, os
import os
import sys
import gae2django
gae2django.install()


if __name__ == "__main__":
    os.environ.setdefault("DJANGO_SETTINGS_MODULE", "thinkster_django_angular_boilerplate.settings")

    from django.core.management import execute_from_command_line

    execute_from_command_line(sys.argv)
