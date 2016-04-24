#!/home2/ngtherap/python27/bin/python2.7
import cgitb
cgitb.enable()
print "Content-type: text/html\n\n";
print '<style>.main{margin-top:-25px}@media only screen and (max-width:768px){html{overflow-x:hidden}}.card-panel{height:400px;width:300px}.card-panel h5{margin-top:-8px;font-weight:700;padding-bottom:10px}.col{display:inline-block;padding:18px;float:left;height:400px;margin-bottom:50px;text-align:left}li.buttons{padding-top:12px!important}</style>'

print '<div align="center" style="padding-top: 50px;padding-left: 20px;" class="main">'

print '<div class="row">'
print '<div class="col ">'
print '<div align="center" class="card-panel " ng-show="vm.profile">'
print '<h5 align="center">{{ vm.profile.username }}</h5>'
print '<img class="circle" style="width:60%;" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" />'
print '<p class="profile__tagline">{{ vm.profile.tagline }}</p>'

print '</div>'
print '</div>'
print '<posts style="float:left;" posts="vm.posts"></posts>'
print '</div>'

print '</div>'
