// Global namespace
var app = app || {};
var nav = nav || {};
var home = home || {};
var projets = projets || {};
var ouverture = ouverture || {};
var courrier = courrier || {};
var aPropos = aPropos || {};
var details = details || {};

// Global variables
var $document = $(document),
		$window = $(window),
		$htmlBody = $('html, body'),
		$html = $('html'),
		$body = $('body'),
		windowWidth = window.innerWidth,
		windowHeight = window.innerHeight,
		$page = $('#page'),
		$detailsLeftArrow = $('.projets-arrows .left-arrow'),
		$detailsRightArrow = $('.projets-arrows .right-arrow'),
		$container = $('.container'),
		$pageName = $('.page-name'),
		pageTitle,
		$projetFiltres = $('.projets-filter'),
		$closeBtnText = $('#close-text'),
		$menuLabel = $('#menu-label'),
		$menuArrow = $('.arrow-icon'),
		$menuArrowLine = $('.arrow-line-icon'),
		$squareLoad = $('.square-loading'),
		$squareSVG = $('.svg-square'),
		$squareRect = $('.svg-square rect'),
		isIE = Detectizr.browser.name === 'ie',
		isIE9 = isIE && Detectizr.browser.major === '9',
		resizeTimer;

// Navigation variables
var $menu = $('#menu'),
		$navItemTarget = $('#menu-btn'),
  	$navItems = $('.menu-option'),
  	$navTrigger = $('#menu-btn, .menu-small'),
  	$closeBtn = $('#close-btn');


/**
 * Variables
 */

app.vars = {
	url: 		'', 			// URL de la page courante
	parent: '', 			// Identifiant du parent (segment_1)
	child: 	'',				// Identifiant de l'enfant (segment_2)
	oldParent: '', 		// Identifiant du parent (segment_1)
	oldChild: 	'',		// Identifiant de l'enfant (segment_2)
	loadComplete: false,
	firstLoad: true,
	checkPosition: true
}

// Cursor
const cursor = document.querySelector('.cursor');

document.addEventListener('mousemove', e => { cursor.setAttribute("style", "top: "+(e.pageY - 5)+"px; left: "+(e.pageX - 5)+"px;")})

document.addEventListener('pointermove', e => { cursor.setAttribute("style", "top: "+(e.pageY - 5)+"px; left: "+(e.pageX - 5)+"px;")})

document.addEventListener('click', () => {
  cursor.classList.add("expand");
  setTimeout(() => {
    cursor.classList.remove("expand");
  }, 500)
})

/**
 * Animation lancée a la fin du chargement de la page dans la fct app.onCompleteAnimation
 */

app.frameAnimation = function(direction) {

  var 	$frame = $('.frame'),
  			$frameBorder = $('.frame-border'),
  			timeLineFrame = new TimelineLite({onReverseComplete:app.rewindFrame});

  if (direction == 'play') {
  	timeLineFrame.to( $frame, 1, {css:{className:"+=is-shown"}, ease: Back.easeOut} )
								 .to( $frameBorder, .35, {opacity: .8});
  }

  if (direction == 'reverse') {
  	timeLineFrame.set( $frameBorder, {opacity: 0})
  							 .to( $frame, 1, {css:{className:"-=is-shown"}, ease: Back.easeOut} );
  }

	//Rewind frame
	app.rewindFrame = function(){
		$window.trigger('frameIsClosed');
	}

	if (navigator.userAgent.match(/iPad/i)) {
		 $frameBorder.hide();
	}
}



/**
 * Global init function
 * @param  {string} parent 		segment_1 of the URL
 * @param  {string} child 		segment_2 of the URL
 */
