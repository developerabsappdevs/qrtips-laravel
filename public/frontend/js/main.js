(function ($) {
"user strict";


// header-fixed
var fixed_top = $(".header-section");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 100){  
        fixed_top.addClass("animated fadeInDown header-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown header-fixed");
    }
});

//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();

// scroll-to-top
var ScrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 100) {
      ScrollTop.removeClass("active");
  } else {
      ScrollTop.addClass("active");
  }
});

//Odometer
// if ($(".statistics-item,.icon-box-items,.counter-single-items").length) {
//   $(".statistics-item,.icon-box-items,.counter-single-items").each(function () {
//     $(this).isInViewport(function (status) {
//       if (status === "entered") {
//         for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
//           var el = document.querySelectorAll('.odometer')[i];
//           el.innerHTML = el.getAttribute("data-odometer-final");
//         }
//       }
//     });
//   });
// }
// Odometer - Keep this as is for functionality
if ($(".stats-item,.icon-box-items,.counter-single-items").length) {
  $(".stats-item,.icon-box-items,.counter-single-items").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
}

// faq
$('.faq-wrapper .faq-title').on('click', function (e) {
  var element = $(this).parent('.faq-item');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('.faq-content').removeClass('open');
    element.find('.faq-content').slideUp(300, "swing");
  } else {
    element.addClass('open');
    element.children('.faq-content').slideDown(300, "swing");
    element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
    element.siblings('.faq-item').removeClass('open');
    element.siblings('.faq-item').find('.faq-title').removeClass('open');
    element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
  }
});

// slider
var swiper = new Swiper(".testimonial-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.slider-next',
    prevEl: '.slider-prev',
  },
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  breakpoints: {
    1199: {
    slidesPerView: 1,
    },
    991: {
    slidesPerView: 1,
    },
    767: {
    slidesPerView: 1,
    },
    575: {
    slidesPerView: 1,
    },
  }
});

// nice-select
$(".nice-select").niceSelect(),

// lightcase
 $(window).on('load', function () {
  $("a[data-rel^=lightcase]").lightcase({
    inline: {
        width: 8000,
        height: 8000
      },
  });
})

// custom Select
$('.custom-select').on('click', function (e) {
  e.preventDefault();
  $(".custom-select-wrapper").removeClass("active");
  if($(this).siblings(".custom-select-wrapper").hasClass('active')) {
    $(this).siblings(".custom-select-wrapper").removeClass('active');
    $('.body-overlay').removeClass('active');
  }else {
    $(this).siblings(".custom-select-wrapper").addClass('active');
    $('.body-overlay').addClass('active');
  }
});
$('.body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.custom-select-wrapper').removeClass('active');
  $('.body-overlay').removeClass('active');
});

$('.custom-option').on('click', function(){
  $(this).parent().find(".custom-option").removeClass("active");
  $(this).addClass('active');
  var flag = $(this).find("img").attr("src");
  var currencyCode = $(this).find(".custom-currency").text();
  $(this).parents(".custom-select-wrapper").siblings(".custom-select").find(".custom-select-inner").find(".custom-currency").text(currencyCode);
  $(this).parents(".custom-select-wrapper").siblings(".custom-select").find(".custom-select-inner").find("img").attr("src",flag);
  $(this).parents(".custom-select-wrapper").removeClass("active");
  $('.body-overlay').removeClass('active');
});

$('.custom-option').on('click', function(){
  $(this).parent().find(".custom-option").removeClass("active");
  $(this).addClass('active');
  var method = $(this).find(".title").text();
  $(this).parents(".custom-select-wrapper").siblings(".custom-select").find(".custom-select-inner").find(".method").text(method);
  $(this).parents(".custom-select-wrapper").removeClass("active");
  $('.body-overlay').removeClass('active');
});

