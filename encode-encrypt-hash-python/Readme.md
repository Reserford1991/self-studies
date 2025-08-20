

## encode-encrypt-hash-python

This folder is dedicated to my python experiments with encoding, encryption and hashing in python.

I created just one .py script file and work in it. 

I also tried to work with this project on my android phone.

I order to be able to do that, I have installed such apps: 
- Acode - IDE for android
- Termux - command line tool for android phones

In order to be able to run python scripts in python I've installed such Acode extensions:
- Python Runner
- AcodeX - Terminal

Beside that, I've installed python, git and axs server in termux:

> pkg update && pkg upgrade

> pkg install python

> python --version

It should give you something like Python 3.x.x.

> pkg install python-pip

> pip --version

> pip install requests numpy pandas flask

> g install git

> git config --global user.name "Your Name"

> git config --global user.email "your@email.com"

> pkg install nodejs

> curl -sL https://raw.githubusercontent.com/bajrangCoder/acode-plugin-acodex/main/installServer.sh | bash

Start the terminal server with:

> axs

After that I granted Termux access to shared folder:

> termux-setup-storage

The first time you run this, Android will show a permission popup asking if Termux can access files. Tap Allow.

This command creates a new directory inside Termux:

> ~/storage/downloads   →   /storage/emulated/0/Download

> ~/storage/shared      →   /storage/emulated/0

So instead of typing /storage/emulated/0/Download, just do:

> cd ~/storage/downloads
> ls

I`ll see project folder and files.