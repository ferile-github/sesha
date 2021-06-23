# sesha
A starter theme for Wordpress developers

Please see the changelog.md in sesha-child for commit history

## Features
- Bootstrap 5.01 baked in
- Easy to configure gulp build for front end assets
- Clean set of PHP templates for getting up and running quick with Wordpress development
- Extensible Customizer theme options
- Parent theme 'Sesha' to keep generic code in
- Useful set of page templates for Bootstrap components and style guides

## Getting started
- run 'npm install' inside the sesha-child folder to install dependancies, and then run 'gulp' to build and watch CSS and JS
- run 'gulp deploy' to copy up files to your FTP location of choice, just make sure to configure it first in the gulpfile.js, with your FTP details
- run 'gulp production' to just generate a production ready version of your theme
- Make sure to rename the 'sesha-child' folder to something you want for your website, and edit the style.css file to reflect this too