from django.db import models
from thinkster_django_angular_boilerplate.authentication.models import Account


class Post(models.Model):
    author = models.ForeignKey(Account)
    content = models.TextField()
    company = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __unicode__(self):
        return '{0}'.format(self.content)
