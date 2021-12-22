// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// import Fontawesome icons

import { library, dom, config } from '@fortawesome/fontawesome-svg-core';
import { faFacebook, faInstagram, faYoutube, faTwitter, faLinkedinIn, faFacebookF } from '@fortawesome/free-brands-svg-icons';
import { faEnvelope, faChevronRight, faCircle, faTimes, faSquare, faAddressCard, faArchway, faBalanceScale, faUser, faCalendar} from '@fortawesome/free-solid-svg-icons';
import { faBuilding, faCreditCard } from '@fortawesome/free-regular-svg-icons';


config.searchPseudoElements = true;

// Add the imported icons to the library
library.add( faEnvelope, faFacebook, faFacebookF, faInstagram, faYoutube, faTwitter, faLinkedinIn, faChevronRight, faCircle, faTimes, faBuilding, faSquare, faCreditCard, faAddressCard, faArchway, faBalanceScale,faUser, faCalendar);

// Tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

// Load Events
jQuery(document).ready(() => routes.loadEvents());
