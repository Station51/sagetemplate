import $ from 'jquery';
import Filterizr from 'filterizr';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

// This will extend the $.fn prototype with Filterizr
Filterizr.installAsJQueryPlugin($);

window.onload = function() {
	var filterContainer = document.getElementsByClassName('filter-container');
	if (filterContainer.length > 0) {
    var options = {
			layout: 'sameWidth',
			gutterPixels: 10,
		}
    // eslint-disable-next-line no-undef
		filterizr = new Filterizr('.filter-container', options);
	}
 
}
  },
};
