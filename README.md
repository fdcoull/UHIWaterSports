# UHIWaterSports
An online shop designed and created for the "E-commerce: Publishing Websites" module in HNC Computing.

This workpiece showcases the front-end and back-end website development skills that I learned during this module such as the use of HTML, CSS and PHP. It also makes use of an SQL script that was created by a team of 5, myself included, for the "Team Working in Computing" module. On top of this, my skills in Javascript and Bootstrap were also used during this project but as this was knowledge I gained from outside of the course, the conditions of the assessment required that I credit the sources of this knowledge in the citations that can be found in notes throughout the code and the list of references which can be found below. The combination of these skills went into creating an e-commerce website for a fictional entity called "UHI Water Sports Centre".

## Introduction

The UHI Water Sports Centre requires a website to be created that will allow customers to place product orders using an online order form. Currently, buyers are required to manually fill in an order form before posting it back to the centre if they wish to purchase any items. The organisation wishes to update this process so that it can be done online.

The website must include a login page that requires an email address and password; a register page that takes details from the user; an ordering page for customers to purchase items and an order confirmation page with an option to print or save the confirmation. The site must also update the available stock after a customer makes an order.

## Installation

#### Tested and working on:
* Apache 2.4 and NGINX 1.20
* PHP 7.4
* MySQL 8.0 and MariaDB 10.6

Copy the contents of the project into a server's public website directory. Enter the SQL console, create a table named "uhiwatersports". After this, paste the contents of the file located at doc/create_and_populate_tables.sql then execute. Then edit the file found at src/Database/env.php and add database login credentials to "DB_USER" and "DB_PASSWORD" constants. Once done, go to the server's IP or domain name on a browser to view the website.

## User Manual
### Registering
* Click the user icon on the navigation bar.
* Then, click on the link titled “Or register by clicking here”.
* Enter user details in the form provided and click register.
* If there was no issue, you will be redirected back to the login screen with a success message.

### Logging In
* Click the user icon on the navigation bar.
* Fill in your login details and click login.
* If there was no issue, you will be redirected to a page containing account information and a success message.

### Viewing Account Details
* At any point after logging in, click the user icon on the navigation bar.
* Your account details will be presented to you.

### Logging Out
* While logged in, click the user icon on the navigation bar.
* Then, click the log out button at the bottom of the page.
* You will be logged out, redirected to the login page and presented with a success message.

### Adding an Item to the Shopping Cart
* Click the shop button on the navigation bar.
* If you see an item you would like to add to the basket you can quick add from the shop page, by changing the value in the number box and then clicking the plus symbol, or you can click on the item name or image to view it in more detail.
* On the item’s page you can read a brief description and view a large size image. Here, the item can also be added to the shopping cart, again by changing the value in the number box and clicking the plus symbol. If you don’t want to add the item to the shopping cart just click the back arrow button on the top right of the page to go back to the shop.

### Removing an Item from the Shopping Cart
* Click the shopping cart icon on the navigation bar.
* Then, look for the item you want to remove and click the waste bin icon to the right of it and the
item will be removed.

### Edit an Item Quantity in the Shopping Cart
* Click the shopping cart icon on the navigation bar.
* Then, click the link titled “(Change)”, next to the quantity of the item you want to change.
* You will be redirected to an edit quantity form. Edit the value in the number box and click the change button.

### Emptying the Shopping Cart
* Click the shopping cart icon on the navigation bar.
* Then, click the waste bin icon at the bottom of the page (next to the place order button).
* Your cart will then be emptied, and you will be presented with a notice indicating that there are no items in your cart.

### Placing an Order
* Click the shopping cart icon on the navigation bar.
* Click the place order button at the bottom of the page.
* Your order will be placed, and you will be redirected to an order confirmation page containing details of the order. From here, the page can be printed by clicking the print page button or you can go back to the site’s front page by clicking the return to home page button.

## References
Alexcican. (2019) How to remove .php, .html, .htm extensions with .htaccess [online]. Available from <https://alexcican.com/post/how-to-remove-php-html-htm-extensions-with-htaccess/> [6th May 2020]

Alibaba. (2020) 60v 2200w electric boat motor jet boat engine trolling motor [online]. Available from <https://www.alibaba.com/product-detail/60v-2200w-electric-boat-motor-jet_62498217699.html> [6th May2020]

Amazon. (2020) Lixada Children Life Jacket Vest Kayaking Boating Swimming Safety Jacket Waistcoat 77lbs Capacity Child Water Buddies [online]. Available from <https://www.amazon.in/Children-Kayaking-Swimming-Waistcoat-Capacity/dp/B07J64XL4F> [6th May 2020]

