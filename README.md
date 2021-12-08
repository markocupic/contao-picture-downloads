<p align="center"><a href="https://github.com/markocupic"><img src="docs/logo.png" width="200"></a></p>

# Contao picture downloads for Contao CMS

This Contao content element extends the Contao core content element "ce_downloads".
 Display a thumbnail instead of the
 filename if you like to serve images as download items.

![Contao Picture Downloads](docs/screenshot.png)

## Installation

```bash
composer require markocupic/contao-picture-download
```

Set the default Contao picture size in `config/config.yml`.
 This will be used to generate the thumbnails.

```bash
# config/config.yml
markocupic_contao_picture_downloads:
  picture_size: 3

```

Clear and warmup the cache with:
```bash
 vendor/bin/contao-console cache:warmup
```

## Usage

Simply open a new contao downloads content element.
 Select some pictures that you want to serve for download from the
 filesystem and choose the "ce_downloads_picture" template.

&nbsp;

---
This extension has been sponsored by [Kreadea](https://www.kreadea.de), Wiesbaden Germany
<p align="left"><a href="https://www.kreadea.de" title="KREADEA"><img src="docs/kreadea.png" width="150"></a></p>
