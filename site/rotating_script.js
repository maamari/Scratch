var rotatingColors = (function() {
  var mod = {
    showing: false,
    show: function() {
      mod.showing = true;
      mod.element.className = mod.element.className.split(" show").join("") + " show";
    },
    hide: function() {
      mod.showing = false;
      mod.element.className = mod.element.className.split(" show").join("");
    },
    _clicked: false,
    clicked: function(redirect) {
      if (!mod._clicked) {
        mod._clicked = true;
      } else {
        mod._clicked = false;
        mod.show();
        if (redirect === true) {
          setTimeout(function() {
            mod.hide();
          }, 1000);
          setTimeout(function() {
            location.href = "projects.html";
          }, 1300);
        }
      }
    },
    start: function(navTrigger) {
      mod.navTrigger = navTrigger;
      mod.element = navTrigger.querySelector(".rotating-colors");
      mod.navTrigger.addEventListener("click", function() {
        if (mod.showing) {
          mod.hide();
        }
        mod.clicked();
      });
      mod.element.addEventListener("mouseenter", function() {
        if (!mod._clicked) mod.show();
      });
      mod.element.addEventListener("mouseleave", function() {
        if (!mod._clicked) mod.hide();
      });
    }
  };
  return mod;
})();
