define([
  "uiComponent",
  "jquery",
  "Magento_Ui/js/modal/modal",
  "Magento_Customer/js/customer-data",
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
        /*appendTo: "body",
        autoOpen: false,*/
        buttons: false /*[{
          text: $.mage.__('Ok'),
          class: '',
          click: function () {
            this.closeModal();
          }
        }]*/,
        /*clickableOverlay: false,
        closeText: $.mage.__('Close'),
        customTpl: "ui/template/modal/modal-custom.html",
        focus: '[data-role="closeBtn"]',*/
        innerScroll: false,
        modalClass: "pb_modal-overlay",
        /*modalAction: '[data-role="action"]',
        modalCloseBtn: '[data-role="closeBtn"]',
        modalContent: '[data-role="content"]',
        modalLeftMargin: 45,
        modalSubTitle: '[data-role="subTitle"]',
        modalTitle: '[data-role="title"]',*/
        modalVisibleClass: "pb_modal-overlay_active _show",
        parentModalClass: "pb_modal-overlay_parent _has-modal",
        outerClickHandler: function() {
          $("#modal-overlay").modal("closeModal");
        },
        /*popupTpl: "ui/template/modal/modal-popup.html",*/
        responsive: true,
        /*slideTpl: "ui/template/modal/modal-slide.html",*/
        subTitle: false,
        title: false,
        /*trigger: '[data-trigger="trigger"]',*/
        type: "popup",
      };

      var obj = getData();

      if (obj.visited_pages >= 3) {
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
