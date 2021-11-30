define([
  "uiComponent",
  "jquery",
  "Magento_Ui/js/modal/modal",
  "Magento_Customer/js/customer-data",
  "mage/cookies",
  "jquery/jquery.cookie",
], function (uiComponent, $, modal, storage) {
  "use strict";

  var cacheKey = "modal-overlay";

  var getData = function () {
    return storage.get(cacheKey)();
  };

  var saveData = function (data) {
    storage.set(cacheKey, data);
  };

  if ($.isEmptyObject(getData())) {
    var modal_overlay = {
      displayed: false,
      visited_pages: 1,
    };
    saveData(modal_overlay);
  }

  return uiComponent.extend({
    initialize: function () {
      this._super();

      var options = {
        type: "popup",
        responsive: true,
        innerScroll: false,
        title: false,
        buttons: false,
        modalClass: "pb_modal-overlay",
        parentModalClass: "pb_modal-overlay_parent",
        modalVisibleClass: "pb_modal-overlay_active _show",
        /*clickableOverlay: true,
        outerClickHandler: function() {
          this.closeModal();
        },*/
      };

      var obj = getData();

      if (/*$.mage.cookies.get('user_allowed_save_cookie') && */obj.visited_pages >= 3) {
        var modal_overlay_element = $("#modal-overlay");
        var popup = modal(options, modal_overlay_element);

        modal_overlay_element.css("display", "block");

        this.openModalOverlayModal();
      }

      this.incVisitedPages(1);
    },

    openModalOverlayModal: function () {
      var modalContainer = $("#modal-overlay");

      if (this.getDisplayed()) {
        return false;
      }

      this.setDisplayed(true);
      this.incVisitedPages(1);

      modalContainer.modal("openModal");
    },

    setDisplayed: function (data) {
      var obj = getData();
      obj.displayed = data;
      saveData(obj);
    },

    getDisplayed: function () {
      return getData().displayed;
    },

    incVisitedPages: function (data) {
      var obj = getData();
      obj.visited_pages = obj.visited_pages + data;
      saveData(obj);
    },

    getVisitedPages: function () {
      return getData().visited_pages;
    },
  });
});