app.init = function(parent, child) {


	// Définition des variables
	app.vars.parent = parent;
	app.vars.oldParent = parent;
	app.vars.child = child;
	app.vars.oldChild = child;


	// Prevent scrollTop on click on a[href="#"] links
	$('a[href="#"]').on('click', function(e) {
  	if 	(!isIE9) {
  		e.preventDefault();
  	}
	});

	// Initialize navigation
	nav.init();

	// Ecoute si il y a un changement dans l'url pour loader la page
	if 	(!isIE9) {
		History.Adapter.bind($window, 'statechange',
		function(event){
		  var currentHash = History.getState().url; // current url
			var condition = app.vars.url.replace(window.location.origin, '') != currentHash.replace(window.location.origin, '');
			if (condition)
		    app.loadPage(currentHash);
		});
	}

 	// Animation du loader
	app.initLoader();

	// On vérifie la taille de l'écran
	app.responsive();

	// Marker
	app.vars.firstLoad = false;

	// On bind le bouton close
	$closeBtn.bind('click', app.closeBtnState );
	$closeBtn.unbind('click', nav.animate );

	// Animation de la home au premier chargement
	if ($body.hasClass('first-load')) {

		app.initLoader();

		TweenLite.set( $body, {css:{className:"-=first-load"}, delay: 1});

		// On masque le label de menu et les flèches
		TweenLite.set( $menuLabel, {opacity: 0, y:'300%'});
		TweenLite.set( $menuArrowLine, {opacity: 0, y:'300%'});
		TweenLite.set( $menuArrow, {opacity: 0, y:'50%'});


		// On masque le rond
		TweenLite.set( $('#option1 .svg-circle'), {scale:'0'});


		// On affiche le label de menu et les flèches
		TweenLite.to( $menuLabel, .6, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.02});
		TweenLite.to( $menuArrow, .4, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.02});
		TweenLite.to( $menuArrowLine, .4, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.02});


		// On affiche le rond
		TweenLite.to( $('#option1 .svg-circle'), .4, {scale:'1', ease: Back.easeOut, delay: .96});
	}

};


/**
 * Récupère toutes les URLs d'images et backgrounds et les stock dans un tableau imgArray
 */
app.getImagesToLoad = function(container) {

	var images = [];

  container.find('img[data-src]').filter(function() {

      var img = this;

      if(img !== undefined && $.inArray(img, images) === -1)
      	images.push(img);
  });

  // On retourne les deux tableaux
  return images;

}


/**
 * Initialisation du loader
 */
app.initLoader = function() {


	// Nul besoin pour la HP
	if(app.vars.parent == '' && !$body.hasClass('first-load'))
		return false;

	app.onLoadStart();


	// On récupère les éléments à charger
	var toLoad = app.getImagesToLoad($('.new')),
			innerDraw = 0,
			condition = $html.hasClass('safari') || $html.hasClass('ios') && window.devicePixelRatio >= 2;

	if (condition && windowWidth > 480){
			innerDraw = 200.15;
	}

	if (condition && windowWidth < 481){
			innerDraw = 200.6;
	}

	TweenLite.set( $squareLoad, {opacity: 1});
	TweenLite.set( $squareSVG, {display: 'block'});
	TweenLite.set( $squareRect, { drawSVG: innerDraw + '% ' + innerDraw + '%' });

	// Si il n'y a rien à charger on passe direct à l'animation
  if (toLoad.length == 0)
  {

  	// On défini l'animation de base du loader
		TweenLite.to(
      $squareRect, 1, { drawSVG: innerDraw + '% ' + (100 + innerDraw) + '%', ease:Circ.easeInOut,
      	onComplete: function() {

					TweenLite.to( $squareLoad, .4, {opacity: 0});
  				app.vars.loadComplete = true;
					app.onLoadComplete();
      	}
    	}
    );

  } else {

  	var loader = new app.imagesLoader({
				data: toLoad,
				attr: 'data-src',
				onImageLoad: function(image, percentage) {
					var src = toLoad[image.__index].getAttribute('data-src');
					toLoad[image.__index].setAttribute('src', src);
					TweenLite.to(
           	$squareRect,
          	1,
          	{ drawSVG: innerDraw + '% ' + (percentage + innerDraw) + '%', ease: Circ.easeInOut,
           		onComplete: function() {
								if (percentage === 100) {
									loader.onComplete();
								}
							}
						}
			    );
				},
				onComplete: function() {
					// On charge les images qui étaient en no-load
					$('.no-load').each(function(index, el) {
						var source = $(this).data('original');
						$(this).attr('src', source).removeAttr('data-original').removeClass('no-load');
					});

				}
		});
  }
}

/**
 * Calcul du pourcentage par rapport au nb d'images chargées
 * @param  {[objet]} options [calcul le pourcentage de l'état de téléchargement des images]
 */
