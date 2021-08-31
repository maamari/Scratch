function internalLink(myLink) {
  return myLink.host == window.location.host;
}

/*
$("a").each(function () {
  if (internalLink(this) && this.href.indexOf("#") === -1) {
    $(this).click(function (e) {
      e.preventDefault();
      var moduleURL = jQuery(this).attr("href");
      setTimeout(function () {
        window.location = moduleURL;
      }, 700);
      // Class that has page out interaction tied to click
      $(".page-transition").click();
    });
  }
});
*/

$(function () {
  $("#sortable").sortable({
    items: "li:not(.unsortable)",
    disabled: true,
  });
  $("#sortable").enableSelection();

  /* ADD check */
  const addCheck = () => {
    jQuery("ul#sortable").each(function () {
      const addObjectives = [];
      const availObjectives = [];
      jQuery(this)
        .find(".objective-main-text")
        .each(function () {
          availObjectives.push(jQuery(this).text());
        });

      //   console.log(availObjectives);

      if (jQuery(this).children().length <= 5) {
        jQuery(this).closest(".objectives").find(".unsortable").show();

        if (availObjectives.indexOf("CODE") === -1) {
          addObjectives.push("CODE");
        }
        if (availObjectives.indexOf("REFERENCES") === -1) {
          addObjectives.push("REFERENCES");
        }
        if (availObjectives.indexOf("DATA") === -1) {
          addObjectives.push("DATA");
        }
        if (availObjectives.indexOf("PAPER") === -1) {
          addObjectives.push("PAPER");
        }
        if (availObjectives.indexOf("SUBMISSION") === -1) {
          addObjectives.push("SUBMISSION");
        }

        // console.log(addObjectives);

        jQuery(this)
          .closest(".objectives")
          .find(".addLinkGroup ul")
          .find("li")
          .remove();

        for (let i = 0; i < addObjectives.length; i++) {
          jQuery(this)
            .closest(".objectives")
            .find(".addLinkGroup ul")
            .append(`<li>${addObjectives[i]}</li>`);
        }
      } else {
        jQuery(this).find("li.unsortable").hide();
        jQuery(this).closest(".objectives").find(".unsortable").hide();
      }

      //   console.log(addObjectives);
    });
  };

  addCheck();

  /* ADD click */
  jQuery(".project-complete").delegate(".addLink", "click", function (e) {
    e.preventDefault();
    jQuery(this).next("ul").slideToggle();
  });

  /* ADD dropdown link click */
  jQuery(".project-complete").delegate(
    ".addLinkGroup ul li",
    "click",
    function (e) {
      e.preventDefault();

      let liText = jQuery(this).text();
      jQuery(this)
        .closest(".objectives")
        .find(".objective-grid > ul li:last-child")
        .before(
          `<li><div class="objective-inner-text"><span class="objective-main-text">${liText}</span> <span class="close">&times;</span></div></li>`
        );

      $(this)
        .closest(".objectives")
        .find(".objective-grid #sortable")
        .sortable({
          items: "li:not(.unsortable)",
          disabled: true,
        });
      $(this)
        .closest(".objectives")
        .find(".objective-grid #sortable")
        .enableSelection();

      jQuery(this).closest(".objectives").find("ul#sortable .close").hide();
      jQuery(this).closest(".objectives").find(".editLink").text("EDIT");

      /* project name and input */
      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".collab-title .t-collab-title-index")
        .show();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".project-edit-name")
        .remove();

      /* project delete */
      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .parent("div")
        .find(".delete-project")
        .remove();

      jQuery(this).closest(".objectives").removeClass("edit-enabled");

      jQuery(this).closest(".objectives").find(".unsortable ul").slideToggle();

      jQuery(this)[0].remove();

      addCheck();
    }
  );

  /* EDIT click */
  $(".project-complete").on("click", ".editLink", function (e) {
    e.preventDefault();

    $(this).closest(".objectives").find(".objective-grid #sortable").sortable({
      items: "li:not(.unsortable)",
      disabled: false,
    });
    $(this)
      .closest(".objectives")
      .find(".objective-grid #sortable")
      .disableSelection();

    if (jQuery(this).text().trim() === "EDIT") {
      /* when editing */
      jQuery(this)
        .closest(".objectives")
        .find(".close")
        .css("display", "inline");
      jQuery(this).text("DONE");

      jQuery(this).closest(".objectives").addClass("edit-enabled");

      /* project name and input */
      let projectName = jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".collab-title .t-collab-title-index")
        .text()
        .trim();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".collab-title .t-collab-title-index")
        .hide();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".collab-title")
        .append("<input type='text' class='project-edit-name' />");

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".project-edit-name")
        .val(projectName)
        .focus();

      /* objective name and input */
      let objectiveName = jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".c-collab-intro-text .t-short")
        .text()
        .trim();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".c-collab-intro-text .t-short")
        .hide();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".c-collab-intro-text")
        .append("<input type='text' class='project-edit-objective' />");

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".project-edit-objective")
        .val(objectiveName);

      /* project delete */

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .parent("div")
        // .find(".collab-title")
        .append("<div class='delete-project'>DELETE</div>");
    } else {
      /* when done */
      $(this)
        .closest(".objectives")
        .find(".objective-grid #sortable")
        .sortable({
          items: "li:not(.unsortable)",
          disabled: true,
        });
      $(this)
        .closest(".objectives")
        .find(".objective-grid #sortable")
        .enableSelection();

      jQuery(this).closest(".objectives").find(".close").hide();
      jQuery(this).text("EDIT");
      jQuery(this).closest(".objectives").removeClass("edit-enabled");

      /* project name and input */
      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".collab-title .t-collab-title-index")
        .show();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".project-edit-name")
        .remove();

      /* objective name and input */
      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".c-collab-intro-text .t-short")
        .show();

      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .find(".project-edit-objective")
        .remove();

      /* project delete */
      jQuery(this)
        .closest(".objectives")
        .parent("div")
        .prev("div")
        .parent("div")
        .find(".delete-project")
        .remove();
    }
  });

  /* CLOSE click */
  $(".project-complete").delegate(
    ".objective-grid .close",
    "click",
    function (e) {
      e.preventDefault();
      jQuery(this).closest("li").remove();
      addCheck();
    }
  );

  /* objective opened section events */

  jQuery(".project-complete").delegate(
    ".item-index .objective-main-text",
    "click",
    function (e) {
      e.preventDefault();

      const objectiveText = jQuery(this).text().trim();
      jQuery(this).closest(".item-index").addClass("fixed-objective");
      jQuery(this)
        .closest(".item-index")
        .find(".div-block-816")
        .append('<div class="close-fixed-objective">&times;</div>');

      jQuery(this)
        .closest(".item-index")
        .find(".c-collab-intro-text .t-short")
        .text(objectiveText);

      jQuery(window).scrollTop(
        jQuery(".item-index.fixed-objective .div-block-816").offset().top -
          parseFloat(jQuery(".c-index-description").css("padding-top"))
      );
    }
  );

  jQuery(".project-complete").delegate(
    ".item-index .close-fixed-objective",
    "click",
    function () {
      jQuery(this).closest(".item-index").removeClass("fixed-objective");
      jQuery(this)
        .closest(".item-index")
        .find(".c-collab-intro-text .t-short")
        .text("OBJECTIVE");
      jQuery(this).remove();
    }
  );

  /* accordion projects */
  jQuery(".w-dyn-items").delegate(
    ".project-item:not(.new-project) a",
    "click",
    function (e) {
      e.preventDefault();
      jQuery(this)
        .closest(".project-item")
        .toggleClass("opened-project")
        .prev(".project-item-details")
        .slideToggle()
        .toggleClass(".opened-project-details");
    }
  );

  /* project name change */
  jQuery(".project-complete").on("keyup", ".project-edit-name", function () {
    let projectName = jQuery(this).val();

    /* project item title name change */
    jQuery(this)
      .closest(".item-index.w-dyn-item")
      .next(".project-item")
      .find(".t-hero-index-title")
      .text(projectName);

    /* project detail name change */
    jQuery(this)
      .closest(".collab-title")
      .find(".t-collab-title-index")
      .text(projectName);

    const projectIndex = Math.floor(
      jQuery(this).closest(".item-index.w-dyn-item").index() / 2
    );

    /* left sidebar project name change */
    jQuery(".c-sticky-nav-content .w-dyn-item")
      .eq(projectIndex)
      .find(".t-anchor-link-title")
      .text(projectName);
  });

  /* objective name change */
  jQuery(".project-complete").on(
    "keyup",
    ".project-edit-objective",
    function () {
      let objectiveName = jQuery(this).val();

      /* project detail name change */
      jQuery(this)
        .closest(".c-collab-intro-text")
        .find(".t-short")
        .text(objectiveName);
    }
  );

  /* project delete */
  jQuery(".project-complete").on("click", ".delete-project", function () {
    let projectName = jQuery(this)
      .closest(".project-item-details")
      .find(".t-collab-title-index")
      .text();

    let projectIndex = Math.floor(
      jQuery(this).closest(".item-index.w-dyn-item").index() / 2
    );

    jQuery(".project-modal-popup").css("display", "flex");
    jQuery(".project-modal-popup button").attr(
      "data-project-name",
      projectName
    );

    jQuery(".project-modal-popup button").attr("data-index", projectIndex);
  });

  /* modal delete button */
  jQuery(".project-modal-popup button").click(function () {
    let userProjectInput = jQuery(".project-name-enter").val().toLowerCase();
    let projectName = jQuery(".project-modal-popup button")
      .attr("data-project-name")
      .toLowerCase();

    if (userProjectInput === projectName) {
      let projectIndex = jQuery(".project-modal-popup button").attr(
        "data-index"
      );
      let projectItemIndex = parseInt(projectIndex) + 1;

      console.log(projectItemIndex);

      /* left sidebar project delete */
      jQuery(".c-sticky-nav-content .w-dyn-item").eq(projectIndex).remove();

      /* project item delete */
      jQuery(".project-item").eq(projectItemIndex).remove();

      /* project details delete */
      jQuery(".project-item-details").eq(projectIndex).remove();

      /* modal reset */
      jQuery(".project-modal-popup input").val("");
      jQuery(".project-modal-popup").hide();
    } else {
      alert("Please enter correct project name");
    }
  });

  /* modal cancel button */
  jQuery(".project-modal-popup .close-modal").click(function () {
    jQuery(".project-modal-popup").hide();
  });

  /* new project */
  jQuery(".project-item.new-project a").click(function (e) {
    e.preventDefault();

    jQuery(".c-sticky-nav-content .w-dyn-items").append(
      '<div role="listitem" class="w-dyn-item"> <div href="#001" data-w-id="0f574f15-03f4-d151-b0b4-07b783ed6726" class="c-anchor-link" > <div class="c-sticky-item"> <div data-scroll="mid" class="h-anchor-cms w-embed"> <a href="#"> <div class="t-anchor-arrow">↳</div><div class="t-anchor-link-title" style="border-color: rgba(26, 26, 26, 0.3)" > New Project </div></a> </div><div class="t-anchor-arrow off">↳&nbsp;&nbsp;</div><div class="t-anchor-number off">(/00–</div><div class="t-anchor-link-title off" style="border-color: rgba(26, 26, 26, 0.3)" > This is some text inside of a div block. </div></div></div></div>'
    );

    jQuery(this)
      .closest(".w-dyn-items")
      .append(
        '<div data-w-id="480b654b-8f2e-b8e4-b2d2-2adeecb88a3d" role="listitem" class="item-index collabs w-dyn-item project-item-details" style="opacity: 1" > <div class="w-embed"> <div id="Apple" class=""></div> </div> <div class="w-layout-grid g-8col grid-meta"> <div id="w-node-_480b654b-8f2e-b8e4-b2d2-2adeecb88a40-b3e010b1" class="div-block-631" > <div class="t-meta">' +
          (new Date().getMonth() + 1) +
          "/" +
          new Date().getDate() +
          "/" +
          new Date().getFullYear() +
          '</div> </div> <div id="w-node-_480b654b-8f2e-b8e4-b2d2-2adeecb88a44-b3e010b1" ></div> <div id="w-node-_480b654b-8f2e-b8e4-b2d2-2adeecb88a46-b3e010b1" class="mobile" ></div> <div id="w-node-_480b654b-8f2e-b8e4-b2d2-2adeecb88a48-b3e010b1" > <div class="t-meta">Collaborators</div> </div> </div> <div class="div-block-816"> <div id="w-node-_480b654b-8f2e-b8e4-b2d2-2adeecb88a5c-b3e010b1" class="container-collab-copy" > <div class="c-delta-post-ctas w-condition-invisible"> <a data-w-id="d9f2b828-5712-628c-b42c-4283a26198c2" href="#" class="c-link w-inline-block" > <div class="t-short w-dyn-bind-empty"></div> <div class="t-short arrow">→</div> </a> </div> <div class="c-text-line collab-title"> <div class="t-collab-title-index">New Project</div> </div> <div class="c-collab-intro-text"> <div class="t-short">Objective</div> </div> </div> <div class="div-block-817"> <div class="objectives"> <div class="objective-grid"> <ul id="sortable"> <li class="ui-state-default"> <div class="objective-inner-text"><span class="objective-main-text">CODE</span> <span class="close">&times;</span></div> </li> <li class="ui-state-default"> <div class="objective-inner-text"><span class="objective-main-text">DATA</span> <span class="close">&times;</span></div> </li> <li class="ui-state-default"> <div class="objective-inner-text"><span class="objective-main-text">REFERENCES</span> <span class="close">&times;</span></div> </li> <li class="ui-state-default"> <div class="objective-inner-text"><span class="objective-main-text">PAPER</span> <span class="close">&times;</span></div> </li> <li class="ui-state-default"> <div class="objective-inner-text"><span class="objective-main-text">SUBMISSION</span> <span class="close">&times;</span></div> </li> <li class="unsortable"> <div class="objective-inner-text"> <a class="addLinkGroup" href="#"> <span class="addLink">ADD +</span> <ul> <li>ONE more</li> <li>ONE</li> <li>ONE</li> </ul> </a> </div> </li> </ul> </div> <div class="objective-edit"> <a class="editLink" href="#"> EDIT </a> </div> </div> </div> </div> </div> <div role="listitem" class="w-dyn-item project-item"> <div class="c-hero-anchor-link off"> <div id="w-node-dcf02841-8aba-40b3-821c-ce026ed35e4d-b3e010b1" class="c-hero-index-date" > <div class="t-hero-index-date">2018+</div> </div> <div id="w-node-dcf02841-8aba-40b3-821c-ce026ed35e4f-b3e010b1" class="c-hero-index-title" > <div class="t-hero-index-x">×</div> <div class="t-hero-index-title">Apple</div> <div class="t-hero-index-r">®</div> </div> <div id="w-node-dcf02841-8aba-40b3-821c-ce026ed35e51-b3e010b1" class="c-hero-index-role" > <div class="t-hero-index-role">Product Marketing</div> </div> <div id="w-node-dcf02841-8aba-40b3-821c-ce026ed35e53-b3e010b1" class="c-hero-index-arrow" > <div class="t-hero-index-arrow">↓</div> </div> </div> <div class="e-collab-index w-embed"> <a href="#"> <div class="c-hero-anchor-link"> <div class="c-hero-index-date"> <div class="t-hero-index-date">' +
          new Date().getFullYear() +
          '</div> </div> <div class="c-hero-index-title"> <div class="t-hero-index-title">New Project</div> </div> <div class="c-hero-index-role"> <div class="t-hero-index-role">Domain</div> </div> <div class="c-hero-index-arrow"> <div class="t-hero-index-arrow">↓</div> </div> </div> </a> </div> </div>'
      );
  });

  jQuery(".project-complete").on(
    "click",
    ".project-item-details div:last-child .t-meta",
    function () {
      if (
        jQuery(this).closest(".project-item-details").find(".collab-modal")
          .length === 0
      ) {
        jQuery(this)
          .closest(".project-item-details")
          .append(
            '<div class="collab-modal"> <div class="collab-modal-inside"> <div class="collab-row collab-header"> <div class="collab-col"><h4>USER@EMAIL.COM</h4></div><div class="collab-col"><h4>PROJECT LEAD</h4></div></div><div class="collab-inputs"> </div><hr> <div class="collab-row"> <div class="collab-col"> <input type="email" placeholder="ENTER EMAIL"> </div><div class="collab-col"> <select name="" id="collab-select"> <option value="">SELECT</option> <option value="CAN EDIT">CAN EDIT</option> <option value="READ ONLY">READ ONLY</option> </select> <button>ADD</button> </div></div></div><span class="collab-close">×</span> </div>'
          );
      } else {
        jQuery(this)
          .closest(".project-item-details")
          .find(".collab-modal")
          .css("display", "flex");
      }

      jQuery(this)
        .closest(".project-item-details")
        .find(".collab-modal input")
        .focus();
    }
  );

  jQuery(".project-complete").on("click", ".collab-close", function () {
    jQuery(this).closest(".project-item-details").find(".collab-modal").hide();
  });

  jQuery(".project-complete").on("click", ".collab-modal button", function () {
    let userEmail = jQuery(this).closest(".collab-modal").find("input").val();
    let userRole = jQuery(this).closest(".collab-modal").find("select").val();

    if (userRole != "") {
      jQuery(this)
        .closest(".collab-modal")
        .find(".collab-inputs")
        .append(
          `<div class="collab-row"><div class="collab-col"><h4>${userEmail}</h4></div><div class="collab-col"><h4>${userRole}</h4></div><span class='collab-input-delete'>×</span></div>`
        );
    }
  });

  /* user email delete */
  jQuery(".project-complete").on("click", ".collab-input-delete", function () {
    jQuery(this).closest(".collab-row").remove();
  });

  /* left sidebar link click */
  jQuery(".c-sticky-nav-content").on("click", ".w-dyn-item a", function (e) {
    e.preventDefault();

    let projectItemIndex =
      parseInt(jQuery(this).closest(".w-dyn-item").index()) + 1;

    jQuery(".project-item").eq(projectItemIndex).find("a").click();
  });
});
