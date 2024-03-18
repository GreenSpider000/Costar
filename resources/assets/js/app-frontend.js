import axios from "axios";
import * as coreui from "@coreui/coreui";
import { Livewire } from "~vendor/livewire/livewire/dist/livewire.esm";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Livewire.start();

/**
 * Enable tooltips everywhere
 */
(function ininTooltip() {
    const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]') || [];
    [...tooltipTriggerList].map((tooltipTriggerEl) => new coreui.Tooltip(tooltipTriggerEl));
})();


/**
 * ScrollManager
 */
(function () {
	//////////////////////
	// Utils
	//////////////////////
	function throttle(fn, delay, scope) {
		// Default delay
		delay = delay || 100;
		let last, defer;
		return function () {
			let context = scope || this,
				now = +new Date(),
				args = arguments;
			if (last && now < last + delay) {
				clearTimeout(defer);
				defer = setTimeout(function () {
					last = now;
					fn.apply(context, args);
				}, delay);
			} else {
				last = now;
				fn.apply(context, args);
			}
		}
	}

	function extend(destination, source) {
		for (let k in source) {
			if (source.hasOwnProperty(k)) {
				destination[k] = source[k];
			}
		}
		return destination;
	}

	//////////////////////
	// END Utils
	//////////////////////

	//////////////////////
	// Scroll Module
	//////////////////////

	const ScrollManager = (function () {

		let defaults = {

			steps: null,
			navigationContainer: null,
			links: null,
			scrollToTopBtn: null,

			navigationElementClass: '.quick-navigation',
			currentStepClass: 'current',
			smoothScrollEnabled: true,
			stepsCheckEnabled: true,

			// Callbacks
			onScroll: null,

			onStepChange: function (step) {
				var self = this;
				var relativeLink = [].filter.call(options.links, function (link) {
					link.classList.remove(self.currentStepClass);
					return link.hash === '#' + step.id;
				});
				relativeLink[0].classList.add(self.currentStepClass);
			},

			// Provide a default scroll animation
			smoothScrollAnimation: function (target) {
				$('html, body').animate({
					scrollTop: target
				}, 'slow');
			}
		};

		let options = {};

		// Privates
		let _animation = null,
			currentStep = null,
			throttledGetScrollPosition = null;

		return {

			scrollPosition: 0,

			init: function (opts) {

				options = extend(defaults, opts);

				if (options.steps === null) {
					console.warn('Smooth scrolling require some sections or steps to scroll to :)');
					return false;
				}

				// Allow to customize the animation engine ( jQuery / GSAP / velocity / ... )
				_animation = function (target) {
					target = typeof target === 'number' ? target : $(target).offset().top;
					return options.smoothScrollAnimation(target);
				};

				// Activate smooth scrolling
				if (options.smoothScrollEnabled) {
				    this.smoothScroll();
				}

				// Scroll to top handling
				if (options.scrollToTopBtn) {
					options.scrollToTopBtn.addEventListener('click', function () {
						options.smoothScrollAnimation(0);
					});
				}

				// Throttle for performances gain
				throttledGetScrollPosition = throttle(this.getScrollPosition).bind(this);
				window.addEventListener('scroll', throttledGetScrollPosition);
				window.addEventListener('resize', throttledGetScrollPosition);

				this.getScrollPosition();
			},

			getScrollPosition: function () {
				this.scrollPosition = window.pageYOffset || window.scrollY;
				if (options.stepsCheckEnabled) {
				    this.checkActiveStep();
				}
				if (typeof options.onScroll === 'function') {
				    options.onScroll(this.scrollPosition);
				}
			},

			scrollPercentage: function () {
				let body = document.body,
					html = document.documentElement,
					documentHeight = Math.max(body.scrollHeight, body.offsetHeight,
						html.clientHeight, html.scrollHeight, html.offsetHeight);

				let percentage = Math.round(this.scrollPosition / (documentHeight - window.innerHeight) * 100);
				if (percentage < 0) {
				    percentage = 0;
				}
				if (percentage > 100) {
				    percentage = 100;
				}
				return percentage;
			},

			doSmoothScroll: function (e) {
				if (e.target.nodeName === 'A') {
					e.preventDefault();
					if (location.pathname.replace(/^\//, '') === e.target.pathname.replace(/^\//, '') && location.hostname === e.target.hostname) {
						var targetStep = document.querySelector(e.target.hash);
						if(targetStep) {
						    _animation(targetStep)
						} else {
						    console.warn('Hi! You should give an animation callback function to the Scroller module! :)');
						}
					}
				}
			},

			smoothScroll: function () {
				if (options.navigationContainer !== null) {
				    options.navigationContainer.addEventListener('click', this.doSmoothScroll);
				}
			},

			checkActiveStep: function () {
			    const scrollPosition = this.scrollPosition;

				[].forEach.call(options.steps, function (step) {
					let bBox = step.getBoundingClientRect(),
						position = step.offsetTop,
						height = position + bBox.height;

					if (scrollPosition >= position && scrollPosition < height && currentStep !== step) {
						currentStep = step;
						step.classList.add(options.currentStepClass);
						if (typeof options.onStepChange === 'function') {
						    options.onStepChange(step);
						}
					}
					step.classList.remove(options.currentStepClass);
				});
			},

			destroy: function () {
				window.removeEventListener('scroll', throttledGetScrollPosition);
				window.removeEventListener('resize', throttledGetScrollPosition);
				options.navigationContainer.removeEventListener('click', this.doSmoothScroll);
			}
		}
	})();

	window.ScrollManager = ScrollManager;

	//////////////////////
	// END scroll Module
	//////////////////////

})();
