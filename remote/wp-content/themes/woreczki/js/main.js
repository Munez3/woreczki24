;(function(window, document, $){

   window.universal = {};

   universal.init = function(){
      universal.cacheSelector();
      universal.bindEvents();
      universal.gridListSwitch();
      universal.toggleSubCategories();

      if(universal.$slider.length > 0){

         var sliderOptions = {
            arrows: false,
            autoplay: true,
            fade: true,
            infinite: true,
            dots: true,
            focusOnSelect: false,
            appendDots: "#slider-pager",
            dotsClass: "slider__pagination flexbox flexbox--col ul-no-style",
            customPaging: function(slider, pageIndex){
               return '<div class="slider__pagination-item pointer"></div>';
            }
         }
      }
      universal.$slider.slick(sliderOptions);
   };

   universal.cacheSelector = function(){
      universal.$burger = $('.burger');
      universal.$navbar = $('.navbar');

      // universal.$down = $('.slider__down');
      universal.$slider = $('.slick-slider');

      // universal.$faqItem = $('.faq__header');

      universal.$searchBtn = $("#search-btn");
      universal.$searchForm = $("#search");
   };

   universal.bindEvents = function(){
      universal.$burger.on('click', universal.toggleActiveNav);

      universal.$searchBtn.on('click', universal.toggleSearch);


      // universal.$down.on('click', universal.slideDown);
      // universal.$faqItem.on('click', universal.toggleFaq);
   };

   universal.toggleActiveNav = function(){
      universal.$burger.toggleClass('burger--active');
      universal.$navbar.toggleClass('navbar--active');
   }

   // universal.slideDown = function(){
   //    $('html, body').animate({
   //       scrollTop: $('#main').offset().top
   //    }, 500, "swing");
   // }

   // universal.toggleFaq = function(){
   //    $(this).next().slideToggle();
   // }

   universal.toggleSearch = function(){
      universal.$searchForm.toggleClass('search--active')
   }

   universal.gridListSwitch = function() {
      console.log(localStorage.getItem('shopView'))
      const isListLS = localStorage.getItem('shopView') === "list";

      const gridSwitcher = document.querySelector('#gridSwitcher').children;
      const shopItemsContainer = document.querySelector('.shop > ul');

      changeView(isListLS);

      for (let i = 0; i < gridSwitcher.length; i++) {
         const child = gridSwitcher[i];
         child.addEventListener('click', (e)=> {

            e.target.classList.add('gridSwitcher__item--active');

            const isList = e.target.id ==="switchList";

            changeView(isList);

         })
      }

      function changeView(isList) {
         gridSwitcher[0].classList.remove('gridSwitcher__item--active');
         gridSwitcher[1].classList.remove('gridSwitcher__item--active');

         if(isList) {
            shopItemsContainer.classList.remove('grid');
            gridSwitcher[1].classList.add('gridSwitcher__item--active');
            localStorage.setItem('shopView', 'list');
         } else {
            shopItemsContainer.classList.add('grid');
            gridSwitcher[0].classList.add('gridSwitcher__item--active');
            localStorage.setItem('shopView', 'grid');
         }
      }


   };


   universal.toggleSubCategories = function() {
      $('.shop-sidebar-category__item').on('click', function () {
         const sub = $(this).children()[1];
         if(sub) {
            $(this).toggleClass('sub-show');
            $(this).find(".shop-sidebar-category-sub").toggleClass('shop-sidebar-category-sub--show')
         }
      })
   };


   window.shop = {};

   // shop.init = function(){
   //    shop.cacheSelector();
   //    var price = 0;
   //
   //    var self = this;
   //    $.get("https://api.fixer.io/latest?base=PLN&symbols=GBP,EUR", function(response){
   //       self.rates = response.rates;
   //       var $price = $('.woocommerce-Price-amount').html();
   //       var index = $price.indexOf('<');
   //       price = parseFloat($price.slice(0, index));
   //       if(self.rates){
   //          $('#approximate-price-GBP').html((price * shop.rates['GBP']).toFixed(2) + "<sup>GBP</sup>");
   //          $('#approximate-price-EUR').html((price * shop.rates['EUR']).toFixed(2) + "<sup>EUR</sup>");
   //       }
   //    });
   //
   //    $('#pa_quantity').children().eq(0).remove();
   //
   //    shop.$variation.on( "show_variation", function(){
   //       var $price = $('.woocommerce-Price-amount').html();
   //       var index = $price.indexOf('<');
   //       price = parseFloat($price.slice(0, index));
   //       if(shop.rates){
   //          $('#approximate-price-GBP').html((price * shop.rates['GBP']).toFixed(2) + "<sup>GBP</sup>");
   //          $('#approximate-price-EUR').html((price * shop.rates['EUR']).toFixed(2) + "<sup>EUR</sup>");
   //       }
   //    });
   // }
   //
   // shop.cacheSelector = function(){
   //    shop.$variation = $( ".variations_form.cart" );
   // };

   $(document).ready(universal.init);
})(window, document, jQuery);