app.imagesLoader = function(options) {
	'use strict';

	var o = options;
	// Set all the options
	o.data        = o.data || [];
	o.attr        = o.attr || 'src';
	o.onImageLoad = o.onImageLoad || function() {};
	o.onComplete  = o.onComplete || function() {};

	// Create empty array for the new images
	var images = [];
	// None is yet loaded
	var imagesLoaded = 0;
	var totalImages = o.data.length;

	for (var i = 0; i < totalImages; i++) {
		// Get the image source
		var src = o.data[i] ? o.data[i].getAttribute(o.attr) : '';

		// Create a new image
		images[i] = new Image();
		images[i].__index = i;
		// Add an `onload` event on this image
		images[i].onload = function() {
			// Increment the number of loaded images
			imagesLoaded++;
			// Calculate the new percentage
			var percentage = Math.round(100 / totalImages * imagesLoaded);
			// Launch callback when this image is loaded
			o.onImageLoad(this, percentage);
			if ( this.__index+1 < totalImages) {
				var nextImage = this.__index+1;
				images[nextImage].src = o.data[nextImage] ? o.data[nextImage].getAttribute(o.attr) : '';
			}
			// Launch callback when all images are loaded
			if (imagesLoaded === totalImages) {
				o.onComplete();
			}
		}
	}
	images[0].src = src;

	return this;
};

/**
 * Fade out du Loader et lancement de l'animation d'ouverture
 */
app.imagesLoader.prototype.onComplete = function() {

	TweenLite.to( $squareLoad, .6, {opacity: 0, ease: Expo.easeOut});
	app.vars.loadComplete = true;
	app.onLoadComplete();
}

/**
 * Animation pour la fermeture
 */
app.onBeforeLoad = function() {

	var $leftCol = $('.old').find('.leftCol'),
			$rightCol = $('.old').find('.rightCol');

	TweenLite.to( $('.h-line'), .4, {scaleY: '0'});
	TweenLite.to( $('.svg-scroll-text'), .4, {y: '-100%'});

	// On masque le bouton fermer
	TweenLite.to( $closeBtn, .4, {opacity: 0, y:'100%', pointerEvents:'none'});
	TweenLite.to( $('.arrow-down'), .4, {opacity: 0, y:'-100%'});

	// On masque le label de menu et les flèches
	TweenLite.to( $menuLabel, .4, {opacity: 0, y:'300%'});
	TweenLite.to( $menuArrowLine, .4, {opacity: 0, y:'300%'});
	TweenLite.to( $menuArrow, .4, {opacity: 0, y:'50%'});

	// On masque les filtres sur la page projets
	if (app.vars.parent != 'projets'
	    || app.vars.parent == 'projets'
	    && app.vars.child != 'in-situe'
	    && app.vars.child != 'imprime'
	    && app.vars.child != 'ecran'
	    && app.vars.child != '') {
				TweenLite.to( $projetFiltres, .4, {opacity: 0, pointerEvents: 'none'})
	}


	// On masque les flèches pour naviguer entre les projets
	if (!app.vars.child || app.vars.child && app.vars.oldChild) {
  	TweenLite.to( $detailsLeftArrow, .4, {opacity: 0, x: '200%', ease: Expo.easeOut});
  	TweenLite.to( $detailsRightArrow, .4, {opacity: 0, x: '-200%', ease: Expo.easeOut});
	}

	// On masque le titre de l'ancienne page
	TweenLite.to( $pageName, .4, {opacity: 0, y:  windowWidth < 981 ? '0%' : '100%'});

	// On masque le burger menu en mobile
	if (windowWidth < 981 ) {
		TweenLite.to( $('.menu-small'), .4, {opacity: 0});
	}

	// On force l'opacité des border frame à 0
	TweenLite.set( $('.frame-border'), {opacity: 0});

	TweenLite.to($leftCol, .7, {y: windowWidth < 981 ? windowHeight : -2*windowHeight, opacity: 0, ease: Power2.easeIn});
	TweenLite.to($rightCol, .7, {y: 2*windowHeight, opacity: 0, ease: Power2.easeIn, onComplete: function() {
		$('.container').not('.new').remove();;
		$window.trigger('onBeforeLoadComplete');
	}});


	if (app.vars.oldChild && app.vars.oldChild != 'in-situ' && app.vars.oldChild != 'imprime' && app.vars.oldChild != 'ecran') {
		TweenLite.to( $('.details-leftcol'), .3, {opacity: 0});
	}

	// Disable menu events on load page
	TweenLite.set( $('#menu-btn'), {pointerEvents: 'none'});
}