// sidebar
$(".sidebar-menu-item > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// active menu JS - sidebar
function splitSlash(data) {
  return data.split('/').pop();
}
function splitQuestion(data) {
  return data.split('?').shift().trim();
}
var pageNavLis = $('.sidebar-menu a');
var dividePath = splitSlash(window.location.href);
var divideGetData = splitQuestion(dividePath);
var currentPageUrl = divideGetData;

// find current sidevar element
$.each(pageNavLis,function(index,item){
    var anchoreTag = $(item);
    var anchoreTagHref = $(item).attr('href');
    var index = anchoreTagHref.indexOf('/');
    var getUri = "";
    if(index != -1) {
      // split with /
      getUri = splitSlash(anchoreTagHref);
      getUri = splitQuestion(getUri);
    }else {
      getUri = splitQuestion(anchoreTagHref);
    }
    if(getUri == currentPageUrl) {
      var thisElementParent = anchoreTag.parents('.sidebar-menu-item');
      (anchoreTag.hasClass('nav-link') == true) ? anchoreTag.addClass('active') : thisElementParent.addClass('active');
      (anchoreTag.parents('.sidebar-dropdown')) ? anchoreTag.parents('.sidebar-dropdown').addClass('active') : '';
      (thisElementParent.find('.sidebar-submenu')) ? thisElementParent.find('.sidebar-submenu').slideDown("slow") : '';
      return false;
    }
});

//sidebar Menu
$('.sidebar-menu-bar').on('click', function (e) {
  e.preventDefault();
  if($('.sidebar, .navbar-wrapper, .body-wrapper').hasClass('active')) {
    $('.sidebar, .navbar-wrapper, .body-wrapper').removeClass('active');
    $('.body-overlay').removeClass('active');
  }else {
    $('.sidebar, .navbar-wrapper, .body-wrapper').addClass('active');
    $('.body-overlay').addClass('active');
  }
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.sidebar, .navbar-wrapper, .body-wrapper').removeClass('active');
  $('.body-overlay').removeClass('active');
});

// dashboard-list
$('.dashboard-list-item').on('click', function (e) {
  if(e.target.classList.contains("select-btn")) {
    $(".dashboard-list-item-wrapper .select-btn").text("Select");
    $(e.target).text("Selected");
    return false;
  }
  var element = $(this).parent('.dashboard-list-item-wrapper');
  if (element.hasClass('show')) {
    element.removeClass('show');
    element.find('.preview-list-wrapper').removeClass('show');
    element.find('.preview-list-wrapper').slideUp(300, "swing");
  } else {
    element.addClass('show');
    element.children('.preview-list-wrapper').slideDown(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').children('.preview-list-wrapper').slideUp(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.dashboard-list-item').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.preview-list-wrapper').slideUp(300, "swing");
  }
});

$(".dashboard-list-item-wrapper .select-btn").click(function(){
  $(".dashboard-list-item-wrapper").removeClass("selected");
  $(this).parents(".dashboard-list-item-wrapper").toggleClass("selected");
});

//info-btn
$(document).on('click', '.info-btn', function () {
  $('.support-profile-wrapper').addClass('active');
});
$(document).on('click', '.chat-cross-btn', function () {
  $('.support-profile-wrapper').removeClass('active');
});

//sidebar Menu
$(document).on('click', '.notification-icon', function () {
  $('.notification-wrapper').toggleClass('active');
});

//banner form
$(document).on('click', '.continue', function () {
  $('.banner-widget-wrapper').addClass('active');
});
$(document).on('click', '.back', function () {
  $('.banner-widget-wrapper').removeClass('active');
});

//Profile Upload
function proPicURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
          $(preview).css('background-image', 'url(' + e.target.result + ')');
          $(preview).addClass('has-image');
          $(preview).hide();
          $(preview).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$(".profilePicUpload").on('change', function () {
  proPicURL(this);
});

$(".remove-image").on('click', function () {
  $(".profilePicPreview").css('background-image', 'none');
  $(".profilePicPreview").removeClass('has-image');
});

// password
$(document).ready(function() {
  $(".show_hide_password .show-pass").on('click', function(event) {
      event.preventDefault();
      if($(this).parent().find("input").attr("type") == "text"){
          $(this).parent().find("input").attr('type', 'password');
          $(this).find("i").addClass( "fa-eye-slash" );
          $(this).find("i").removeClass( "fa-eye" );
      }else if($(this).parent().find("input").attr("type") == "password"){
          $(this).parent().find("input").attr('type', 'text');
          $(this).find("i").removeClass( "fa-eye-slash" );
          $(this).find("i").addClass( "fa-eye" );
      }
  });
});

})(jQuery);

