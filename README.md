# Introduction

This repository contains project codes for [**codeforthekingdom.org**](codeforthekingdom.org) jakarta hackaton by the contributors.

# Directory structure

- ```app/``` => Application code container
  - ```[module]```/ => Application module container
    - ```client/``` => Module client side scripts
      - ```templates/``` => Module html template file
        - ```[page|partials].[templateName].html``` =>
            Template file where the ```templateName``` must be ```<template>```
            element ```name``` value
      - ```helper.js``` => Template helper script
      - ```main.js``` => Route declarations
    - ```server/``` => Server side scripts
      - TBD
- ```lib/``` => Server and client helper/library code
- ```public/``` => public assets file (eg. uploaded images etc.)
- ```themes/``` => themes (TBD) to
  - ```[theme]/``` => Theme folder
    - ```index.html``` => Theme main layout template where ```<template>```
        element ```name``` attribute value must be ```[theme]Layout```
- ```main.js``` => Application main.js
- ```main.html``` => Application base html
