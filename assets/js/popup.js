$('.popup').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  closeBtnInside: false,
  fixedContentPos: true,
  mainClass: 'mfp-with-zoom',
  image: {
	  verticalFit: true
  },
  zoom: {
	  enabled: true,
	  duration: 300,
	  opener: function(element) {
		  return element.find('img');
	  }
  }
});

