/* file reading */
// Check for the various File API support.
if (window.File && window.FileReader && window.FileList && window.Blob) {
  function showFile() {
    // var preview = document.getElementById("show-text");
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    var textFile = /text.*/;

    if (file.type.match(textFile)) {
      reader.onload = function (event) {
        // preview.innerHTML = event.target.result;

        jQuery("form.add-file-form button").click();
        jQuery(".jstree-container-ul li:last-child a").click();
        document
          .querySelector(".CodeMirror")
          .CodeMirror.setValue(event.target.result);
      };
    } else {
      preview.innerHTML =
        "<span class='error'>It doesn't seem to be a text file!</span>";
    }
    reader.readAsText(file);
  }
} else {
  alert("Your browser is too old to support HTML5 File API");
}

var isResizing = false,
  lastDownX = 0;

$(function () {
  var container = $(".code-container"),
    left = $(".code-files"),
    right = $(".code-editor"),
    handle = $(".drag"),
    pathLeftDefault = jQuery("#editor-path").position().left;

  handle.on("mousedown", function (e) {
    isResizing = true;
    lastDownX = e.clientX;
  });

  $(document)
    .on("mousemove", function (e) {
      // we don't want to do anything if we aren't resizing.
      if (!isResizing) return;

      //   var offsetRight =
      //     container.width() - (e.clientX - container.offset().left);
      var offsetRight = e.clientX - right.offset().left;
      var offsetRightPath = e.clientX - right.offset().left + 70;

      //   left.css("right", offsetRight);
      //   right.css("width", offsetRight);

      jQuery(".editor-pane, .drag").css("left", offsetRight);
      jQuery("#editor-path").css("left", offsetRightPath);

      // console.log(e.clientX, container.offset().left);
      //   console.log(e.clientX, container.offset().left);
    })
    .on("mouseup", function (e) {
      // stop resizing
      isResizing = false;
    });

  jQuery(document).keyup(function (e) {
    if (e.key === "Escape") {
      // escape key maps to keycode `27`
      // <DO YOUR WORK HERE>
      jQuery(".add-new-input").hide();

      jQuery(".add-opened").removeClass("add-opened");
      jQuery(".code-files").removeClass("adding-new-file");
      jQuery(".code-files").removeClass("adding-new-folder");
    }
  });

  jQuery(".add-new-btn").click(function () {
    jQuery(this).closest(".code-files").toggleClass("add-opened");
    jQuery(".code-files").removeClass("adding-new-file");
    jQuery(".code-files").removeClass("adding-new-folder");
    jQuery(".add-new-input").hide();
  });

  jQuery(".add-new-file").click(function () {
    jQuery(this).closest(".code-files").addClass("adding-new-file");
    jQuery(".add-new-input input").focus();
  });

  jQuery(".add-new-folder").click(function () {
    jQuery(this).closest(".code-files").addClass("adding-new-folder");
    jQuery(".add-new-input input").focus();
  });

  jQuery(".add-file-form").submit(function (e) {
    e.preventDefault();
    jQuery(this).find(".add-new-button").click();

    jQuery(".add-opened").removeClass("add-opened");
    jQuery(".code-files").removeClass("adding-new-file");
    jQuery(".code-files").removeClass("adding-new-folder");
    jQuery(".add-new-input").hide();
  });
});
