# Project 10 - Fortress Globitek

Time spent: 2 hours spent in total

> Objective: Create an intentionally vulnerable version of the Globitek application with a secret that can be stolen.

### Requirements

- [x] All source code and assets necessary for running app
- [x] `/globitek.sql` containing all required SQL, including the `secrets` table
- [x] GIF Walkthrough of compromise
- [x] Brief writeup about the vulnerabilities introduced below

### Vulnerabilities

Describe the vuln(s) here.

I made my vulnerability fairly easy. I didn't want to make it too complicated. It doesn't require any of the kali linux tools that we used throughout the course, but you can if you know how to use it.

First Vulnerability: Security through obscurity

Second Vulnerability: Brute force (easy to guess username and password) admin/admin

Third Vulnerability: Exposing the "secret" URL in staff menu

Fourth Vulnerability: SQL Injection in the secret URL page. (e.g " OR "1"="1) at the end of the URL in the secret page with parameter


When you try to login in the staff login page, if an invalid username is used, it will be a different message than a valid username in the database (First Vulnerability: Security through obscurity).

The username and password is easy to guess (Second Vulnerability: Brute force (easy to guess username and password)).

Once logged in, the staff menu will have a hyperlink to the "secret" URL (Third Vulnerability: Exposing the "secret" URL in staff menu).

Once at the "secret" url with any param (secret=random). Append " OR "1"="1 at the end of the parameter.

<img src="http://i.imgur.com/0oCveWg.gif" title="Video walkthrough" style="max-width:100%;">