/**
 * Animation avant le chargement d'une page
 */
app.onLoadStart = function() {

	/**
	 * Animation pour l'ouverture
	 */

	$container.addClass('new');
	var $leftCol = $('.container').find('.leftCol'),
			$rightCol = $('.container').find('.rightCol');

	// On décale les éléments pour slider les colonnes
	TweenLite.set($leftCol, {y: 2*windowHeight, opacity: 0});
	TweenLite.set($rightCol, {y: windowWidth < 981 ? windowHeight : -2*windowHeight, opacity: 0});

	if(app.vars.child)
	{
		$leftCol.css('display', 'table');
		$rightCol.css('display', 'table');

	} else {
		$leftCol.show();
		$rightCol.show();
	}


	// Insertion du nom de la page
	if (!isIE9 && pageTitle) {
		$('.text-input').html(pageTitle);
	}

	// On change le texte du bouton fermer suivant la page
	if (app.vars.child) {
		$closeBtnText.html('Retour');
	} else {
		$closeBtnText.html('Fermer');
	}
}


/**
 * Animation après le chargement des pages
 */
app.onLoadComplete = function() {

	$htmlBody.scrollTop(0);

	/**
	 * Placement des éléments pour l'animation d'ouverture
	 */

	var $leftCol = $('.container').find('.leftCol'),
			$rightCol = $('.container').find('.rightCol');

	// On anime les colonnes pour les afficher
	TweenLite.to($leftCol, .8, {y: '0%', delay: .8, opacity: 1, ease: Expo.easeOut});
	TweenLite.to($rightCol, .8, {y: '0%', delay: .8, opacity: 1, ease: Expo.easeOut});

	// On affiche la barresverticale du haut si autre page que projets/filtres
	if (app.vars.parent != 'projets' || app.vars.parent == 'projets' && app.vars.child != '') {
		if (app.vars.child != 'in-situ' && app.vars.child != 'imprime' && app.vars.child != 'ecran') {
				TweenLite.to( $('.h-line-top'), .6, {scaleY: '1', ease: Back.easeOut, delay: 1});
		}
	}

	// On affiche le& barre verticale du bas et le texte de scroll
	TweenLite.to( $('.h-line-bottom'), .6, {scaleY: '1', ease: Back.easeOut, delay: 1});
	TweenLite.to( $('.svg-scroll-text'), .6, {y: '0%', ease: Expo.easeOut, delay: 1});

	// On affiche le label de menu et les flèches
	TweenLite.to( $menuLabel, .6, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.2});
	TweenLite.to( $menuArrow, .4, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.2});
	TweenLite.to( $menuArrowLine, .4, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.2});

	// On affiche le bouton fermer et la fleche de scroll
	if (app.vars.parent) {
		TweenLite.to( $closeBtn, .4, {opacity: 1, y:'0%', pointerEvents:'auto', ease: Back.easeOut, delay: 1.3});
	}
	TweenLite.to( $('.arrow-down'), .4, {opacity: 1, y:'0%', ease: Back.easeOut, delay: 1.3});

	// On affiche le nom de la page
	TweenLite.to( $pageName, .6, {opacity: 1, y: '0%', ease: Back.easeOut, delay: 1.3});

	// On masque le burger menu en mobile
	if (windowWidth < 981 ) {
		TweenLite.to( $('.menu-small'), .6, {opacity: 1, ease: Back.easeOut, delay: 1.3});
	}

	// Affichage des filtres sur la page projets et filtre
	if ( app.vars.parent == 'projets' && app.vars.child == ''
	    || app.vars.parent == 'projets' && app.vars.child == 'in-situ'
	    || app.vars.parent == 'projets' && app.vars.child == 'imprime'
	    || app.vars.parent == 'projets' && app.vars.child == 'ecran' ) {
  			TweenLite.to( $projetFiltres, .4, {opacity: 1, pointerEvents: 'auto', ease: Expo.easeOut, delay: 1.5})
  }


	// Affichage des flèches pour naviguer entre les projets
	if (app.vars.child && app.vars.child != 'in-situ' && app.vars.child != 'imprime' && app.vars.child != 'ecran' ) {
  	TweenLite.to( $detailsLeftArrow, .4, {opacity: 1, x: '0%', ease: Expo.easeOut, delay: 1.7});
  	TweenLite.to( $detailsRightArrow, .4, {opacity: 1, x: '0%', ease: Expo.easeOut, delay: 1.7});
		TweenLite.to( $('.details-leftcol'), .8, {opacity: 1, delay: 1.2});
	}

	// Enable menu events on load page
	TweenLite.set( $('#menu-btn'), {pointerEvents: 'auto'});

	// Une fois qu'on a tout animé on initialise les pages
	app.hasMethod('kill', app.vars.oldParent);
	app.hasMethod('init', app.vars.parent);

	// Animation du cadre uniquement si non homepage
	if(app.vars.parent)
		app.frameAnimation('play');
}

