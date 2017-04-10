# Project 10 - Honeypot

Time spent: 1 hours spent in total

> Objective: Setup a honeypot and provide a working demonstration of its features.

### Required: Overview & Setup

- [x] A basic writeup (250-500 words) on the `README.md` desribing the overall approach, resources/tools used, findings
- [x] A specific, reproducible honeypot setup, ideally automated. There are several possibilities for this:
    - A Vagrantfile or Dockerfile which provisions the honeypot as a VM or container
    - A bash script that installs and configures the honeypot for a specific OS
    - Alternatively, **detailed** notes added to the `README.md` regarding the setup, requirements, features, etc.

### Required: Demonstration

- [x] A basic writeup of the attack (what offensive tools were used, what specifically was detected by the honeypot)
- [x] An example of the data captured by the honeypot (example: IDS logs including IP, request paths, alerts triggered)
- [x] A screen-cap of the attack being conducted

### Optional: Features
- Honeypot
    - [ ] HTTPS enabled (self-signed SSL cert)
    - [ ] A web application with both authenticated and unauthenticated footprint
    - [ ] Database back-end
    - [ ] Custom exploits (example: intentionally added SQLI vulnerabilities)
    - [ ] Custom traps (example: modified version of known vulnerability to prevent full exploitation)
    - [ ] Custom IDS alert (example: email sent when footprinting detected)
    - [ ] Custom incident response (example: IDS alert triggers added firewall rule to block an IP)
- Demonstration
    - [ ] Additional attack demos/writeups
    - [ ] Captured malicious payload
    - [ ] Enhanced logging of exploit post-exploit activity (example: attacker-initiated commands captured and logged)



Overview & Setup & Demonstration:
I used the HoneyPress that was listed under Resources in the Assignment. It uses a Dockerfile, so everything is automated when you run `docker compose up -d`. After I set HoneyPress up, I ran `docker ps` to check the IP and port the HoneyPress was running on. In my local machine, the HoneyPress honeypress `honeypress_honeypress` was running on `192.168.99.100:8000` and HoneyPress dashboard `honeypress_dashboard` was running on `192.168.99.100:8000`. For some reason, nothing works on the HoneyPress dashboard, so I ran `docker exec honeypress bash -c 'tail /var/log/nginx/access.log'` after running `wpscan http://192.168.99.100` in a kali container and it showed a log of attacks that was used.

You can find instructions to set up HoneyPress below.
HoneyPress Github Repo: https://github.com/dustyfresh/HoneyPress

The log include the IP of the server (not attacker?), request paths, alerts triggered
```
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /feed/rdf/ HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /feed/atom/ HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /readme.html HTTP/1.1" 200 7359 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /sitemap.xml HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /wp-links-opml.php HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:03 +0000] "GET /wp-content/themes/twentysixteen/style.css HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:04 +0000] "GET /wp-content/themes/twentysixteen/readme.txt HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:04 +0000] "GET /wp-content/themes/twentysixteen/changelog.txt HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:04 +0000] "GET /wp-content/themes/twentysixteen/ HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
192.168.99.100 - - [10/Apr/2017:05:25:04 +0000] "GET /wp-content/themes/twentysixteen/error_log HTTP/1.1" 200 0 "http://192.168.99.100/" "WPScan v2.9.2 (http://wpscan.org)"
```

<img src="http://i.imgur.com/fPX8jDG.gif" title="Video walkthrough" />