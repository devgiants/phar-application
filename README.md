# PHAR Application Boilerplate
## Description

Embed everything needed to create a fully maintenable PHAR application

## Installation

```
composer create-project devgiants/phar-application
```

## Usage (TODO)
- Set .env and app/bin/.env
- Change src/App to your namespace
  - app/src/composer.json
  - All namespaces calls 
- Change box.json for app name
- Use Model/ApplicationCommand for common model with DI and logging


# PHAR Packager
This bash script goal is to ease tedious PHAR packaging process for a open-source app published on Github. This script is very specific to following case :
- Open-source project hosted on Github
- Use [Box](https://github.com/box-project/box2) for create package
- Use [Kherge version (abandoned)](https://github.com/kherge-abandoned/Version) to handle version number. TODO is to switch to maintained project ASAP
- Use a manifest system to publish phar archive to gh-pages. You can have live example on applications I created such as [livebox](https://github.com/devgiants/livebox/blob/gh-pages/manifest.json) or [websites-backup](https://github.com/devgiants/websites-backup/blob/gh-pages/manifest.json)

## Usage

Just make sur your local `master` branch is up-to-date, with README updated with good version number (the one you publish). Then: 

`./make-phar -n appname -v 1.2.3`


This will do, in order : 
1. Create local tag with version passed as argument
2. Push `master` branch to remote repo
3. Push tags to remote repo
4. Build PHAR using `box`
5. Move generated PHAR to `/tmp`
6. Checkout to `gh-pages`
7. Move generated archive from `/tmp` to `downloads/{appname}-{version}.phar`
8. Create matching manifest file
9. Push everything to `gh-page` remote branch.
10. Switch back to `master`