# .bashrc
# User specific aliases and functions
alias mv='mv -i'
alias rm='rm -i'
alias cp='cp -i'

# Source global definitions
if [ -f /etc/bashrc ]; then
	. /etc/bashrc
fi


			

export LC_ALL=en_US.UTF-8
export LANG=en_US.UTF-8
#/home2/ngtherap/python27/bin/python2.7
#PATH=/homeX/your_username/python27/bin:$PATH
PATH=/home2/ngtherap/python27/bin/:$PATH
export PYTHONPATH=$HOME/ngtherap/python27/bin/python2.7:$PYTHONPATH
export PYTHONPATH=$HOME/ngtherap/python27/:$PYTHONPATH
export PATH=/home2/ngtherap/python27/bin/python2.7:$PATH