// OTP Input Navigation
$(document).ready(function() {
    // OTP Auto Focus
    $('.otp').on('input', function() {
        if (this.value.length === this.maxLength) {
            $(this).next('.otp').focus();
        }
    });
    
    // Password Strength Check
    $('input[name="new_password"]').on('input', function() {
        checkPasswordStrength($(this).val());
    });
});

function checkPasswordStrength(password) {
    let strength = 0;
    const strengthBar = $('#passwordStrength');
    const strengthText = $('#strengthText');
    
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]+/)) strength++;
    if (password.match(/[A-Z]+/)) strength++;
    if (password.match(/[0-9]+/)) strength++;
    if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;
    
    strengthBar.removeClass('weak medium strong');
    
    if (strength <= 2) {
        strengthBar.addClass('weak');
        strengthText.text('Weak password');
    } else if (strength <= 4) {
        strengthBar.addClass('medium');
        strengthText.text('Medium password');
    } else {
        strengthBar.addClass('strong');
        strengthText.text('Strong password');
    }
}

// Process Flow Animation START
let processFlowWrap = $(".process-flow-animation");
function processFlowAnimationRUN(processFlowWrap) {
  if(processFlowWrap.length == 0) return false;
  $.each(processFlowWrap,function(index,item) {
    if($(item).data("animation") == false) return;
    let processFlowChild = $(item).children();
    var childItemKey = 0;
    setInterval(() => {
      $(item).children().removeClass("active");
      $($(item).children()[childItemKey]).addClass("active");
      childItemKey++;
      if(processFlowChild.length == childItemKey) childItemKey = 0;
    }, 2000);

  });

}
processFlowAnimationRUN(processFlowWrap);

//___________________________________________
// how it works Process Navigation Functionality
//____________________________________________
document.addEventListener('DOMContentLoaded', function() {
    const processSteps = document.querySelectorAll('.process-step');
    const contentItems = document.querySelectorAll('.content-item');
    const visualImages = document.querySelectorAll('.visual-image');

    function activateStep(step) {
        // Remove active class from all steps
        processSteps.forEach(step => {
            step.classList.remove('active');
        });
        
        // Hide all content items
        contentItems.forEach(item => {
            item.classList.remove('active');
        });
        
        // Hide all images
        visualImages.forEach(img => {
            img.classList.remove('active');
        });
        
        // Add active class to target step
        const targetStep = document.querySelector(`.process-step[data-step="${step}"]`);
        if (targetStep) {
            targetStep.classList.add('active');
        }
        
        // Show corresponding content
        const targetContent = document.querySelector(`.content-item[data-step="${step}"]`);
        if (targetContent) {
            targetContent.classList.add('active');
        }
        
        // Show corresponding image
        const targetImage = document.querySelector(`.visual-image[data-step="${step}"]`);
        if (targetImage) {
            targetImage.classList.add('active');
        }
    }

    // Add click event to process steps
    processSteps.forEach(step => {
        step.addEventListener('click', function() {
            const stepNumber = this.getAttribute('data-step');
            activateStep(stepNumber);
        });
    });

    // Optional: Auto-rotate through steps
    let currentStep = 1;
    const totalSteps = 3;
    
    setInterval(() => {
        currentStep = currentStep % totalSteps + 1;
        activateStep(currentStep);
    }, 5000);
});

