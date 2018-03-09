;(function () {
  'use strict';

// Namespaces and initialization
  window.PAYPAL = window.PAYPAL || {};
  window.fpti = window.fpti || {};
  window.fptiserverurl = window.fptiserverurl || '//t.paypal.com/ts';
  PAYPAL.analytics = PAYPAL.analytics || {};
  PAYPAL.analytics.options = {}; // holds setup() options
  PAYPAL.analytics.settings = ''; // `pp` if setup is for paypal, `3p` if set as 3party, and `mo` for mobile
  PAYPAL.analytics.beaconURL = ''; // holds the beacon url with the fpti parameters (useful for testing)
  var noop = function () {};

// check for support
  var sStorage = window.sessionStorage;  // eslint-disable-line no-unused-vars
  var wp = window.performance;
  var wpr = !!(wp && wp.getEntries); // eslint-disable-line no-unused-vars
  var dn = !!Date.now;

// constructor
  PAYPAL.analytics.Analytics = function (options) {
    this._init(options);
  };

  PAYPAL.analytics.Analytics.prototype = {

  // analytics version
    version: '1.1.2',

  // default options
    options: {
      click: {
        elements: '*[data-pa-click]',
        onClick: noop,
        request: {
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      },

      formAbandonment: {
        elements: 'form',
        request: {
          keys: {
            lastFormFocused: 'lf',
            lastInputFocused: 'li'
          },
          values: {
            eventType: 'fa'
          }
        }
      },

      impression: {
        request: {
          keys: {
            cookiesEnabled: 'ce',
            plugins: 'pl',
            jsVersion: 'jsv', // not used
            pageTitle: 'pt',
            referrer: 'ru',
            screenColorDepth: 'cd',
            screenWidth: 'sw',
            screenHeight: 'sh',
            browserWidth: 'bw',
            browserHeight: 'bh'
          },
          values: {
            eventType: 'im'
          }
        }
      },

      request: {
        data: {}, // custom data
        unloadDelay: false, // set this to an integer in ms to delay unload to beat race condition
        keys: { // these default params will be prefixed with the prefix
          version: 'v',
          timestamp: 't',
          gmtOffset: 'g', // in minutes
          eventType: 'e'
        },
        values: {
          eventType: 'na',
          'true': 1,
          'false': 0
        },
        keyPrefix: '', // the prefix to be used for system variable keys in the query string
        url: window.fptiserverurl,
        onBeaconCreate: noop
      }
    },

    _delayUnloadUntil: null, // the browser will not unload until this timestamp is met
    _lastFormFocused: null, // the last form that was focused on
    _lastInputFocused: null, // the last input that was focused on

  // constructor
    _init: function (options) {
    // set options
      this.setOptions(options);

    // add unload delay listener
      this._enableUnloadDelay();
    },

  // merges two options objects
    _mergeOptions: function (options1, options2) {
    // convert data query string to object if needed
      if (options1 && options1.data && typeof options1.data === 'string') {
        options1.data = this.utils.queryStringToObject(options1.data);
      }
      if (options2 && options2.data && typeof options2.data === 'string') {
        options2.data = this.utils.queryStringToObject(options2.data);
      }
      return this.utils.merge(options1, options2);
    },

    _enableUnloadDelay: function () {
      var self = this;
      var delay = function () {
        var now;
      // lock browser until delay is met
        if (self._delayUnloadUntil) {
          do {
            now = new Date();
          } while (now.getTime() < self._delayUnloadUntil);
        }
      };
      this.utils.removeListener(window, 'beforeunload', delay);
      this.utils.addListener(window, 'beforeunload', delay);
    },

  // fires a tracking event with the prefix prepended to all event datas
  // note: this is only used for predefined events like impression, click, etc
    _recordEvent: function (eventData, options) {
      var key;
      options = this._mergeOptions(this.options.request, options);
    // ensure data is set
      options.data = options.data || {};

    // prepend prefix to all event data keys and add event data to options.data
      for (key in eventData) {
        options.data[options.keyPrefix + key] = eventData[key];
      }

    // record this event
      this.record(options);
    },

  // makes tracking record request
    _request: function (options) {
      this._createBeacon(options);
    },

  // creates an image tag for sending a tracking request to the server
    _createBeacon: function (options) {
      var beacon = new window.Image();
      if (typeof options.onBeaconCreate === 'function' && options.onBeaconCreate(beacon) !== false) {
        beacon.src = this._generateBeaconUrl(options);

      // unload delay (browser lock)
        if (options.unloadDelay) {
          this.setUnloadDelay(options.unloadDelay);
        }
      }
      else if (options.logActivity) {
        beacon.src = this._generateBeaconUrlForLoggingActivity(options);
      }
      PAYPAL.analytics.beaconURL = beacon.src; // expose the parameters for testing purposes
    },

  // generates a beacon url given request options
    _generateBeaconUrl: function (options) {
      var parts = options.url.split('?');
      var url = parts[0]; // remove existing query string
      var optKeys = options.keys; // caching the keys
      var tempFpti = window.fpti.constructor();
      var key;
      var perfData;
      var rLogId;

    // deep clone
      for (key in window.fpti) {
        tempFpti[key] = window.fpti[key];
      }

    // if url begins with '//' then we automatically add the current protocol
      if (url.match(/^\/\//)) {
        url = window.location.protocol + url;
      }

    // add query string delimiter
      url += '?';

    // reappend existing query string
      if (parts[1]) {
        url += parts[1] + '&';
      }

    // append version
      url += options.keyPrefix + optKeys.version + '=' + encodeURIComponent(this.version);

    // append timestamp
      if (optKeys.timestamp) {
        url = this._appendQueryStringData(url, options.keyPrefix + optKeys.timestamp, this._getTimestamp());
      }

    // append gmt offset
      if (optKeys.gmtOffset) {
        url = this._appendQueryStringData(url, options.keyPrefix + optKeys.gmtOffset, this._getGmtOffset());
      }

    // append type
      if (optKeys.eventType) {
        url = this._appendQueryStringData(url, options.keyPrefix + optKeys.eventType, options.values.eventType);
      }
    // append the data in options data

      for (var opt in options.data) {
      // if Opinion Labs Comment, remove email and numbers
        if (opt === 'opic') {
          var opic = tempFpti[opt] || options.data[opt];
          opic = opic.replace(/\w+@\w+\.\w+/g, '');
          opic = opic.replace(/\d+/g, '');
          tempFpti[opt] = opic;
        }
        else {
          tempFpti[opt] = tempFpti[opt] || options.data[opt];
        }
      }

      for (key in tempFpti) {
        if (tempFpti[key] !== '') {
          url = this._appendQueryStringData(url, key, tempFpti[key]);
        }
      }

      perfData = this._buildPerformanceData(options.data);

      for (key in perfData) {
        url = this._appendQueryStringData(url, key, perfData[key]);
      }

    // get rLogId, but not for 3p
      if (PAYPAL.analytics.settings !== '3p') {
        rLogId = this._getRLogId();
        if (rLogId) {
          url = this._appendQueryStringData(url, 'teal', rLogId);
        }
      }

      return this.utils.checkPayloadSize(url);
    },

    _generateBeaconUrlForLoggingActivity: function (data) {
      var url = window.fptiserverurl + '?v=' + this.version;

    // add additional data
      data.g = this._getGmtOffset();
      data.t = this.getTimeNow();

    // if starts time exists provide delta
      if (data.start) {
        data.end = data.end || data.t;
        data.tt = data.end - data.start;
      }

    // delete unneeded data e.g. flags etc
      delete data.logActivity;
      delete data.trackCPL;

      for (var key in data) {
        if (data[key] !== '') {
          url = this._appendQueryStringData(url, key, data[key]);
        }
      }

      return this.utils.checkPayloadSize(url);
    },

  // adds a new piece of data to the query string of a url
    _appendQueryStringData: function (url, key, value) {
      if ((key || key === 0) && (value || value === 0)) {
        url += '&' + key + '=' + encodeURIComponent(value);
      }
      return url;
    },

  // gets current timestamp in epoch seconds
    _getTimestamp: function () {
      return dn ? Date.now() : (new Date()).getTime();
    },

  // build the Performance Timing related data
    _buildPerformanceData: function (data) {
      var perf = {};
      var pgst = data.pgst || 0;
      if (!PAYPAL.analytics.perf) {
        if (wp) {
          var timing = wp.timing;
          var secureConTime = timing.secureConnectionStart || timing.connectEnd;
          var loadEventEnd = timing.loadEventEnd || timing.loadEventStart;
          perf.t1 = this._getPerformanceData(timing.requestStart, timing.fetchStart); // t1 - DNS+Connection+SSL (t1c + t1d + t1s));
          perf.t1c = this._getPerformanceData(timing.connectEnd, timing.fetchStart); // t1c - Network latency or Connection timing
          perf.t1d = this._getPerformanceData(timing.domainLookupEnd, timing.domainLookupStart); // t1d - DNS resolution timing
          perf.t1s = this._getPerformanceData(timing.connectEnd, secureConTime); // t1s - SSL timing
          perf.t2 = this._getPerformanceData(timing.responseStart, timing.requestStart); // t2 - Server time
          perf.t3 = this._getPerformanceData(timing.responseEnd, timing.responseStart); // t3- Html/Content download time
          perf.t4d = this._getPerformanceData(timing.domComplete, timing.domLoading); // t4d - DOM Timing
          perf.t4 = this._getPerformanceData(loadEventEnd, timing.domLoading); // t4- Browser process time (t4d + t4e)
          perf.t4e = this._getPerformanceData(loadEventEnd, timing.loadEventStart); // t4e - Event Binding timing
          perf.tt = this._getPerformanceData(loadEventEnd, timing.navigationStart); // tt - The whole process of navigation and page load;
          if (wpr && typeof PAYPAL.analytics.captureResourceTiming === 'function' && PAYPAL.analytics.options.trackCPL) {
            perf.view = JSON.stringify({t10: timing.requestStart, t11: loadEventEnd});
            perf.res = JSON.stringify(PAYPAL.analytics.captureResourceTiming());
          }
        }
        else if (pgst) { // Server sets the pgst value (page Load Start Time)
          perf.told = this._getTimestamp() - pgst; // (t old) t2+t3+t4
        }
        PAYPAL.analytics.perf = perf;
      }
      return perf;
    },
  // if the delta is bigger than max return 0
    _getPerformanceData: function (end, start) {
      var diff = 0;
      var max = 600000; // 10 minutes
      if (this._validateNumber(start) && this._validateNumber(end)) { // Both start & end has to be a valid number
        if (end >= start) { // End should be greater than 0 & bigger or equal to start
          diff = end - start;
          if (diff > max) { // End should not be bigger than max
            diff = 0;
          }
        }
      }
      return diff;
    },

  // Check for valid number
    _validateNumber: function (value) {
      return Number(value) === value && value >= 0;
    },

  // Captures the rLogId from the page (rLogId is located in the head html tag as a comment)
    _getRLogId: function () {
      var rLogId = window.rLogId;
      var commentNode;
      var commentData;
      if (!rLogId) {
      // if rLogId is not defined, find it in head html tag as a comment
        commentNode = [].slice.call(document.head.childNodes).filter(function (node) {
          return node.nodeType === 8;
        })[0];
        if (typeof commentNode === 'object') {
          commentData = commentNode.data.trim().split(' : ');
          if (commentData.length > 2) {
            rLogId = commentData[commentData.length - 1];
          }
        }
      }
      return rLogId;
    },

  // gets current gmt offset in minutes
    _getGmtOffset: function () {
      return new Date().getTimezoneOffset();
    },

  // get page title
    _getPageTitle: function () {
      return document.title;
    },

  // get referrer
    _getReferrer: function () {
      return document.referrer;
    },

  // gets screen color depth
    _getScreenColorDepth: function () {
      return window.screen.colorDepth;
    },

  // gets screen dimensions
    _getScreenDimensions: function () {
      return {
        width: window.screen.width,
        height: window.screen.height
      };
    },

  // gets browser dimensions
    _getBrowserDimensions: function () {
    // pulled from http://andylangton.co.uk/articles/javascript/get-viewport-size-javascript/
      var browserWidth;
      var browserHeight;
      var element = document.documentElement;

    // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
      if (window.innerWidth) {
        browserWidth = window.innerWidth;
        browserHeight = window.innerHeight;
      }
    // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
      else if (typeof element !== 'undefined' && typeof element.clientWidth !== 'undefined' && element.clientWidth !== 0) {
        browserWidth = element.clientWidth;
        browserHeight = element.clientHeight;
      }
    // older versions of IE
      else {
        element = document.getElementsByTagName('body')[0];
        browserWidth = element.clientWidth;
        browserHeight = element.clientHeight;
      }

      return {
        width: browserWidth,
        height: browserHeight
      };
    },

  // gets boolean for java enabled
    _getJavaEnabled: function (options) {
      options = this._mergeOptions(this.options.request, options);
      return (navigator.javaEnabled()) ? options.values['true'] : options.values['false'];
    },

  // gets boolean for cookies enabled
    _getCookiesEnabled: function (options) {
      options = this._mergeOptions(this.options.request, options);

      var enabled = 0;
      if (navigator.cookieEnabled === 'undefined') {
        document.cookie = 'enabledCheck';
        enabled = (document.cookie.indexOf('enabledCheck') !== -1) ? options.values['true'] : options.values['false'];
      }
      else {
        enabled = (navigator.cookieEnabled) ? options.values['true'] : options.values['false'];
      }
      return enabled;
    },

  // gets flash version information for metadata
    _getFlashVersion: function () {
      var version = null;

    // pulled from http://www.featureblend.com/flash_detect_1-0-4/flash_detect.js
      if (navigator.plugins && navigator.plugins.length > 0) {
        var type = 'application/x-shockwave-flash';
        var mimeTypes = navigator.mimeTypes;
        if (mimeTypes && mimeTypes[type] && mimeTypes[type].enabledPlugin && mimeTypes[type].enabledPlugin.description) {
          version = mimeTypes[type].enabledPlugin.description;
        }
      }

      return version;
    },

  // get plugin data to check for
    _getPluginData: function () {
      return {
        director: 'application/x-director',
        mediaplayer: 'application/x-mplayer2',
        pdf: 'application/pdf',
        quicktime: 'video/quicktime',
        real: 'audio/x-pn-realaudio-plugin',
        silverlight: 'application/x-silverlight'
      };
    },

  // gets the IE plugin data
    _getPluginDataIE: function () {
      var names = ['abk', 'wnt', 'aol', 'arb', 'chs', 'cht', 'dht',
        'dhj', 'dan', 'dsh', 'heb', 'ie5', 'icw', 'ibe',
        'iec', 'ieh', 'iee', 'jap', 'krn', 'lan', 'swf',
        'shw', 'msn', 'wmp', 'obp', 'oex', 'net', 'pan',
        'thi', 'tks', 'uni', 'vtc', 'vnm', 'mvm', 'vbs',
        'wfd'
      ];
      var components = ['7790769C-0471-11D2-AF11-00C04FA35D02',
        '89820200-ECBD-11CF-8B85-00AA005B4340',
        '47F67D00-9E55-11D1-BAEF-00C04FC2D130',
        '76C19B38-F0C8-11CF-87CC-0020AFEECF20',
        '76C19B34-F0C8-11CF-87CC-0020AFEECF20',
        '76C19B33-F0C8-11CF-87CC-0020AFEECF20',
        '9381D8F2-0288-11D0-9501-00AA00B911A5',
        '4F216970-C90C-11D1-B5C7-0000F8051515',
        '283807B5-2C60-11D0-A31D-00AA00B92C03',
        '44BBA848-CC51-11CF-AAFA-00AA00B6015C',
        '76C19B36-F0C8-11CF-87CC-0020AFEECF20',
        '89820200-ECBD-11CF-8B85-00AA005B4383',
        '5A8D6EE0-3E18-11D0-821E-444553540000',
        '630B1DA0-B465-11D1-9948-00C04F98BBC9',
        '08B0E5C0-4FCB-11CF-AAA5-00401C608555',
        '45EA75A0-A269-11D1-B5BF-0000F8051515',
        'DE5AED00-A4BF-11D1-9948-00C04F98BBC9',
        '76C19B30-F0C8-11CF-87CC-0020AFEECF20',
        '76C19B31-F0C8-11CF-87CC-0020AFEECF20',
        '76C19B50-F0C8-11CF-87CC-0020AFEECF20',
        'D27CDB6E-AE6D-11CF-96B8-444553540000',
        '2A202491-F00D-11CF-87CC-0020AFEECF20',
        '5945C046-LE7D-LLDL-BC44-00C04FD912BE',
        '22D6F312-B0F6-11D0-94AB-0080C74C7E95',
        '3AF36230-A269-11D1-B5BF-0000F8051515',
        '44BBA840-CC51-11CF-AAFA-00AA00B6015C',
        '44BBA842-CC51-11CF-AAFA-00AA00B6015B',
        '76C19B32-F0C8-11CF-87CC-0020AFEECF20',
        '76C19B35-F0C8-11CF-87CC-0020AFEECF20',
        'CC2A9BA0-3BDD-11D0-821E-444553540000',
        '3BF42070-B3B1-11D1-B5C5-0000F8051515',
        '10072CEC-8CC1-11D1-986E-00A0C955B42F',
        '76C19B37-F0C8-11CF-87CC-0020AFEECF20',
        '08B0E5C0-4FCB-11CF-AAA5-00401C608500',
        '4F645220-306D-11D2-995D-00C04F98BBC9',
        '73FA19D0-2D75-11D2-995D-00C04F98BBC9'
      ];
      var plugins = {};
      var body = document.body;

      if (body.addBehavior) {
        body.addBehavior('#default#clientCaps');
      }

      for (var i = 0; i < components.length; i++) {
        var ver = body.getComponentVersion('{' + components[i] + '}', 'componentid');
        var name = names[i];
        if (ver) {
          plugins[name] = ver;
        }
      }
      return plugins;
    },

  // get list of plugins
    _getPlugins: function () {
      var pluginArray = [];
      var name;
      var flash;
      var plugins = this._getPluginData();

    // Except IE browser supports navigator.plugins
    // go through each plugin and check to see if it exists
      for (name in plugins) {
        if (this._detectPlugin(plugins[name])) {
          pluginArray.push(name);
        }
      }

    // check for flash
      flash = this._getFlashVersion();
      if (flash) {
        pluginArray.push(flash);
      }

      if (pluginArray.length === 0 && (navigator.appName === 'Microsoft Internet Explorer')) {
        plugins = this._getPluginDataIE();

        for (name in plugins) {
          pluginArray.push(name);
        }
      }

    // return a comma delimited string of plugin names
      return pluginArray.join(',');
    },

  // detect plugin by mime type
    _detectPlugin: function (type) {
      var mimeTypes = navigator.mimeTypes;
      var plugin;
      if (mimeTypes && mimeTypes.length) {
        plugin = mimeTypes[type];
        return (plugin && plugin.enabledPlugin);
      }
    },

  // gets the value to send for the last form that was focused on
    _getLastFormFocusedValue: function () {
      var value = '';
      if (this._lastFormFocused) {
        value = this._lastFormFocused.getAttribute('name') || this._lastFormFocused.getAttribute('id') || '';
      }
      return value;
    },

  // gets the value to send for the last form that was focused on
    _getLastInputFocusedValue: function () {
      var value = '';
      if (this._lastInputFocused) {
        value = this._lastInputFocused.getAttribute('name') || this._lastInputFocused.getAttribute('id') || '';
      }
      return value;
    },

  // gets elements fom various styles of argument input (css string, elements array, element)
    _getElements: function (arg) {
      var elements = [];
      var i;
    // get elements to be tracked from options
      if (arg) {
      // if they gave us a string we will search the dom
        if (typeof arg === 'string') {
          elements = this.utils.getElements(arg);
        }

      // if they gave us an array of elements just copy over the items that actually are elements
        else if (typeof arg === 'object') {
          for (i in arg) {
            if (arg.hasOwnProperty(i) && arg[i].nodeType === 1) {
              elements.push(arg[i]);
            }
          }
        }
      // if they gave us one element then push it to the elements array
        else if (arg.nodeType === 1) {
          elements.push(arg);
        }
      }
      return elements;
    },

  // clicks the given element and changes page if it's a link
    _click: function (element) {
      if (element.getAttribute('href')) {
        window.location.href = element.getAttribute('href');
      }
    },

  // sets options
    setOptions: function (options) {
      this.options = this._mergeOptions(this.options, options);
    },

  // sets custom request data
    setRequestData: function (key, value) {
      if (typeof key === 'object') {
        var i;
      // user is setting multiple key/value pairs
        for (i in key) {
          this.options.request.data[i] = key[i];
        }
      }
      else if (typeof key === 'string' && value === undefined) {
      // user is setting key/value pairs using a query string
        this.setRequestData(this.utils.queryStringToObject(key));
      }
      else if (typeof key === 'string' && value !== undefined) {
      // user is only setting one key/value pair
        this.options.request.data[key] = value;
      }
      window.fpti = this.options.request.data;
    },

  // gets custom request data
    getRequestData: function (key) {
      var data = window.fpti;
      if (key) {
        data = data[key];
      }
      return data;
    },

  // removes custom request data by key
    removeRequestData: function (key) {
    // if a key is provided, remove just that piece of data, otherwise remove it all
      var data = window.fpti;
      if (data[key]) {
        delete data[key];
      }
      else if (!key) {
        data = {};
      }
    },

  // sets browser lock/delay to defeat race condition
    setUnloadDelay: function (delay) {
      this._delayUnloadUntil = this._getTimestamp() + delay;
    },

  // record impression event
    recordImpression: function (options) {
    // get keys from options
      var eventData = {};
      var optKeys; // caching options keys
      var screenDimensions;
      var browserDimensions;

      options = options || {};

      if (options.data) {
        window.fpti = this.utils.queryStringToObject(options.data);
      }
      else {
        options.data = {};
      }

    // set pglk if we have something stored in the tcs cookie, then remove the cookie
      var pglk = this.utils.getCookie('tcs');
      this.utils.removeCookie('tcs');
      if (pglk) {
        options.data.pglk = decodeURIComponent(pglk);
      }

    // Submit Akamai cookies to track the data center
      var akdc = this.utils.getCookie('AKDC');
      if (akdc) {
        options.data.akdc = decodeURIComponent(akdc);
      }

      options = this._mergeOptions(this.options.impression.request, options);
      optKeys = options.keys;

    // page title
      eventData[optKeys.pageTitle] = this._getPageTitle();

    // referrer url
      eventData[optKeys.referrer] = this._getReferrer();

    // screen color depth
      eventData[optKeys.screenColorDepth] = this._getScreenColorDepth();

    // screen dimensions
      screenDimensions = this._getScreenDimensions();
      eventData[optKeys.screenWidth] = screenDimensions.width;
      eventData[optKeys.screenHeight] = screenDimensions.height;

    // browser dimensions
      browserDimensions = this._getBrowserDimensions();
      eventData[optKeys.browserWidth] = browserDimensions.width;
      eventData[optKeys.browserHeight] = browserDimensions.height;

    // cookies enabled
      eventData[optKeys.cookiesEnabled] = this._getCookiesEnabled(options);

    // plugins
      if (PAYPAL.analytics.settings !== 'mo') {
        eventData[optKeys.plugins] = this._getPlugins();
      }

      this._recordEvent(eventData, options);
    },

  // record click event
    recordClick: function (options) {
      options = this._mergeOptions(this.options.click.request, options);
      if (options.data) {
        window.fpti = this._mergeOptions(window.fpti, options.data);
      }
      else {
        options.data = {};
      }
      this._recordEvent({}, options);
    },

  // record form abandonment event
    recordFormAbandonment: function (options) {
    // get keys from options
      var eventData = {};
      var optKeys;

      options = this._mergeOptions(this.options.formAbandonment.request, options);
      if (options.data) {
        window.fpti = this._mergeOptions(window.fpti, options.data);
      }
      else {
        options.data = {};
      }
      optKeys = options.keys;

    // last form focused
      eventData[optKeys.lastFormFocused] = this._getLastFormFocusedValue();

    // last input focused
      eventData[optKeys.lastInputFocused] = this._getLastInputFocusedValue();

      this._recordEvent(eventData, options);
    },
  // sets up form focus tracking
    trackFormFocus: function (elements) {
      var element;
      var i;
      var recordFocus;
      var self = this;

    // get elements from options
      elements = this._getElements(elements);

      recordFocus = function (ev) {
        var target = ev.currentTarget || ev.srcElement;
        var dataText = self.utils.getTargetAttr(target, 'data-pa-focus');
        var value = ev.target.value ? ev.target.value : self.utils.getTargetAttr(target);
        var data = { // page name/page group will be taken from window.fpti
          uicomp: dataText,
          uitype: 'form',
          action: 'focus',
          value: value
        };
        PAYPAL.analytics.logActivity(data);
      };

      for (i = 0; i < elements.length; i++) {
        element = elements[i];
        this.utils.removeListener(element, 'focus', recordFocus);
        this.utils.addListener(element, 'focus', recordFocus);
      }
    },

  // sets up click tracking
    trackClicks: function (options) {
      var elements;
      var element;
      var i;
      var recordClick;
      var self = this;
    // merge the click options
      options = this._mergeOptions(this.options.click, options);

    // merge the request options
      options = this._mergeOptions({
        request: this.options.request
      }, options);

    // get elements from options
      elements = this._getElements(options.elements);

    // attach click events to elements
      recordClick = function (ev) {
        var target = ev.currentTarget || ev.srcElement;
        var clickOptions;

        if (typeof options.onClick === 'function') {
          clickOptions = options.onClick(ev);
        }
      // if the onClick returned false then we need to NOT track the click event
        if (clickOptions !== false) {
        // if the onClick returns an object we need to treat it as the request options to be used for that click track event
          if (typeof clickOptions === 'object') {
            options.request = self._mergeOptions(options.request, clickOptions);
            options.request.data = self._mergeOptions(options.request.data, window.fpti);
            if (options.request.data.link) { // let's preserve link value from the internal options since it's not being set by user
              options.request.data.link = clickOptions.data.link;
            }
          }
        // get link url
          options.request.data[options.request.keys.linkUrl] = target.getAttribute('href') || '';

          self.recordClick(options.request);
        }
      };
      for (i = 0; i < elements.length; i++) {
        element = elements[i];
        this.utils.removeListener(element, 'click', recordClick);
        this.utils.addListener(element, 'click', recordClick);
      }
    },

  // track form abandonment
    trackFormAbandonment: function (options) {
      var elements = [];
      var self = this;
      var i; // used in the for loop
      var elementsLength;

    // merge the form abandonment options
      options = this._mergeOptions(this.options.formAbandonment, options);

    // merge the request options
      options = this._mergeOptions({
        request: this.options.request
      }, options);

    // get elements from options
      elements = this._getElements(options.elements);
      elementsLength = elements.length;
    // get all inputs within these elements
      for (i = 0; i < elementsLength; i++) {
        var element = elements[i];
      // get all form elements individually so we can loop through and have a reference to the parent form of any given input
        var forms = (element.tagName.toLowerCase() === 'form') ? [element] : this.utils.getElements('form', element);

        for (var j = 0; j < forms.length; j++) {
          var form = forms[j];
        // attach focus events to all inputs within this form to capture last form/input focused
          var inputs = this.utils.getElements('input', form);
          var inputsLength = inputs.length;
          for (var k = 0; k < inputsLength; k++) {
            var input = inputs[k];

          // use closure to maintain proper references of each iteration of input/form
            (function (form, input) {
              self.utils.addListener(input, 'focus', function (ev) {
                self._lastFormFocused = form;
                self._lastInputFocused = input;

              // attach unload function to window if it hasn't been done yet
                if (!self._trackingFormAbandonment) {
                  self._trackingFormAbandonment = true;

                // record form abandonment onbeforeunload, hashchange
                  ('beforeunload,hashchange'.split(',')).forEach(function (v) {
                    self.utils.addListener(window, v, function (ev) {
                    // record form abandonment only if there's an incomplete form
                      if (self._lastFormFocused !== null && self._lastInputFocused !== null) {
                        self.recordFormAbandonment(options.request);
                      // once 'fa' has been recorded reset to the default state
                        self._lastFormFocused = null;
                        self._lastInputFocused = null;
                      }
                    });
                  });

                // remove from abandonment event listener on submit of form, because they are not abandonoing the form
                  self.utils.addListener(form, 'submit', function (ev) {
                  // set last form/input to null to indicate form completion
                    self._lastFormFocused = null;
                    self._lastInputFocused = null;
                  });
                }
              });
            })(form, input);
          }
        }
      }
    },

  // The method returns client's system time as a timestamp, performance api is used to get the time when it's available
    getTimeNow: function () {
      if (wp && wp.now && wp.timing) {
        return Math.round(wp.now() + wp.timing.navigationStart);
      }
      return this._getTimestamp();
    },

  // Record Ajax Start Time
    recordAjaxStartTime: function () {
      this.activityStartTime = this.getTimeNow();
    },

  // log activity data
    logActivity: function (data) {
      data.page = data.page || window.fpti.page;
      data.pgrp = data.pgrp || window.fpti.pgrp;
      if (wpr && data.trackCPL && typeof PAYPAL.analytics.captureResourceTiming === 'function') {
        if (data.res) {
          data.res = this._mergeOptions(data.res, PAYPAL.analytics.captureResourceTiming());
        }
        else {
          data.res = PAYPAL.analytics.captureResourceTiming();
        }
      }
      data.view = JSON.stringify(data.view);
      data.res = JSON.stringify(data.res);
      data.logActivity = true;
      this._createBeacon(data);
    },

  // Record Ajax End Time
    recordAjaxPerformanceData: function (data) {
      var activityEndTime = this.getTimeNow();
      var tt = activityEndTime - this.activityStartTime;
      PAYPAL.analytics.setup({
        data: data.sys.tracking.fpti.dataString += '&tajst=' + this.activityStartTime + '&tajnd=' + activityEndTime + '&t1=' + 0 + '&t1c=' + 0 + '&t1d=' + 0 + '&t1s=' + 0 + '&t2=' + 0 + '&t3=' + 0 + '&t4=' + 0 + '&t4d=' + 0 + '&t4e=' + 0 + '&tt=' + tt
      });
    },

  // record arbitrary event
    record: function (options) {
      options = this._mergeOptions(this.options.request, options);

    // create request
      this._request(options);
    }
  };

// utils
  PAYPAL.analytics.Analytics.prototype.utils = {

  // deep clones an object
    clone: function (obj) {
    // return if it is not an object
      if (!obj || obj.constructor !== Object) {
        return obj;
      }

    // TODO: not real clone, has prototype issues

    // clone object
      var clone = obj.constructor();
      var key = null;

    // deep clone
      for (key in obj) {
        clone[key] = this.clone(obj[key]);
      }

      return clone;
    },

  // object merge (recursive merge and does not changed original objects)
    merge: function (obj1, obj2) {
    // make sure we have some objects
      obj1 = obj1 || {};
      obj2 = obj2 || {};

    // clone the objects so we don't affect the originals
      var clone1 = this.clone(obj1);
      var clone2 = this.clone(obj2);
      var p = null;

    // merge the objects recursively
      for (p in clone2) {
        try {
          if (clone2[p].constructor === Object) {
            clone1[p] = this.merge(clone1[p], clone2[p]);
          }
          else {
            clone1[p] = clone2[p];
          }
        }
        catch (e) {
          clone1[p] = clone2[p];
        }
      }
    // return our merged object
      return clone1;
    },

  // converts query string to object
    queryStringToObject: function (string) {
      if (typeof string === 'object') {
        return string;
      }
      var obj = {};
      var parts;
      var pairs = string.split('&');
      for (var i = 0; i < pairs.length; i++) {
        parts = pairs[i].split('=');
        obj[parts[0]] = decodeURIComponent(parts[1]);
      }
      return obj;
    },

  // selector engine - TODO refactor asap
    getElements: function (selector, parent) {
      var elements = [];
      var length;
      var obj;
      var style;
      var nodes; // to store the list of child nodes
      var node; // single node

    // set parent to document if not passed
      parent = parent || document;

    // if the browser does not support querySelectorAll we need to do it ourselves
      if (parent.querySelectorAll) {
        obj = parent.querySelectorAll(selector);

      // convert object/function to array of elements
        if ((typeof obj === 'object' || typeof obj === 'function') && typeof obj.length === 'number') {
          for (var i = 0; i < obj.length; i++) {
            elements.push(obj[i]);
          }
        }
        else if (typeof obj === 'object') {
          elements = obj;
        }
      }
      else if (document.createStyleSheet) {
        if (document.styleSheets.length) { // IE requires you check against the length as it bugs out otherwise
          style = document.styleSheets[0];
        }
        else {
          style = document.createStyleSheet();
        }

      // split selector on comma because IE7 doesn't support comma delimited selectors
        var selectors = selector.split(/\s*,\s*/);
        var indexes = [];
        var index;
        for (i = 0; i < selectors.length; i++) {
        // create custom (random) style rule and add it to elements
          index = style.rules.length;
          indexes.push(index);
          style.addRule(selectors[i], 'aybabtu:pa', index);
        }

      // get all child nodes (document object has bugs with childNodes)
        if (parent === document) {
          nodes = parent.all;
        }
        else {
          nodes = parent.childNodes;
        }

      // cycle through all elements until we find the ones with our custom style rule
        for (i = 0, length = nodes.length; i < length; i++) {
          node = nodes[i];
          if (node.nodeType === 1 && node.currentStyle.aybabtu === 'pa') {
            elements.push(node);
          }
        }

      // remove the custom style rules we added (go backwards through loop)
        for (i = indexes.length - 1; i >= 0; i--) {
          style.removeRule(indexes[i]);
        }
      }
      return elements;
    },

  // cross browser add event listener
    addListener: function (element, event, callback) {
      if (element.addEventListener) {
        element.addEventListener(event, callback, false);
      }
      else if (element.attachEvent) {
        return element.attachEvent('on' + event, callback);
      }
    },

  // cross browser remove event listener
  // TODO: test this function, it has not been tested yet
    removeListener: function (event, element, callback) {
      if (element.removeEventListener) {
        element.removeEventListener(event, callback, false);
      }
      else if (element.detachEvent) {
        return element.detachEvent('on' + event, callback);
      }
    },

  // sets cookie key/value pair
    setCookie: function (key, value, options) {
      var date, expires;
      options = options || {};

    // convert expiration from days to ms
      if (options.expires) {
        date = new Date();
        date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toGMTString();
      }
      else {
        expires = '';
      }

    // set the cookie
      document.cookie = key + '=' + value + expires + '; path=/';
    },

  // gets cookie value from given key
    getCookie: function (key) {
    // break cookie string into key/value segments and check for the given key
      var segments = document.cookie.split(';');
      for (var i = 0; i < segments.length; i++) {
        var segment = segments[i];

      // trim leading white space
        while (segment.charAt(0) === ' ') {
          segment = segment.substring(1, segment.length);
        }

      // check to see if this segment has they key they asked for at the beginning
        if (segment.indexOf(key + '=') === 0) {
          return segment.substring((key + '=').length, segment.length);
        }
      }

    // return null if key was not found
      return null;
    },

  // removes a cookie key/value pair
    removeCookie: function (key) {
      this.setCookie(key, '', {
        expires: -1
      });
    },

  // get text content of the element
    getFirstText: function (element) {
      var nodes = element.childNodes;
      var node = null;
      for (var i = 0; i < nodes.length; i++) {
        node = nodes[i];
        if (node.nodeType === 3 && node.nodeValue && node.nodeValue.match(/\S/)) {
          return node.nodeValue.trim();
        }
        else if (node.nodeType === 1 && node.childNodes.length) {
          return this.getFirstText(node);
        }
      }
    },

  // gets primaryAttrName (which is data-pa-click) value if it doesn't exist
  // then take the value of one of the following (which ever first occurs)
  // tag's content, value of name, id, class, href, alt
    getTargetAttr: function (target, primaryAttrName) {
      var attr;
      if (primaryAttrName) {
        attr = target.getAttribute(primaryAttrName);
      }
      if (!attr) {
        attr = target.getAttribute('id') || target.getAttribute('name') || target.getAttribute('class') || target.getAttribute('href') || target.getAttribute('alt') || this.getFirstText(target);
      }
      return attr;
    },

  // sets default options
    setDefaultsOptions: function (options, defaults) {
      for (var key in options) {
      // skip loop if the property is from prototype
        if (!options.hasOwnProperty(key)) continue;
        defaults[key] = options[key];
      }
      return defaults;
    },

  // wraps query selectors by element e.g. #main a, #main div
    wrapSelectors: function (selectors, wrapper) {
      var result = '';
      if (typeof selectors === 'string' && typeof wrapper === 'string') {
        selectors = selectors.split(',');
        for (var i = 0; i < selectors.length; i++) {
          if (i !== selectors.length - 1) { // if not last
            result += wrapper.trim() + ' ' + selectors[i].trim() + ', ';
          }
          else {
            result += wrapper.trim() + ' ' + selectors[i].trim();
          }
        }
      }
      else {
        result = selectors;
      }
      return result;
    },

    checkPayloadSize: function (url) {
      url = (typeof url === 'string') ? url : '';
      var MAXSIZE = 6144; // 6kb max payload size otherwise Akamai blocks it
      var payloadSize = url.length;
      var findCplPayload = /&res=(%7B.*%7D)/i;
      var res = url.match(findCplPayload);
      if (payloadSize > MAXSIZE) {
      // add 'plsize' indicating the payload exceeded the max length
        url = PAYPAL.analytics.Analytics.prototype._appendQueryStringData(url, 'plsize', payloadSize);
      // if res exists delete xhr property to reduce payload size
        if (res) { // extracts the 'res' and deletes 'xhr' data
          url = url.replace(findCplPayload, '');
          res = JSON.parse(decodeURIComponent(res[1]));
          delete res.xhr;
          url = PAYPAL.analytics.Analytics.prototype._appendQueryStringData(url, 'res', JSON.stringify(res)); // add back without xhr
        }
      }
      else { //
        if (res) {
          url = url.replace(findCplPayload, ''); // delete current res payload
          res = JSON.parse(decodeURIComponent(res[1])); // delete xhr property
          delete res.sxhr;
          url = PAYPAL.analytics.Analytics.prototype._appendQueryStringData(url, 'res', JSON.stringify(res)); // add back without xhr
        }
      }
      return url;
    }
  };

// shortcut/wrapping functions
  PAYPAL.analytics.logPerformance = function (data) {
    data.e = 'pf';
    PAYPAL.analytics.Analytics.prototype.logActivity(data);
  };

  PAYPAL.analytics.logActivity = function (data) {
    data.e = 'ac';
    PAYPAL.analytics.Analytics.prototype.logActivity(data);
  };

// PAYPAL sugar layer
// Adding the delay of 500 msec,
// so that this Analytics JS is not blocking the execution of other important scripts in the page.
  PAYPAL.analytics.setup = function (options) {
    PAYPAL.analytics.setupComplete = PAYPAL.analytics.setupComplete || noop;
    PAYPAL.analytics.settings = 'pp';
    setTimeout(function () {
      PAYPAL.analytics.setupComplete(PAYPAL.analytics.setup.init(options));
    }, 500);
  };

// Optimized Setup method for third party with limited auto logging features
  PAYPAL.analytics.setup3p = function (options) {
  // for 3party PP specific features are disabled
    options = PAYPAL.analytics.Analytics.prototype.utils.setDefaultsOptions(options || {}, {
      trackPPLegacyClicks: false, // *[class*="scTrack"]
      trackPPLegacyExitClicks: false // *[class*="scExit"]

    });
    PAYPAL.analytics.settings = '3p';
    PAYPAL.analytics.setupComplete = PAYPAL.analytics.setupComplete || noop;
    setTimeout(function () {
      PAYPAL.analytics.setupComplete(PAYPAL.analytics.setup.init(options));
    }, 500);
  };

// Optimized Setup method for mobile with limited auto logging features
  PAYPAL.analytics.setupMobile = function (options) {
  // for mobile some features are disabled
    options = PAYPAL.analytics.Analytics.prototype.utils.setDefaultsOptions(options || {}, {
      trackPPLegacyClicks: false, // *[class*="scTrack"]
      trackPPLegacyExitClicks: false, // *[class*="scExit"]
      trackPPDownloadClicks: false, // no download tracking
      trackPPClickThrough: false, // no click-through tracking
      trackFormAbandonment: false // no form abandoment tracking
    });
    PAYPAL.analytics.settings = 'mo';
    PAYPAL.analytics.setupComplete = PAYPAL.analytics.setupComplete || noop;
    setTimeout(function () {
      PAYPAL.analytics.setupComplete(PAYPAL.analytics.setup.init(options));
    }, 500);
  };

  PAYPAL.analytics.reSetup = function (options) {
  // delete previous analytics instance
    delete PAYPAL.analytics.instance;
  // reuse previously provided options and override with newly provided only
    options = PAYPAL.analytics.Analytics.prototype.utils.setDefaultsOptions(options || {}, PAYPAL.analytics.options);
    setTimeout(function () {
      PAYPAL.analytics.setup.init(options);
    }, 500);
  };

  PAYPAL.analytics.setup.init = function (options) {
    var paUtils = PAYPAL.analytics.Analytics.prototype.utils;

  // Default options, all features are enabled
    options = paUtils.setDefaultsOptions(options || {}, {
      trackImpression: true,
      trackPPClicks: true, // *[data-pa-click]
      trackPPExitClicks: true, // *[data-pa-exit]
      trackPPDownloadClicks: true, // *[data-pa-download]
      trackPPLegacyClicks: true, // *[class*="scTrack"]
      trackPPLegacyExitClicks: true, // *[class*="scExit"]
      trackPPClickThrough: true, // a, input[type=submit]
      trackFormAbandonment: true,
      trackCPL: false,
      trackFormFocus: false
    });

  // override server url if specified in options
    PAYPAL.analytics.Analytics.prototype.options.request.url = window.fptiserverurl = options.url || window.fptiserverurl;

  // cache options provided initially
    PAYPAL.analytics.options = options;

  // unload delay
    var unloadDelay = 500;

  // create analytics object with request options
    var analytics = new PAYPAL.analytics.Analytics({
      request: {
        data: options.data || {},
        keys: {
          version: 'v',
          timestamp: 't',
          gmtOffset: 'g',
          eventType: 'e'
        },
        values: {
          eventType: 'na',
          'true': 1,
          'false': 0
        },
        keyPrefix: '', // no prefix
        url: window.fptiserverurl,
        onBeaconCreate: noop,
        onBeaconDestroy: noop
      }
    });

  // Assign data string as an object to fpti global variable if provided
    if (options.data) {
      window.fpti = paUtils.queryStringToObject(options.data);
    }

    if (options.trackImpression) {
    // record impression
      if (document.readyState === 'complete') {
        analytics.recordImpression();
      }
      else {
        paUtils.addListener(window, 'load', function () {
          analytics.recordImpression();
        });
      }
    }

  // Fetch pglk and pgln
    function getPageLinkData (linkName) {
      var link = linkName || '';
      var pgrp = analytics.getRequestData('pgrp') || '';
      var page = analytics.getRequestData('page') || '';
      return {
        pglk: pgrp + '|' + link,
        pgln: page + '|' + link
      };
    }

    if (typeof options.customClicks === 'object') {
    // setup custom click tracking
      analytics.trackClicks({
        elements: options.customClicks.elements,
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target);
          var pldata = getPageLinkData(link);

        // return request options for this click event
          return {
            data: {
              link: options.customClicks.linkName ? options.customClicks.linkName : link,
              exit: options.customClicks.exitClick ? 1 : 0,
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackPPClicks) {
    // setup click tracking
      analytics.trackClicks({
        elements: '*[data-pa-click]',
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target, 'data-pa-click');
          var pldata = getPageLinkData(link);

        // return request options for this click event
          return {
            data: {
              link: link,
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackPPExitClicks) {
    // setup exit click tracking
      analytics.trackClicks({
        elements: '*[data-pa-exit]',
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target, 'data-pa-exit');
          var pldata = getPageLinkData(link);

        // return request options for this click event
          return {
            data: {
              link: link,
              exit: analytics.options.request.values['true'],
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackFormFocus) {
    // setup exit click tracking
      analytics.trackFormFocus('*[data-pa-focus], ' + paUtils.wrapSelectors('textarea, input[type=text]', options.wrappingElement));
    }

    if (options.trackPPDownloadClicks) {
    // setup download click tracking
      analytics.trackClicks({
        elements: '*[data-pa-download], ' + paUtils.wrapSelectors('*[href*=".zip"], *[href*=".wav"], *[href*=".mov"], *[href*=".mpg"], *[href*=".avi"], *[href*=".wmv"], *[href*=".doc"], *[href*=".docx"], *[href*=".pdf"], *[href*=".xls"], *[href*=".xlsx"], *[href*=".ppt"], *[href*=".pptx"], *[href*=".txt"], *[href*=".csv"], *[href*=".psd"], *[href*=".tar"]', options.wrappingElement),
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target, 'data-pa-download');
          var pldata = getPageLinkData(link);

        // return request options for this click event
          return {
            data: {
              link: link,
              dwnl: analytics.options.request.values['true'],
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackPPLegacyClicks) {
    // setup legacy click tracking
      analytics.trackClicks({
        elements: '*[class*="scTrack"]',
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target);
          var pldata = getPageLinkData(link);
        // go through classes and find the link value
          var classes = target.className.split(' ');

          for (var i = 0; i < classes.length; i++) {
            var parts = classes[i].split(':');
            if (parts[0] === 'scTrack' && parts.length > 1) {
              parts.shift();
              link = parts.join(':');
            }
          }

        // return request options for this click event
          return {
            data: {
              link: link,
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackPPLegacyExitClicks) {
    // setup legacy exit click tracking
      analytics.trackClicks({
        elements: '*[class*="scExit"]',
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = paUtils.getTargetAttr(target);
          var pldata = getPageLinkData(link);
        // go through classes and find the link value
          var classes = target.className.split(' ');
          for (var i = 0; i < classes.length; i++) {
            var parts = classes[i].split(':');
            if (parts[0] === 'scExit' && parts.length > 1) {
              parts.shift();
              link = parts.join(':');
            }
          }

        // return request options for this click event
          return {
            data: {
              link: link,
              exit: analytics.options.request.values['true'],
              pglk: pldata.pglk,
              pgln: pldata.pgln
            }
          };
        },
        request: {
          unloadDelay: unloadDelay,
          keys: {
            linkUrl: 'lu'
          },
          values: {
            eventType: 'cl'
          }
        }
      });
    }

    if (options.trackPPClickThrough) {
    // setup click-through tracking
      analytics.trackClicks({
        elements: paUtils.wrapSelectors('a, button, input[type=submit], input[type=button], input[type=image]', options.wrappingElement),
        onClick: function (ev) {
          var target = ev.currentTarget || ev.srcElement;
          var link = target.getAttribute('data-pa-click') || target.getAttribute('data-pa-exit') || target.getAttribute('data-pa-download');

        // try to get the link name from legacy attributes if we don't have one
          if (!link) {
          // go through classes and find the link value
            var classes = target.className.split(' ');
            for (var i = 0; i < classes.length; i++) {
              var parts = classes[i].split(':');
              if ((parts[0] === 'scTrack' || parts[0] === 'scExit') && parts.length > 1) {
                parts.shift();
                link = parts.join(':');
              }
            }
          }

        // default to name/id/text if we still don't have a link value
          if (!link) {
            link = paUtils.getTargetAttr(target);
          }
          var pgrp = analytics.getRequestData('pgrp') || '';
        // create pglk value
          var pglk = encodeURIComponent(pgrp + '|' + link);
        // store cookie data for next page
          paUtils.setCookie('tcs', pglk);
        // return false so the link doesnt record a click event
          return false;
        }
      });
    }

    if (options.trackFormAbandonment) {
    // setup form abandonment
      analytics.trackFormAbandonment({
        elements: paUtils.wrapSelectors('form', options.wrappingElement),
        request: {
          unloadDelay: unloadDelay,
          keys: {
            lastFormFocused: 'lf',
            lastInputFocused: 'li'
          },
          values: {
            eventType: 'fa'
          }
        }
      });
    }
  // return analytics object
    return (PAYPAL.analytics.instance = analytics);
  };

  var PERF_CPL_KEYNAME = 'perf_cpl_fpti';

/**
 * Save the specified CPL data to be used across page loads.
 * @param data JSON object to save
 */
  PAYPAL.analytics.saveSessionData = function (key, data) {
    if (sStorage) {
      try {
      // Expects JSON object.  No point stringify unless session storage is available
        sStorage.setItem(key, JSON.stringify(data));
      }
      catch (error) {
      // Ignore the exception.  Safari in private mode will throw exception.
      }
    }
  };

/**
 * Removes previously saved CPL Session data
 * Ignore any exception thrown during removal.
 */
  PAYPAL.analytics.removeSessionData = function (key) {
    if (sStorage) {
      try {
        sStorage.removeItem(key);
      }
      catch (error) {
      // Ignore the exception.  Safari in private mode will throw exception.
      }
    }
  };

/**
 * Retrieve previously stored session data.
 * Returns null if session storage not available OR exception thrown when retrieving the data.
 */
  PAYPAL.analytics.getSessionData = function (key) {
    if (sStorage) {
      try {
        var raw = sStorage.getItem(key);
        return raw ? JSON.parse(raw) : null;
      }
      catch (error) {
      // Ignore the exception.  Safari in private mode will throw exception.
        return null;
      }
    }
  };

/**
 * There are two use cases for auto start CPL tracking
 * Case 1: User navigates from non-PayPal page
 * In this case no performance data is available in the Browser session storage.
 *
 * Case 2: User navigates from a PayPal page
 * In this case performance data from the origin page will be available in session storage and must be merged with
 * the performance data gathered on current page.
 *
 */
  PAYPAL.analytics.autoStartCPLTracking = function () {
  // Check session storage
    var resumedCPLData = PAYPAL.analytics.getSessionData(PERF_CPL_KEYNAME);
    if (!resumedCPLData) {
      resumedCPLData = {};
      resumedCPLData.res = {};
      resumedCPLData.t10 = wp.timing.requestStart;
    }
    PAYPAL.analytics.removeSessionData(PERF_CPL_KEYNAME);
    PAYPAL.analytics.startCPLTrackingInternal(resumedCPLData);
  };

/**
 * Aggregate summarized performance data for an element in the resource data for CPL.
 *
 * @param {to} destination resource element
 * @param {from} source resource element
 */
  PAYPAL.analytics.aggregateSummaryPerfData = function (to, from) {
    if (typeof from === 'undefined') {
      return;
    }

    to.t9 += from.t9;
    if (from.t12 > to.t12) {
      to.t12 = from.t12;
    }
    to.t13 += from.t13;
    to.cnt += from.cnt;
  };

/**
 * Aggregate performance data from 'from' to 'to'.
 * Aggregation is performed in the following manner:
 *
 * 1. Summarized data, such as css, img, jpg, othr
 *    values of t9, t12, t13, cnt for an entry in 'from' is added to corresponding entry in 'to'
 * 2. xhr data
 *    xhr data is non summarized.  xhr array from 'from' is prepended to the xhr array in 'to'
 *
 * @param {to} destination resource data
 * @param {from} source resource data
 */
  PAYPAL.analytics.aggregateResumedPerfData = function (to, from) {
    if (typeof from === 'undefined') {
      return;
    }

    if (typeof to === 'undefined') {
      to = from;
      return;
    }

    if (typeof to.css === 'undefined') {
      to.css = from.css;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.css, from.css);
    }

    if (typeof to.link === 'undefined') {
      to.link = from.link;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.link, from.link);
    }

    if (typeof to.script === 'undefined') {
      to.script = from.script;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.script, from.script);
    }

    if (typeof to.img === 'undefined') {
      to.img = from.img;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.img, from.img);
    }

    if (typeof to.scr === 'undefined') {
      to.scr = from.scr;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.scr, from.scr);
    }

    if (typeof to.othr === 'undefined') {
      to.othr = from.othr;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.othr, from.othr);
    }

    if (typeof to.sxhr === 'undefined') {
      to.sxhr = from.sxhr;
    }
    else {
      PAYPAL.analytics.aggregateSummaryPerfData(to.sxhr, from.sxhr);
    }

    if (from.xhr) {
      if (typeof to.xhr === 'undefined') {
        to.xhr = from.xhr.slice(0);
      }
      else {
        to.xhr = from.xhr.concat(to.xhr);
      }
    }
  };

/**
 * Adds custom values to the CPL data.
 * Custom data can be addeed at the View level (e.g., pgrp, page) as well as for an individual resource
 *
 * data data parameter is an array and must use the following syntax:
 *  [
 *   {
 *      "resourceName": "r1",
 *      "values": [{key : "k1", value: "r1"}, {key: "k2", value: "r2"}]
 *    },
 *    {
 *      "resourceName": "r2",
 *      "values": [{key: "k1", value: "r1"}]
 *    }
 *  ]
 * Note: If "resourceName" is "pgrp" then the associated values are set at the page group level.
 * @param data
 */
  PAYPAL.analytics.setCPLDataInternal = function (data) {
    data = data || {};

    if (!PAYPAL.analytics.cpl || !PAYPAL.analytics.cpl.started) {
      throw new Error('Have you called PAYPAL.analytics.startCPLTracking()?');
    }

    if (Array.isArray(data)) {
      data.forEach(function (entry) {
        if (entry.resourceName === 'pgrp') {
        // Apply all key, values at the page
          if (Array.isArray(entry.values)) {
            entry.values.forEach(function (e) {
              if (e.key && e.value) {
                PAYPAL.analytics.cpl.cplData.pgrpData[e.key] = e.value;
              }
            });
          }
        }
        else {
          var resource = PAYPAL.analytics.cpl.cplData.resourceData[entry.resourceName];
          if (!resource) {
            resource = {};
            PAYPAL.analytics.cpl.cplData.resourceData[entry.resourceName] = resource;
          }

          if (Array.isArray(entry.values)) {
            entry.values.forEach(function (e) {
              if (e.key && e.value) {
                resource[e.key] = e.value;
              }
            });
          }
        }
      });
    }
  };

/**
 * Returns short name for an xhr resource name
 * @param endpoint resource name
 * @returns {*} short name of resource
 */
  PAYPAL.analytics.getXhrName = function (endpoint) {
    var parser = document.createElement('a');
    parser.href = endpoint;
  // remove extra slashes from the end
    parser.noSlashPath = parser.pathname.replace(/\/*$/, '');
    parser.pathArr = parser.noSlashPath.split('/');
  // for non paypal.com domain
    if (parser.hostname.indexOf('paypal.com') === -1) {
      if (!parser.pathArr.join('').length) { // when path is empty return just domain
        return parser.hostname;
      }
      return parser.hostname + '/.../' + parser.pathArr.pop();
    }
  // for paypal.com domain
    if (!parser.pathArr.join('').length) {
      return '/';
    }
    return parser.pathArr.slice(-2).join('/');
  };

  PAYPAL.analytics.roundPerfTimers = function (num) {
    if (typeof num !== 'undefined') {
      return num === parseInt(num, 10) ? num : parseFloat(num.toFixed(1).replace(/\.?0+$/, ''));
    }
    else {
      return -1;
    }
  };

/**
 * Generates the resource timing data.
 * @param options
 * @returns the resource timing
 */
  PAYPAL.analytics.captureResourceTiming = function (options) {
    var result = {
      css: { t9: 0, t12: 0, t13: 0, cnt: 0 }, // t9 is duration, t12 is max duration, t13 redirect time, cnt is counter
      scr: { t9: 0, t12: 0, t13: 0, cnt: 0 },
      img: { t9: 0, t12: 0, t13: 0, cnt: 0 },
      othr: { t9: 0, t12: 0, t13: 0, cnt: 0 },
      sxhr: { t9: 0, t12: 0, t13: 0, cnt: 0 },
      xhr: []
    };
    options = options || {};
    var currentEntries = !options.startIndex || options.startIndex === 0 ? wp.getEntries() : wp.getEntries().slice(options.startIndex - 1);
    currentEntries.forEach(function (v, i) {
      if (v.initiatorType === 'link') { // if css
        result.css.t9 += v.duration;
        if (v.redirectStart > 0) {
          result.css.t13 += v.redirectEnd - v.redirectStart;
        }
        if (v.duration > result.css.t12) {
          result.css.t12 = v.duration;
        }
        result.css.cnt++;
      }
      else if (v.initiatorType === 'script') { // if external scripts
        result.scr.t9 += v.duration;
        if (v.redirectStart > 0) {
          result.scr.t13 += v.redirectEnd - v.redirectStart;
        }
        if (v.duration > result.scr.t12) {
          result.scr.t12 = v.duration;
        }
        result.scr.cnt++;
      }
      else if (v.initiatorType === 'img') { // if external images
        result.img.t9 += v.duration;
        if (v.redirectStart > 0) {
          result.img.t13 += v.redirectEnd - v.redirectStart;
        }
        if (v.duration > result.img.t12) {
          result.img.t12 = v.duration;
        }
        result.img.cnt++;
      }
      else if (!v.initiatorType || v.initiatorType === 'other') { // if other resources
        result.othr.t9 += v.duration;
        if (v.redirectStart > 0) {
          result.othr.t13 += v.redirectEnd - v.redirectStart;
        }
        if (v.duration > result.othr.t12) {
          result.othr.t12 = v.duration;
        }
        result.othr.cnt++;
      }
      else if (v.initiatorType === 'xmlhttprequest') { // if XHR calls
      // XHR metrics summary
        result.sxhr.t9 += v.duration;
        if (v.redirectStart > 0) {
          result.sxhr.t13 += v.redirectEnd - v.redirectStart;
        }
        if (v.duration > result.sxhr.t12) {
          result.sxhr.t12 = v.duration;
        }
        result.sxhr.cnt++;
      // extended XHR metrics logging
        result.xhr.push({
        // name will be converted to short name after resource specific attributes, if any, are
        //  added.
          nm: options.returnLongName ? v.name : PAYPAL.analytics.getXhrName(v.name),
          t4: PAYPAL.analytics.roundPerfTimers(v.connectStart),
          t5: PAYPAL.analytics.roundPerfTimers(v.secureConnectionStart),
          t6: PAYPAL.analytics.roundPerfTimers(v.connectEnd),
          t7: PAYPAL.analytics.roundPerfTimers(v.domainLookupStart),
          t8: PAYPAL.analytics.roundPerfTimers(v.domainLookupEnd),
          t9: PAYPAL.analytics.roundPerfTimers(v.duration),
          ta: PAYPAL.analytics.roundPerfTimers(v.fetchStart),
          tb: PAYPAL.analytics.roundPerfTimers(v.redirectStart),
          tc: PAYPAL.analytics.roundPerfTimers(v.redirectEnd),
          td: PAYPAL.analytics.roundPerfTimers(v.requestStart),
          te: PAYPAL.analytics.roundPerfTimers(v.responseStart),
          tf: PAYPAL.analytics.roundPerfTimers(v.responseEnd),
          t10: PAYPAL.analytics.roundPerfTimers(v.startTime)
        });
      }
    });
    for (var v in result) { // delete empty resources data and round timers value;
      if (v !== 'xhr') { // round all metrics summary timing values except extended XHR logs (they already rounded)
        for (var nonXhr in result[v]) {
          result[v][nonXhr] = PAYPAL.analytics.roundPerfTimers(result[v][nonXhr]);
        }
        if (!result[v].cnt) {
          delete result[v];
        }
      }
      else { // for xhr check the lengths of the array
        if (!result[v].length) {
          delete result[v];
        }
      }
    }
    return result;
  };

  PAYPAL.analytics.setCPLData = function () {
    if (wpr) {
      if (!PAYPAL.analytics.cpl || !PAYPAL.analytics.cpl.started) {
        throw new Error('Have you called PAYPAL.analytics.startCPLTracking()?');
      }

      if (arguments.length === 2) {
      // page group level key, value specified.  No need to save in session storage.  Just setin the
        PAYPAL.analytics.cpl.cplData.pgrpData[arguments[0]] = arguments[1];
      }
      else if (arguments.length === 3) {
      // resource name, key name, value
      // save the tuple in the session storage
        var resource = PAYPAL.analytics.cpl.cplData.resourceData[arguments[0]];
        if (resource) {
          resource[arguments[1]] = arguments[2];
        }
        else {
          resource = {};
          resource[arguments[1]] = arguments[2];
          PAYPAL.analytics.cpl.cplData.resourceData[arguments[0]] = resource;
        }
      }
      else if (arguments.length === 1) {
      // map object specified
      // map is used exclusively to set additional data for resources
        PAYPAL.analytics.setCPLDataInternal(arguments[0]);
      }
      else {
        throw new Error('Invalid argument');
      }
    }
  };

/**
 * Implicit startCPLTracking.
 * start resource index is set to 0
 * @param data
 */
  PAYPAL.analytics.startCPLTrackingInternal = function (data) {
    if (wpr) {
      data = data || {};
      PAYPAL.analytics.cpl = {};
      PAYPAL.analytics.cpl.started = true;
      PAYPAL.analytics.cpl.beaconData = {};
      if (data.flid) {
        PAYPAL.analytics.cpl.beaconData.flid = data.flid;
      }
      PAYPAL.analytics.cpl.beaconData.page = data.page || window.fpti.page;
      PAYPAL.analytics.cpl.beaconData.pgrp = data.pgrp || window.fpti.pgrp;
      PAYPAL.analytics.cpl.beaconData.view = {t10: PAYPAL.analytics.roundPerfTimers(data.t10)};

    // store starting index for resources for which load times will be
    // measured for this view change
    // Multiple start will reset the starting index
      PAYPAL.analytics.cpl.cplData = {
        resourceStartIndex: 0,
        pgrpData: {},
        resourceData: {},
        resumedResData: data.res
      };
    }
  };

/**
 * Saves the current state of the startCPLTracking data in session storage.   This function should be used to
 * track CPL data across browser reloads, for e.g., for multi page applications.  The endCPLTracking is called
 * by the new page.  The CPL data will be aggregated with the saved CPL data in the session storage.
 * @param data
 */
  PAYPAL.analytics.resumeCPLTracking = function () {
    if (wpr) {
    // create the resume CPL data
      var data = {};

      data.flid = PAYPAL.analytics.cpl.beaconData.flid;
      data.page = PAYPAL.analytics.cpl.beaconData.page;
      data.pgrp = PAYPAL.analytics.cpl.beaconData.pgrp;
      data.t10 = data.flid = PAYPAL.analytics.cpl.beaconData.view.t10;
      data.res = PAYPAL.analytics.buildResourcePerfData();

    // Clear the current CPL data
      PAYPAL.analytics.cpl = {};

    // Set the resumed data in session storage
      PAYPAL.analytics.saveSessionData(PERF_CPL_KEYNAME, data);
    }
  };

  PAYPAL.analytics.startCPLTracking = function (data) {
    if (wpr) {
    // Remove session storage
      PAYPAL.analytics.removeSessionData(PERF_CPL_KEYNAME);
      data = data || {};
      PAYPAL.analytics.cpl = {};
      PAYPAL.analytics.cpl.started = true;
      PAYPAL.analytics.cpl.beaconData = {};
      if (data.flid) {
        PAYPAL.analytics.cpl.beaconData.flid = data.flid;
      }
      PAYPAL.analytics.cpl.beaconData.page = data.page || window.fpti.page;
      PAYPAL.analytics.cpl.beaconData.pgrp = data.pgrp || window.fpti.pgrp;
      PAYPAL.analytics.cpl.beaconData.view = {t10: PAYPAL.analytics.roundPerfTimers(wp.now())};

    // store starting index for resources for which load times will be
    // measured for this view change
    // Multiple start will reset the starting index
      PAYPAL.analytics.cpl.cplData = {
        resourceStartIndex: wp.getEntries().length,
        pgrpData: {},
        resourceData: {},
        resumedResData: {}
      };
    }
  };

  PAYPAL.analytics.buildResourcePerfData = function () {
    var res = PAYPAL.analytics.captureResourceTiming({startIndex: PAYPAL.analytics.cpl.cplData.resourceStartIndex, returnLongName: true});

  // Add any additional pgrp data
    for (var key in PAYPAL.analytics.cpl.cplData.pgrpData) {
      if (PAYPAL.analytics.cpl.cplData.pgrpData.hasOwnProperty(key)) {
        PAYPAL.analytics.cpl.beaconData[key] = PAYPAL.analytics.cpl.cplData.pgrpData[key];
      }
    }

  // Add additional resource data
    if (Array.isArray(res.xhr)) {
      for (var resName in PAYPAL.analytics.cpl.cplData.resourceData) {
        if (PAYPAL.analytics.cpl.cplData.resourceData.hasOwnProperty(resName)) {
          res.xhr.forEach(function (xhr) {
            if (xhr.nm.match(resName)) {
              var vals = PAYPAL.analytics.cpl.cplData.resourceData[resName];
              for (var k in vals) {
                if (vals.hasOwnProperty(k)) {
                  xhr[k] = vals[k];
                }
              }
            }
          });
        }
      }
    }

  // Convert xhr long names to short names.
    if (Array.isArray(res.xhr)) {
      res.xhr.forEach(function (xhr) {
        xhr.nm = PAYPAL.analytics.getXhrName(xhr.nm);
      });
    }

    return res;
  };

/**
 * Complete a previously started CPL tracking sequence.  endCPLTracking must be called after a startCPLTracking function
 * has been called.  Unless inferStart parameter is true.
 * If inferStart is true then the endCPLTracking will automatically call startCPLTracking as described below:
 * 1. If CPL data is available in session storage then combine this with the current performance data available in
 *    the browser.
 * 2. If no CPL data is available in session storage then the startCPLTracking is called with start time set to
 *    requestStart.
 * In both of the above cases the starting index for resource timing is set to 0.  i.e., timing for all resources
 * loaded upto the time endCPLTracking is called will b eput in the beacon.
 * inferStart true will also overwrite any cpl data
 *
 * @param {options.pageData} parameter specifying page level data e.g. page,pgrp etc
 * @param {options.cplData} parameter specifying optional data to be added to the beacon
 * @param {options.inferStart} specifies if startCPLTracking should be inferred.  Default is false.
 */
  PAYPAL.analytics.endCPLTracking = function (options) {
    if (wpr) {
    // Check if startCPLTracking should be inferred
    //  Can only "infer" is no explicit startCPLTracking was called.
      if (typeof options === 'object' && options.inferStart) {
      // automatically call startCPLTracking.
        PAYPAL.analytics.autoStartCPLTracking();
      }

      PAYPAL.analytics.removeSessionData(PERF_CPL_KEYNAME);

      if (!PAYPAL.analytics.cpl || !PAYPAL.analytics.cpl.started) {
        throw new Error('Have you called PAYPAL.analytics.startCPLTracking()?');
      }

    // Apply cpl data if present
      if (typeof options === 'object' && options.cplData) {
        PAYPAL.analytics.setCPLDataInternal(options.cplData);
      }

    // Apply page level data if present
      if (typeof options === 'object' && options.pageData) {
      // leveraging built in pa.js merging functionality
        PAYPAL.analytics.Analytics.prototype.utils.setDefaultsOptions(options.pageData, PAYPAL.analytics.cpl.beaconData);
      }

      PAYPAL.analytics.cpl.beaconData.view.t11 = PAYPAL.analytics.roundPerfTimers(wp.now());
      PAYPAL.analytics.cpl.beaconData.res = PAYPAL.analytics.buildResourcePerfData();

    // Aggregate any data from previous resumeCPL
      PAYPAL.analytics.aggregateResumedPerfData(PAYPAL.analytics.cpl.beaconData.res, PAYPAL.analytics.cpl.cplData.resumedResData);

      PAYPAL.analytics.cpl.beaconData.view = JSON.stringify(PAYPAL.analytics.cpl.beaconData.view);
      PAYPAL.analytics.cpl.beaconData.res = JSON.stringify(PAYPAL.analytics.cpl.beaconData.res);

      PAYPAL.analytics.Analytics.prototype.recordImpression({data: PAYPAL.analytics.cpl.beaconData});
      PAYPAL.analytics.cpl.started = false; // clearing the cpl data, so start method should be called again
    }
  };
}());