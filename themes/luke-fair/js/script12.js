// const swal = require('sweetalert2')
const $ = jQuery;
app = {};
app.menu;
app.firstLoad = true;

app.init = function () {
	app.scrollFix();
	app.scrollEvents();
	app.toggleHamburger();
	app.formSubmission();
};

// wordpress doesn't play nicely with anchor points so this is my workaround
app.scrollFix = () => {
	const url = window.location.href.split("#");
	if (url.length == 2) {
		let target = document.getElementById(url[1]);
		target.scrollIntoView(true);
	}
};

app.scrollEvents = () => {
	// initializing variables
	let targets;
	let scrollHeight;
	let vh = window.innerHeight;
	let menuToggle = $(".hamburger-button");
	let aboutCard;
	let testimonialCard;
	let contactCard;
	let formCard;
	let showAlways = false;

	// images loading changes height of these so they need frequent updates
	setParamsBelowWork = () => {
		contactCard = $(".contact-card").offset().top;
		formCard = $(".contact-form").offset().top;
	};
	// these are set on load and on window resize
	const setParams = () => {
		targets = $(".project-container");
		aboutCard = $(".bio-container").offset().top;
		testimonialCard = $(".testimonial-container").offset().top;
		setParamsBelowWork();
		scrollHeight = $(window).scrollTop();
		vh = window.innerHeight;
	};

	setParams();

	// determine when and in which color to display the hamburger menu
	const showHamburger = () => {
		setParamsBelowWork();
		scrollHeight = $(window).scrollTop() + 20;
		if (scrollHeight > vh || showAlways == true) {
			menuToggle.addClass("show");
			if (scrollHeight > formCard - 10) {
				console.log("clear form");
				menuToggle.removeClass("light");
			} else if (scrollHeight > contactCard) {
				menuToggle.addClass("light");
				console.log(scrollHeight, contactCard);
			} else if (scrollHeight > testimonialCard) {
				menuToggle.removeClass("light");
			} else if (scrollHeight > aboutCard) {
				menuToggle.addClass("light");
			} else if (scrollHeight < aboutCard) {
				menuToggle.removeClass("light");
			}
		}
		if (scrollHeight < vh && showAlways == false) {
			menuToggle.removeClass("show");
		}
	};

	// giving the page a little time to load the important things
	setTimeout(() => {
		if (window.innerWidth <= 620) {
			showAlways = true;
		} else {
			showAlways = false;
		}
		showHamburger();
	}, 201);

	// was running into issues here so I'm only calling this when the user has ended resizing
	let timer = window.setTimeout(function () {}, 0);
	$(window).on("resize", function () {
		if (window.innerWidth <= 620) {
			showAlways = true;
		} else {
			showAlways = false;
		}
		window.clearTimeout(timer);
		timer = window.setTimeout(function () {
			setParams();
			showHamburger();
			console.log("paramsSet");
		}, 500);
	});

	// check project position relative to top and add visibility class for css transition
	const fadeInProjects = () => {
		scrollHeight = $(window).scrollTop();
		for (let i = 0; i < targets.length; i++) {
			let positionFromTop = $(targets[i]).offset().top;
			if (positionFromTop - scrollHeight <= 0 + 0.9 * vh) {
				targets[i].classList.add("is-visible");
				if ($(targets[targets.length-1]).hasClass("is-visible")) {
					// disable listening
					$(window).off("scroll", fadeInProjects);
				}
			}
		}
	};

	// start listening
	$(window).on("scroll", fadeInProjects);
	$(window).on("scroll", showHamburger);
};

app.toggleHamburger = () => {
	hamburgerOpen = $(".hamburger-button");

	hamburgerOpen.on("click", () => {
		$(".hamburger-nav").addClass("show");
		$(".hamburger-dimmer").addClass("show");
	});

	hamburgerClose = () => {
		$(".hamburger-nav").removeClass("show");
		$(".hamburger-dimmer").removeClass("show");
	};

	$(".hamburger-close").on("click", hamburgerClose);
	$(".hamburger-nav li").on("click", hamburgerClose);
	$(".hamburger-dimmer").on("click", hamburgerClose);
};

app.error = false;
// preventing empty form submissions
app.formSubmission = function () {
	$("form").on("submit", (e) => {
		e.preventDefault();
		if ($('form input:not([type="submit"])').val() === "" || ($("form textarea").val() === "" && app.error == false)) {
			console.log("you cannot send an empty email");
			$(".submit").addClass("fail").val("Please fill out all fields!");
			setTimeout(() => {
				$(".submit").removeClass("fail").val("Send it");
			}, 2000);
		} else {
			app.postEmail();
		}
	});
};

// preventing formspree rerouting, let's make this look nice and smooth
app.postEmail = function () {
	console.log("function called");
	$.ajax({
		url: "https://formspree.io/mvownvnl",
		method: "POST",
		data: {
			name: "unavailable",
			email: $("#email").val(),
			message: $("#message").val(),
		},
		dataType: "json",
	})
		.success(function () {
			$('form input:not([type="submit"]), textarea').val("");
			console.log("sent");
			$(".submit").addClass("success").val("Email Sent!");
			setTimeout(() => {
				$(".submit").removeClass("success").val("Send it");
			}, 2000);
		})
		.error((error) => {
			app.error = true;
			console.log(error);
			$(".submit").addClass("fail").val("Server error, please email me directly");
			setTimeout(() => {
				$(".submit").removeClass("fail").val("Send it");
				app.error = false;
			}, 2000);
		});
};

$(function () {
	app.init();
});