//______________________________
// js for scrolling sections 
//______________________________
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.main-menu a[href^="#"]');
    
    // Smooth scrolling function
    function smoothScroll(targetId) {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            const headerHeight = document.querySelector('.header-section').offsetHeight;
            const targetPosition = targetElement.offsetTop - headerHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    }
    
    // Update active link based on scroll position
    function updateActiveLink() {
        let current = '';
        const scrollPosition = window.scrollY + 100; // Offset for better detection
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }
    
    // Click event for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            
            // Remove active class from all links
            navLinks.forEach(item => item.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
            
            // Smooth scroll to target
            smoothScroll(targetId);
        });
    });
    
    // Update active link on scroll
    window.addEventListener('scroll', updateActiveLink);
    
    // Initial call to set active link on page load
    updateActiveLink();
});



// my qr
// Simple JavaScript for tab navigation only
document.addEventListener('DOMContentLoaded', function() {
  const navItems = document.querySelectorAll('.nav-item');
  const contentAreas = document.querySelectorAll('[data-content]');
  
  navItems.forEach(item => {
    item.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      // Update active nav item
      navItems.forEach(nav => nav.classList.remove('active'));
      this.classList.add('active');
      
      // Show/hide content areas
      contentAreas.forEach(content => {
        if (content.getAttribute('data-content') === targetTab) {
          content.classList.remove('hidden');
        } else {
          content.classList.add('hidden');
        }
      });
    });
  });
});


/**
 * Function For Get All Country list by AJAX Request
 * @param {HTML DOM} targetElement
 * @param {Error Place Element} errorElement
 * @returns
 */
var allCountries = "";
function getAllCountries(hitUrl,targetElement = $(".country-select"),errorElement = $(".country-select").siblings(".select2")) {
  if(targetElement.length == 0) {
    return false;
  }
  var CSRF = $("meta[name=csrf-token]").attr("content");
  var data = {
      _token      : CSRF,
  };
  $.post(hitUrl,data,function() {
      // success
      $(errorElement).removeClass("is-invalid");
      $(targetElement).siblings(".invalid-feedback").remove();
  }).done(function(response){
      // Place States to States Field
      var options = "<option selected disabled>Select Country</option>";
      var selected_old_data = "";
      if($(targetElement).attr("data-old") != null) {
          selected_old_data = $(targetElement).attr("data-old");
      }
      $.each(response,function(index,item) {
          options += `<option value="${item.name}" data-id="${item.id}" data-mobile-code="${item.mobile_code}" data-currency-name="${item.currency_name}" data-currency-code="${item.currency_code}" data-currency-symbol="${item.currency_symbol}" ${selected_old_data == item.name ? "selected" : ""}>${item.name}</option>`;
      });

      allCountries = response;

      $(targetElement).html(options);
  }).fail(function(response) {
      var faildMessage = "Something went worng! Please try again.";
      var faildElement = `<span class="invalid-feedback" role="alert">
                              <strong>${faildMessage}</strong>
                          </span>`;
      $(errorElement).addClass("is-invalid");
      if($(targetElement).siblings(".invalid-feedback").length != 0) {
          $(targetElement).siblings(".invalid-feedback").text(faildMessage);
      }else {
          errorElement.after(faildElement);
      }
  });
}
/**
 * Function for reload the all countries that already loaded by using getAllCountries() function.
 * @param {string} targetElement
 * @param {string} errorElement
 * @returns
 */
function reloadAllCountries(targetElement,errorElement = $(".country-select").siblings(".select2")) {
  if(allCountries == "" || allCountries == null) {
  // alert();
  return false;
  }
  var options = "<option selected disabled>Select Country</option>";
  var selected_old_data = "";
  if($(targetElement).attr("data-old") != null) {
    selected_old_data = $(targetElement).attr("data-old");
  }
  $.each(allCountries,function(index,item) {
    options += `<option value="${item.name}" data-id="${item.id}" data-currency-name="${item.currency_name}" data-currency-code="${item.currency_code}" data-currency-symbol="${item.currency_symbol}" ${selected_old_data == item.name ? "selected" : ""}>${item.name}</option>`;
  });
  $(targetElement).html(options);
}
//logout modal 
function openAlertModal(URL,target,message,actionBtnText = "Remove",method = "DELETE"){
  if(URL == "" || target == "") {
      return false;
  }

  if(message == "") {
    message = "Are you sure to delete ?";
  }
  var method = `<input type="hidden" name="_method" value="${method}">`;
  openModalByContent(
      {
          content: `<div class="card modal-alert border-0">
                      <div class="card-body">
                          <form method="POST" action="${URL}">
                              <input type="hidden" name="_token" value="${laravelCsrf()}">
                              ${method}
                              <div class="head mb-3">
                                  ${message}
                                  <input type="hidden" name="target" value="${target}">
                              </div>
                              <div class="foot d-flex align-items-center justify-content-between">
                                  <button type="button" class="modal-close btn btn--info btn--base">Close</button>
                                  <button type="submit" class="alert-submit-btn btn btn--base bg--danger btn-loading">${actionBtnText}</button>
                              </div>    
                          </form>
                      </div>
                  </div>`,
      },

  );
}