/**
 * Chargement AJAX de la page
 * @param $url (string)  – URL de la page à charger
 */
app.loadPage = function(url)
{
	// Reset variable chargement
	app.vars.loadComplete = false;


	if 	(!isIE9) {
		// Chargement de la page
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'HTML',
			success: function(data, textStatus, jqXHR){

				// Mise à jour des varaiables
				app.vars.url = url;
				History.pushState({}, '', url);


				// Ajoute le contenu dans le DOM
				app.parseDom(data);


				// On supprime les anciens contenus
				app.onBeforeLoad();


				// Une fois que le contenu est ajouté on le load
				$window.unbind('onBeforeLoadComplete');
				$window.bind('onBeforeLoadComplete', function() {
					app.initLoader();
				})

			}
		});
	}
};



/**
 * Interprète le DOM renvoyé par le chargement AJAX des pages
 * @param $data (string) – HTML renvoyé par l'appel ajax
 */
app.parseDom = function(data) {


		var html = $.trim(
				String(data)
				.replace(/<\!DOCTYPE[^>]*>/i, '')
				.replace(/<(html|head|body|title|meta)([\s\>])/gi,'<div class="document-$1"$2')
				.replace(/<\/(html|head|body|title|meta)\>/gi,'</div>')
				.replace('container', 'container new') // add new class to the new content
		);


	// On récupère le contenu .container
	var content = $(html).find( '.container' ).wrap('<div/>').parent().html(); // get div content to load


	// On redéfini les variables
	app.vars.oldParent = app.vars.parent;
	app.vars.oldChild = app.vars.child;

	app.vars.parent = $(content).data('parent');
	app.vars.child = $(content).data('child');

	setTimeout(function(){

		if(app.vars.parent == '') {
			$body.addClass('home');
		} else {
			$body.removeClass('home');
		}

		// $body.removeClass(app.vars.oldParent).addClass(app.vars.parent);
		$body.removeClass('projets courrier a-propos ouverture').addClass(app.vars.parent);

	}, windowWidth < 981 ? 800 : 0);

	// Update Google Analytics
	if ( typeof $window._gaq !== 'undefined' ) {
		$window._gaq.push(['_trackPageview', app.vars.url]);
	}

	// Update meta title
	document.title = $(html).find('.document-title:first').text();

	if (app.vars.parent) {
		$body.addClass('is-closed');
	}

  $(content).appendTo($page)

	$('.container').eq(0).addClass('old').removeClass('new');
	$('.container').eq(1).addClass('new');
	//

};




/**
 * Vérifie si une methode existe et l'exectue
 */
app.hasMethod = function(method, page) {

	if(page == '')
		page = 'home';


	// TODO Vérification de l'objet container

	var functionName = eval( app.camelCase(page) + '.' + method );

	if (typeof functionName != 'undefined' && $.isFunction(functionName))
		return functionName();
}


/**
 * Camelcase une string
 */
app.camelCase = function(string) {
	return string.toLowerCase().replace(/-(.)/g, function(match, group1) {
		return group1.toUpperCase();
	});
};



nav.itemTarget = {
	top: $navItemTarget.offset().top,
	left: $navItemTarget.offset().left,
	width: $navItemTarget.outerWidth(),
	height: $navItemTarget.outerHeight()
};




/**
 *  Menu
 */
