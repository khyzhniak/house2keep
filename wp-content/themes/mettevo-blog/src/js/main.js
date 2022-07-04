window.addEventListener('DOMContentLoaded', function() {
  
  let currentHeaderMenuItem = document.querySelector('.header .current-menu-item');
  let mainMenu = document.querySelector('.header .main-menu ul');
  let menuWidth = mainMenu.parentNode.getBoundingClientRect().width;

  if(currentHeaderMenuItem){
    let currentMenuRect = currentHeaderMenuItem.getBoundingClientRect();
    mainMenu.scrollLeft += currentMenuRect.x - menuWidth / 2 + currentMenuRect.width / 2;
  }

  $('.related-posts__slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 2,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.slide__next').click(function(){
    $('.related-posts__slider').slick('slickNext');
  });

  $('.slide__prev').click(function(){
    $('.related-posts__slider').slick('slickPrev');
  });



  const buttonLoadMore = document.querySelector('.btn-load-more');
  
  if (typeof (buttonLoadMore) != 'undefined' && buttonLoadMore != null) {
    buttonLoadMore.addEventListener('click', (e) => {

      let cardsContainer = document.querySelector('.cards');
      let currentPage = cardsContainer.dataset.page;
      let paramName = cardsContainer.dataset.paramName;
      let paramValue = cardsContainer.dataset.paramValue;

      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'mttv_load_more_posts',
          current_page: currentPage,
          param_name: paramName,
          param_value: paramValue
        },
        success: function(res) {
          cardsContainer.innerHTML += JSON.parse(res).data;

/*        let getUrl = window.location;
          let baseUrl = getUrl.protocol + '//' + getUrl.host + '/';
          window.history.pushState('', '', baseUrl + 'page/' + (parseInt(currentPage) + 1));*/

          if (cardsContainer.dataset.page == cardsContainer.dataset.max){
            buttonLoadMore.parentNode.removeChild(buttonLoadMore);
          }
          
          let cards = cardsContainer.querySelectorAll('.article-card');
          if (cards.length !== 0){
            cards.forEach( card => {
              if (!card.classList.contains('io-fadein')){
                card.classList.add('io-fadein');
              }
            });
          }

          cardsContainer.dataset.page++;
  
        }
      });
    });
  }


  // -----------  BTN TO TOP --------------------

	$(".totop").click(function () {
		$("html, body").animate({ scrollTop: 0 }, 800);
		return false;
	});

	const btnToTop = document.querySelector(".totop");

	if (btnToTop) {
		window.addEventListener("scroll", toggleBtnToTop);
	}

	function toggleBtnToTop() {
		if (window.pageYOffset > 900) {
			btnToTop.classList.add("visible");
		} else {
			btnToTop.classList.remove("visible");
		}
	}

   // ---- intersection observer for smooth scroll animation

  



});