/**
 * Function for getting CSRF token for form submit in laravel
 * @returns string
 */
function laravelCsrf() {
  return $("head meta[name=csrf-token]").attr("content");
}


/**
 * Function For Open Modal Instant by pushing HTML Element
 * @param {Object} data
 */
function openModalByContent(data = {
  content:"",
  animation: "mfp-zoom-in",
  size: "medium",
}) {
  $.magnificPopup.open({
    removalDelay: 500,
    items: {
      src: `<div class="white-popup mfp-with-anim ${data.size ?? "medium"}">${data.content}</div>`, // can be a HTML string, jQuery object, or CSS selector
    },
    callbacks: {
      beforeOpen: function() {
        this.st.mainClass = "mfp-zoom-in";
      },
      open: function() {
        var modalCloseBtn = this.contentContainer.find(".modal-close");
        $(modalCloseBtn).click(function() {
          $.magnificPopup.close();
        });
      },
    },
    midClick: true,
  });
}
function placePhoneCode(code) {
  if(code != undefined) {
      code = code.replace("+","");
      code = "+" + code;
      $("input.phone-code").val(code);
      $("div.phone-code").html(code);
  }
}
$(".copy-button").click(function(){
  var value = $(this).siblings(".copiable").val();
  navigator.clipboard.writeText(value);
  throwMessage('success',['Text successfully copied.']);
});
// Internal Search Section
var timeOut;
function itemSearch(inputElement,tableElement,URL,minTextLength = 3) {
  $(inputElement).bind("keyup",function(){
    clearTimeout(timeOut);
    timeOut = setTimeout(executeItemSearch, 500,$(this),tableElement,URL,minTextLength);
  });
}

function executeItemSearch(inputElement,tableElement,URL,minTextLength) {
  $(tableElement).parent().find(".search-result-table").remove();
  var searchText = inputElement.val();
  if(searchText.length > minTextLength) {
    // console.log(searchText);
    $(tableElement).addClass("d-none");
    makeSearchItemXmlRequest(searchText,tableElement,URL);
  }else {
    $(tableElement).removeClass("d-none");
  }
}

function makeSearchItemXmlRequest(searchText,tableElement,URL) {
  var data = {
    _token      : laravelCsrf(),
    text        : searchText,
  };
  $.post(URL,data,function(response) {
    //response
  }).done(function(response){
    itemSearchResult(response,tableElement);
    // if($(tableElement).siblings(".search-result-table").length > 0) {
    //     $(tableElement).parent().find(".search-result-table").html(response);
    // }else{
    //     $(tableElement).after(`<div class="search-result-table"></div>`);
    //     $(tableElement).parent().find(".search-result-table").html(response);
    // }
  }).fail(function(response) {
    throwMessage('error',["Something went worng! Please try again."]);
  });
}

function itemSearchResult(response,tableElement) {
  if(response == "") {
    throwMessage('error',["No data found!"]);
  }
  if($(tableElement).siblings(".search-result-table").length > 0) {
    $(tableElement).parent().find(".search-result-table").html(response);
  }else{
    $(tableElement).after(`<div class="search-result-table"></div>`);
    $(tableElement).parent().find(".search-result-table").html(response);
  }
}
