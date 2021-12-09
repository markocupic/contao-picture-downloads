<p align="center"><a href="https://github.com/markocupic"><img src="docs/logo.png" width="200"></a></p>

# Contao picture download/downloads for Contao CMS

This Plugin extends the Contao Core content elements **Download** (ce_download) and **Downloads** (ce_downloads).
 The extension allows you to display a thumbnail instead of the
 filename if you like to offer one or more images as download items.

![Contao Picture Downloads](docs/screenshot.png)

## Installation

Execute the following command to install the extension:
```bash
composer require markocupic/contao-picture-download
```

Afterwards you have to set the picture size (id) for the **ce_download** and **ce_downloads** element in `config/config.yml`.
 This will be used to generate the thumbnails.

```yaml
# config/config.yml
markocupic_contao_picture_downloads:
 ce_downloads_picture_size: 3
 ce_download_picture_size: 2
```

If you habe done, clear and warmup the cache with:
```bash
 vendor/bin/contao-console cache:warmup
```

## Usage

- Go to the Contao backend and simply create a new Contao Core **download** or **downloads** content element.
- Select one or more pictures that you want to offer for download from the Contao filesystem.
- Choose the "ce_download_picture" or "ce_downloads_picture" template.
- Save and check your settings in the frontend.

&nbsp;

---
This extension has been sponsored by [Kreadea](https://www.kreadea.de), Wiesbaden Germany
<p align="left"><a href="https://www.kreadea.de" title="KREADEA"><img src="docs/kreadea.png" width="150"></a></p>
