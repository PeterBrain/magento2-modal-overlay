# Magento 2 Module - ModalOverlay

Package name: `peterbrain/magento2-modal-overlay`

- [Magento 2 Module - ModalOverlay](#magento-2-module---modaloverlay)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Method 1: Composer (recommended)](#method-1-composer-recommended)
    - [Method 2: Zip file (not recommended)](#method-2-zip-file-not-recommended)
    - [Enable & deploy](#enable--deploy)

## Main Functionalities

Display custom content from a static block in a modal

## Installation

### Method 1: Composer (recommended)

```bash
composer require peterbrain/magento2-modal-overlay
```

### Method 2: Zip file (not recommended)

- Unzip the zip file in `app/code/PeterBrain`

This extension is dependent on [PeterBrain Core](https://github.com/PeterBrain/magento2-peterbrain-core). Make sure you installed this first.

### Enable & deploy

```bash
php bin/magento module:enable PeterBrain_ModalOverlay
php bin/magento setup:upgrade
php bin/magento cache:flush
```
