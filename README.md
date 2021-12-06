# Sesha!
A starter theme for Wordpress developers by Andy Fairlie, to get you up and running quickly

The repo consists of two main folders : `sesha` and `sesha-child`. `sesha` is the parent theme, and code in this theme is available to all children themes that use it. You generally will

`sesha-child` is where the action takes place, and all your development lives.

Please see the `changelog.md` in sesha-child for commit history.

## Features
- Bootstrap 5 baked in
- Easy to configure Gulp script to build all CSS and JS, as well as transfer files to your host via FTP
- Clean set of PHP templates for getting up and running quick with Wordpress development
- Extensible Customizer theme options
- Parent theme 'Sesha' to keep generic code in
- Useful set of page templates for Bootstrap components and style guides
- Pattern library for all CSS styles available in Bootstrap


## Getting started
- run 'npm install' inside the sesha-child folder to install dependancies, and then run 'gulp' to build and watch CSS and JS
- run 'gulp deploy' to copy up files to your FTP location of choice, just make sure to configure it first in the gulpfile.js, with your FTP details
- run 'gulp production' to just generate a production ready version of your theme
- Make sure to rename the 'sesha-child' folder to something you want for your website, and edit the style.css file to reflect this too