Amazon. (2020) Mesle Mono Slalom Water Ski Stick KD Comp – Ski Free Carve Red 65/165 cm [online]. Available from <https://www.amazon.co.uk/MESLE-Slalom-Water-Stick-Carve/dp/B01M4S0RFC> [6th May 2020]

Anassa. (2015) Watersports [online]. Available from <https://www.anassa.com/en-gb/sports1/package/watersports> [6th May 2020]

Bananasinc. (2020) Old Town Discovery 119 [online]. Available from <http://bananasinc.com/product/old-town-discovery-119/> [6th May 2020]

Bootstrap, Github. (2019) Bootstrap Releases [online]. Available from <https://github.com/twbs/bootstrap/releases/> [6th May 2020]

ckuijjer, Stack Overflow. (2015) How to change btn color in Bootstrap [online]. Available from <https://stackoverflow.com/questions/28261287/how-to-change-btn-color-in-bootstrap> [6th May 2020]

DIVE LINE STORE. (2020) FOURTH ELEMENT HELIOS 5MM SHORTIE [online]. Available from <https://www.divelinestore.com/products/fourth-element-helios-5mm-shortie> [6th May 2020]

FlyingFishOnline. (2018) Why I became a Watersports Instructor [online]. Available from <https://www.flyingfishonline.com/news/why-i-became-a-watersports-instructor/> [6th May 2020]

Guillaume Piolle, Wikipedia. (2009) Monoski [online]. Available from <https://en.wikipedia.org/wiki/Monoski> [6th May 2020]

HackingWithPHP. (2018) Lock your tables when appropriate [online]. Available from <http://www.hackingwithphp.com/18/2/22/lock-your-tables-when-appropriate> [6th May 2020]

Jordan Running, Stack Overflow. (2010) How can I access an object property named as a variable in php? [online]. Available from <https://stackoverflow.com/questions/3515861/how-can-i-access-an-object-property-named-as-a-variable-in-php> [6th May 2020]

jQuery. (2020) JQuery Core - All Versions [online]. Available from <https://code.jquery.com/jquery/> [6th May 2020]

River Ness Rafting Company Ltd, VisitScotland. (2018) River Ness Rafting Company Ltd [online]. Available from <https://www.visitscotland.com/info/see-do/river-ness-rafting-company-ltd-p1939331> [6th May 2020]

Steve Matteson, Google Fonts. (2013) Open Sans [online]. Available from <https://fonts.google.com/specimen/Open+Sans> [6th May 2020]

TheSpainEvent. (2015) Valencia Water Rafting [online]. Available from <https://www.thespainevent.com/stag/valencia-stag-do/white-water-rafting/> [6th May 2020]

WalkHighlands. (2007) River Ness and Caledonian Canal circuit, Inverness [online]. Available from <https://www.walkhighlands.co.uk/lochness/Riverness.shtml> [6th May 2020]

Wetsuit Centre. (2018) Billabong 2mm Tahiti Reef Walker Wetsuit Boots 2019 - Black [online]. Available from <https://www.wetsuitcentre.co.uk/billabong-2mm-tahiti-reef-walker-wetsuit-boots-2018-black.html> [6th May 2020]

w3schools. (2014) Bootstrap Carousel [online]. Available from <https://www.w3schools.com/bootstrap/bootstrap_carousel.asp> [6th May 2020]

w3schools. (2015) Bootstrap Navigation Bar [online]. Available from <https://www.w3schools.com/bootstrap/bootstrap_navbar.asp> [6th May 2020]

w3schools. (2012) CSS @font-face Rule [online]. Available from <https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp> [6th May 2020]

w3schools. (2017) How To Create An Overlay [online]. Available from <https://www.w3schools.com/howto/howto_css_overlay.asp> [6th May 2020]

w3schools. (2014) HTML Charset [online]. Available from <https://www.w3schools.com/html/html_charset.asp> [6th May 2020]

w3schools. (2006) PHP key() function [online]. Available from <https://www.w3schools.com/php/func_array_key.asp> [6th May 2020]

w3schools. (2006) PHP reset() function [online]. Available from <https://www.w3schools.com/php/func_array_reset.asp> [6th May 2020]

w3schools. (2006) PHP Sessions [online]. Available from <https://www.w3schools.com/php/php_sessions.asp> [6th May 2020]

w3schools. (2015) Responsive Web Design Viewport [online]. Available from <https://www.w3schools.com/css/css_rwd_viewport.asp> [6th May 2020]

zessx, Stack Overflow. (2013) Change navbar color in Twitter Bootstrap [online]. Available from <https://stackoverflow.com/questions/18529274/change-navbar-color-in-twitter-bootstrap> [6th May 2020]
