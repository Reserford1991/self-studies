

# encode-encrypt-hash-python

## Theoretical info

There are three types of changing information shape:

- Encoding 
- Encryption 
- Hashing

Here is a table for general information about each of this methods:

| Type       | Requires a key | Reversible | Purpose 		  | Example        |
|------------|----------------|------------|------------------|----------------|
| Encoding   | No             | Yes        | Data formatting  | Base64, UTF-8  |
| Encryption | Yes            | Yes        | Confidentiality   | RSA, AES       | 
| Hashing.   | No             | No         | Data integrity   | SHA256, bcrypt |

So as we can see, Encoding and encryption is quite similar. The only difference is that Encoding uses some widely known algorythm

which can be decoded without a key (base64, zip). Encryption, on the other hand, uses key to encrypt and decrypt information. 

There are two types of encryption:

- Symmetric (SE)
- Asymmetric (RSA, elliptic curves)

Symmetric encryption uses the same key on both sides to encrypt and decrypt information. This is a huge vulnerability.

So, asymmetric encryption was created. It uses two keys: public and private. They are mathematically connected.

It means that data, encrypted with private key, can be decrypted using public key. 

But public key cannot be used to encrypt data.

The is why before exchanging any data, two computers should exchange public keys in order to transfer data.

As for hashing, it is used to make data volume smaller. For example, 1Tb of data can be transformed into 20Mb.

This method is used to check data integrity (before downloading large files from internet MD5, Git uses SHA1 to check commits)

or quick data search (hash tables),

or store data is secure way (passwords are hashed using scrypt or bcrypt).

## Instructions to run code

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