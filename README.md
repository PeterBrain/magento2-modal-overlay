# Magento 2 Module - ModalOverlay

Package name: `peterbrain/magento2-modal-overlay`

- [Magento 2 Module - ModalOverlay](#magento-2-module---modaloverlay)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Method 1: Composer (recommended)](#method-1-composer-recommended)
    - [Method 2: Zip file (not recommended)](#method-2-zip-file-not-recommended)
    - [Enable \& deploy](#enable--deploy)
  - [Usage](#usage)
  - [In-depth information](#in-depth-information)

## Main Functionalities

- Display custom content from a static block in a modal.
- Show modal after a configurable amount of visited pages.

## Installation

### Method 1: Composer (recommended)

```bash
composer require peterbrain/magento2-modal-overlay
```

### Method 2: Zip file (not recommended)

- Unzip the zip file in `app/code/PeterBrain`

This extension requires [PeterBrain Core](https://github.com/PeterBrain/magento2-peterbrain-core). Ensure that you have it installed prior to installing this module. Use Composer to install it automatically with this module.

### Enable & deploy

```bash
bin/magento module:enable PeterBrain_ModalOverlay
bin/magento setup:upgrade
bin/magento setup:static-content:deploy
bin/magento cache:flush
```

## Usage

- Enable module output in `Stores > Configuration > PeterBrain Extensions > Modal Overlay > General Configuration`
- In Magento 2 admin, navigate to `Content > Blocks` and create a new static block with the identifier `modal-overlay_popup`.
- If the module is enabled, the static block exists and is enabled, the modal pops up:
  - when a user visits at least three pages
  - once per user (stored in local storage - cookieless!)

## In-depth information
The visited pages (count) and status of modal are stored in local storage as follows:
* `mage-cache-storage`: {"modal-overlay":{"displayed":false,"visited_pages":2}}
