# Project 7 - WordPress Pentesting

Time spent: 1-2 hours spent in total

> Objective: Find, analyze, recreate, and document **five vulnerabilities** affecting an old version of WordPress

## Pentesting Report

1. (Required) WordPress <= 4.2.2 - Authenticated Stored Cross-Site Scripting (XSS)
  - [x] Summary:
    - Vulnerability types: XSS
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.3
  - [x] GIF Walkthrough:
    Link: http://imgur.com/j4wdJy2

    <img src="http://i.imgur.com/j4wdJy2.gif" title="Video Walkthrough" width="" alt="Video Walkthrough" data-canonical-src="http://i.imgur.com/cPltU29.gif" style="max-width:100%;">
  - [x] Steps to recreate: Add a post. In the text, add `<a href="[caption code=">]</a><a title=" onmouseover=alert('test')  ">link</a>` and publish
  - [x] Affected source code:
    - [Link 1](https://core.trac.wordpress.org/changeset/33359)
    - [Link 2](https://core.trac.wordpress.org/changeset/33357)
1. (Required) WordPress 2.5-4.6 - Authenticated Stored Cross-Site Scripting via Image Filename
  - [x] Summary:
    - Vulnerability types: XSS
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.10
  - [x] GIF Walkthrough:
    Link: http://imgur.com/3drxALY

    <img src="http://i.imgur.com/3drxALY.gif" title="Video Walkthrough" width="" alt="Video Walkthrough" data-canonical-src="http://i.imgur.com/cPltU29.gif" style="max-width:100%;">
  - [x] Steps to recreate: Upload an image called `a<img src=a onerror=alert(document.cookie)>.jpg` in Media Library, then view attachment page
  - [x] Affected source code:
    - [Link 1](https://github.com/WordPress/WordPress/commit/c9e60dab176635d4bfaaf431c0ea891e4726d6e0)
1. (Required) WordPress <= 4.3 - Authenticated Shortcode Tags Cross-Site Scripting (XSS) (Similar to #1 XSS vunerability)
  - [x] Summary:
    - Vulnerability types: XSS
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.5
  - [x] GIF Walkthrough:
    Link: http://imgur.com/YOEjusK

    <img src="http://i.imgur.com/YOEjusK.gif" title="Video Walkthrough" width="" alt="Video Walkthrough" data-canonical-src="http://i.imgur.com/cPltU29.gif" style="max-width:100%;">

  - [x] Steps to recreate: Add a post. In the text, add `TEST!!![caption width="1" caption='<a href="' ">]</a><a href="http://onMouseOver='alert(1)'">Click me</a>` and publish.
  - [x] Affected source code:
    - [Link 1](https://github.com/WordPress/WordPress/commit/f91a5fd10ea7245e5b41e288624819a37adf290a)
1. (Optional) Vulnerability Name or ID
  - [ ] Summary:
    - Vulnerability types:
    - Tested in version:
    - Fixed in version:
  - [ ] GIF Walkthrough:
  - [ ] Steps to recreate:
  - [ ] Affected source code:
    - [Link 1](https://core.trac.wordpress.org/browser/tags/version/src/source_file.php)
1. (Optional) Vulnerability Name or ID
  - [ ] Summary:
    - Vulnerability types:
    - Tested in version:
    - Fixed in version:
  - [ ] GIF Walkthrough:
  - [ ] Steps to recreate:
  - [ ] Affected source code:
    - [Link 1](https://core.trac.wordpress.org/browser/tags/version/src/source_file.php)

## Assets

List any additional assets, such as scripts or files

## Resources

- [WordPress Source Browser](https://core.trac.wordpress.org/browser/)
- [WordPress Developer Reference](https://developer.wordpress.org/reference/)

GIFs created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

I was running Wordpress docker image version 4.2.2. For some reason, it keeps updating to 4.2.13 (vulnerabilities were fixed) after I set up an admin user.

Since the database data is saved in the wp_data volume, I just reran the docker compose commands without removing the wp_data volume. After that, Wordpress was running on version 4.2.2

## License

    Copyright 2017 Raymond Yan

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.