nav.init = function() {

	/**
	 * Navigation opening
	 */
	rotatingColors.start($navTrigger[0]);
	$navTrigger.on('click', function(event) {
		nav.animate();
	});


  // Drag and drop
  var drag = Draggable.create($navItems, {
    bounds: $menu,
		throwProps:true,
		edgeResistance: 0,
		throwResistance: 1200,
		zIndexBoost: false,
    cursor: 'grabbing',

		// On arrondit les valeurs des translations des boules
		snap: function(endValue) {
			return Math.round(endValue);
		},

		onDragStart: dragStart,
		onPress: dragStart,

		onRelease: dragEnd,
		onDragEnd: dragEnd,

		// Animation lors du drag dans la cible
		onDrag: function() {

			var position = this.target.getBoundingClientRect(),
					$target = this.target;

			$target = $($target);

			// Si l'élement est dans le conteneur cible
			if (position.top + position.height > nav.itemTarget.top
				&& position.top < nav.itemTarget.height + nav.itemTarget.top
				&& position.left + position.width > nav.itemTarget.left
				&& position.left < nav.itemTarget.width + nav.itemTarget.left
				&& app.vars.checkPosition) {

				$navItemTarget.addClass('on-target');
				$target.addClass('on-target');

			} else {
				$navItemTarget.removeClass('on-target');
				$target.removeClass('on-target');
			}
		},

		// Vérification de la position par rapport à la cible
		onThrowUpdate:function() {
			nav.checkPos(this);
		}

  });

	// Animation lors du drag ou du click sur une boule
	function dragStart() {

		var target = this.target;
		target = $(target).data('url').slice('1','-1');

		$navItemTarget.addClass(target);

		$menuLabel.addClass('drop');
		// On set la variable checkPosition à true
		app.vars.checkPosition = true;
		$menuArrow.addClass('is-dragged');
	}

	// Animation lors du de la fin du drag ou du click sur une boule
	function dragEnd() {
    
    setTimeout(function() {
      $menuLabel.removeClass('drop');
      $menuArrow.removeClass('is-dragged');
      $navItemTarget.attr('class', 'menu-btn');
    }, 700);


	}

}





/**
 * Ouverture du menu
 * @param $direction (string) – Sens de l'animation
 */
nav.animate = function(direction) {
	var direction =  $body.hasClass('is-active') ? 'close' : 'open';

	if (direction == 'open') {


		$closeBtn.bind('click', nav.animate );
		$closeBtn.unbind('click', app.closeBtnState );

		$body.addClass('is-active');

		if(app.vars.parent) {
			app.frameAnimation('reverse');
			$body.removeClass('is-closed');

			// On réaffiche le bouton fermer
			TweenLite.to( $closeBtn, .4, {opacity: 1, pointerEvents:'auto'});
		}

		// On change le texte du bouton fermer
		$closeBtnText.html('Fermer');


		// On affiche les filtres de la page projets
		if ( app.vars.parent == 'projets' && app.vars.child == ''
	    || app.vars.parent == 'projets' && app.vars.child == 'in-situ'
	    || app.vars.parent == 'projets' && app.vars.child == 'imprime'
	    || app.vars.parent == 'projets' && app.vars.child == 'ecran' ) {
				TweenLite.to( $projetFiltres, .4, {opacity: 1, pointerEvents: 'auto'})
	}



	} else {

		rotatingColors.hide();
		$closeBtn.bind('click', app.closeBtnState );
		$closeBtn.unbind('click', nav.animate );

		$body.removeClass('is-active');

		if(app.vars.parent) {
			app.frameAnimation('play');
			$body.addClass('is-closed');
		}

		// On change le texte du bouton fermer suivant la page
		if (app.vars.child) {
			$closeBtnText.html('Retour');
		} else {
			$closeBtnText.html('Fermer');
		}

		// On affiche les filtres de la page projets
		if ( app.vars.parent == 'projets' && app.vars.child == ''
	    || app.vars.parent == 'projets' && app.vars.child == 'in-situ'
	    || app.vars.parent == 'projets' && app.vars.child == 'imprime'
	    || app.vars.parent == 'projets' && app.vars.child == 'ecran' ) {
				TweenLite.to( $projetFiltres, 1, {opacity: 1, pointerEvents: 'auto', delay: 1})
		}


	}


	$('.menu-option').each(function(i,e) {

		var $this = $(this),
				width = $menu.width(),
				height = $menu.height();

		if (direction == 'open') {

			//var x = -Math.pow(-1,i)*width/(Math.floor(Math.random()*(8-5))+5),
			//		y = i === 1 || i === 2 ? Math.pow(-1,i)*height/(Math.floor(Math.random()*(10-3))+3) : Math.pow(-1,(i+1))*height/(Math.floor(Math.random()*(5-3))+3);
      if (i == 0) {
        var x = -Math.pow(-1,i)*width/(Math.floor(Math.random()*(8-5))+5),
            y = Math.pow(-1,(i+1))*height/(Math.floor(Math.random()*(5-3))+3);
      }
      else if (i == 1) {
        var x = -Math.pow(-1,i)*width/(Math.floor(Math.random()*(8-5))+5),
            y = Math.pow(-1,i)*height/(Math.floor(Math.random()*(10-3))+3);
      }
      else {
        var x = -Math.pow(-1,i)*width/(Math.floor(Math.random()*(40-36))-41),
            y = Math.pow(-1,i)*height/(Math.floor(Math.random()*(5-3))+3);

      }

			x = Math.round(x);
      y = Math.round(y);

			$this.removeClass('is-black');

			TweenLite.to( this, 0.8, {delay: i/10, x: x, y: y, ease: Back.easeOut, onComplete: function() {

		}} );

		} else {

				TweenLite.to( this, 0.8, {delay:0.2/(i+1), x: 0, y: 0, ease: Back.easeIn, onComplete: function() {
					$this.addClass('is-black');
			} });
		};
	});
}



