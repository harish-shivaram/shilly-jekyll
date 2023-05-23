import PhotoSwipeLightbox from '/assets/vendors/photoswipe/photoswipe-lightbox.esm.min.js';
import PhotoSwipeDynamicCaption from '/assets/vendors/photoswipe/photoswipe-dynamic-caption-plugin.esm.js';
const lightbox = new PhotoSwipeLightbox({
  gallery: '#pswp-grid-of-images',
  children: '.pswp-gallery__item',
  pswpModule: () => import('/assets/vendors/photoswipe/photoswipe.esm.min.js'),
  paddingFn: (viewportSize) => {
    return {
      top: 0,
	  bottom: 20,
	  left: 0,
	  right: 0
    }
  },
});

captionContent: (slide) => {
  return slide.data.element.querySelector('img').getAttribute('alt');
}

const captionPlugin = new PhotoSwipeDynamicCaption(lightbox, {
  // Plugins options, for example:
  type: 'below',
});

lightbox.init();
