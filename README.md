

This is our approach of having a nice command line tool and library to work with united domains reselling.

As we are managing quite a lot domains for several customers right now we need to have an automatic solution to manage all those domains.

We use Chef and Ansible for this part as well.

# Installation

The installation is quite easy and should not take more than 5 Minutes so lets start.

## Pre-Requirements

To run this piece of software you are required to have php and composer running. As well you are required you have curl and php curl installed.

To get Composer please take a look on https://getcomposer.org/

## Commands

```
git clone https://github.com/AgenturPottkinder/UnitedDomains.git
composer install
```

Now copy `Config/config.php.default` to `Config/config.php` and add your own login data.

# Commands

This is a full list of all commands is here. Currently not a lot...

## Move Domain To SubAccount

With this command you are able to move a domain you already own to a subaccount which is already created.

```
./console.php ud:moveDomainToSubAccount domain.com subAccountName
```

# Support

This product is just for the use in the agency Pottkinder UG from Germany. If you required specific features or commands please do them on your own or ask me to do this work payed.

Otherwise we will do the job as soon as we require it or when free time is available.

# Support this code

It would be perfect if you'd just send us a pull request with fixes but if you don't know how to fix a problem or an error just add a new task here on github.

# Contact

To Contact me just write me an email to <bastian@agentur-pottkinder.de>