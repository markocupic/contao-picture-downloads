![Alt text](docs/logo.png?raw=true "logo")

# Contao picture downloads for Contao CMS

This Contao content element extends the Contao core content element "ce_downloads".
 Display a thumbnail instead of the filename if you like to serve images as download items.

![Contao Picture Downloads](docs/screenshot.png)

## Installation
`composer require markocupic/contao-picture-download`

Set the default Contao picture size in your `config/config.yml`. This will be used in the template to generate the thumbnails.
```
# config/config.yml
markocupic_contao_picture_downloads:
  picture_size: 3
  
```

Clear and warmup the cache with: ` vendor/bin/contao-console cache:warmup`

## Usage
Simply open a new contao downloads content element. 
 Select some pictures that you want to serve for download from the filesystem and 
 choose the "ce_downloads_picture" template.


This extension has been sponsored by [Kreadea](https://https://www.kreadea.de), Wiesbaden Germany

![kreadea](docs/kreadea.png)