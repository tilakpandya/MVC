//alert('1');
var Base = function () {};

Base.prototype = {
  alert: function () {
    //alert('1111');
  },

  url: null,
  params: {},
  method: "post",

  setUrl: function (url) {
    this.url = url;
    return this;
  },
  getUrl: function () {
    return this.url;
  },

  setMethod: function (method) {
    this.method = method;
    return this;
  },
  getMethod: function () {
    return this.method;
  },

  resetParams: function (params) {
    this.params = {};
    return this;
  },
  setParams: function (params) {
    this.params = params;
    return this;
  },
  getParams: function (key = null) {
    if (typeof key === "undefined") {
      return this.params;
    }
    if (typeof this.params[key] == "undefined") {
      return null;
    }

    return this.params[key];
  },
  addParam: function (key, value) {
    this.params[key] = value;
    return this;
  },
  removeParam: function (key) {
    if (typeof this.params[key] != "undefined") {
      delete this.params[key];
    }

    return this;
  },

    load: function () {
      var self = this;
      var request = $.ajax({
      method: this.getMethod(),
      url: this.getUrl(),
      data: this.getParams(),

      success: function (response) {
        self.manageHtml(response)
      }
    });
  },

  manageHtml : function(response) {
    if (typeof response.element == 'undefined'){
        return false;
    } 
    if (typeof response.element == "object") {
        $(response.element).each(function (i, element) {
        $(element.selector).html(element.html);
        });
    } else {
        $(response.element.selector).html(response.element.html);
    }
  }
}


var object = new Base();