/**
 * Détection de la position
 * @param $item (obj) – Element déplacé
 */
nav.checkPos = function(item) {

	var position = item._eventTarget.getBoundingClientRect();

	// Si l'élement est dans le conteneur cible
	if (position.top + position.height > nav.itemTarget.top
		&& position.top < nav.itemTarget.height + nav.itemTarget.top
		&& position.left + position.width > nav.itemTarget.left
		&& position.left < nav.itemTarget.width + nav.itemTarget.left
		&& app.vars.checkPosition) {


			$(item._eventTarget).removeClass('on-target');

			// Animation de tous les items vers le centre
			TweenLite.to( $navItems, .6, { x: 0, y: 0 });

			$body.removeClass('is-active').addClass('is-closed');

			$closeBtn.unbind('click', nav.animate );
			$closeBtn.bind('click', app.closeBtnState );

			// Si oldParent = parent
			app.frameAnim = function() {}
			
      rotatingColors.clicked(true);
      
      if ($(item.target).data('url') == window.location.pathname) {
				app.frameAnimation('play');
			} else {

				// Chargement de la page
				var url = $(item.target).data('url');

				if (!isIE9) {



					History.pushState(null, null, url);

					// app.loadPage(url);

					// On remplace le nom de la page
					pageTitle = $(item.target).data('title');

				} else {
					window.location.href = url;
					app.vars.checkPosition = false;
				}

			}

			// On set la variable checkPosition à false pour ne plus rentrer dans la fonction une fois qu'une boule est mise dans la cible
			app.vars.checkPosition = false;
	}
}



/****************************************************************/

/*
 * Timer pour le resize
 */
$window.on('resize', function() {

	clearTimeout( resizeTimer );
	resizeTimer = setTimeout(function() {

		app.resize();

	}, 100);

});

/*
 * Responsive des éléments en JS
 */
app.responsive = function() {

	// Correction bug - taille du rectagle de chargement
	if (windowWidth > 1919) {
		$squareRect.attr({'width': '10em', 'height': '10em'});
	}

	if (windowWidth < 1920) {
		 $squareRect.attr({'width': '9em', 'height': '9em'});

		if ($html.hasClass('safari') && windowWidth > 1199) {
					$squareRect.attr({'width': '9.3em', 'height': '9.3em'});
		}
	}
}


/*
 * Gestion du resize et des positions
 */
app.resize = function() {

	windowWidth = window.innerWidth,
	windowHeight = window.innerHeight,

	// Position de la cible du menu pour de D&D
	nav.itemTarget = {
		top: $navItemTarget.offset().top,
		left: $navItemTarget.offset().left,
		width: $navItemTarget.outerWidth(),
		height: $navItemTarget.outerHeight()
	};

	app.responsive();
}
