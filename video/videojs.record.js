/**
 * videojs-record
 * @version 2.1.3
 * @see https://github.com/collab-project/videojs-record
 * @copyright 2014-2018 Collab
 * @license MIT
 */
(function(f){if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f()}else if(typeof define==="function"&&define.amd){define([],f)}else{var g;if(typeof window!=="undefined"){g=window}else if(typeof global!=="undefined"){g=global}else if(typeof self!=="undefined"){g=self}else{g=this}(g.videojs || (g.videojs = {})).record = f()}})(function(){var define,module,exports;return (function(){function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s}return e})()({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file animation-display.js
 * @since 2.0.0
 */

var Component = videojs.getComponent('Component');

/**
 * Image for displaying animated GIF image.
 *
 * @class
 * @augments videojs.Component
*/

var AnimationDisplay = function (_Component) {
  _inherits(AnimationDisplay, _Component);

  function AnimationDisplay() {
    _classCallCheck(this, AnimationDisplay);

    return _possibleConstructorReturn(this, (AnimationDisplay.__proto__ || Object.getPrototypeOf(AnimationDisplay)).apply(this, arguments));
  }

  _createClass(AnimationDisplay, [{
    key: 'createEl',


    /**
     * Create the `AnimationDisplay`s DOM element.
     *
     * @return {Element}
     *         The dom element that gets created.
     */
    value: function createEl() {
      return _get(AnimationDisplay.prototype.__proto__ || Object.getPrototypeOf(AnimationDisplay.prototype), 'createEl', this).call(this, 'div', {
        className: 'vjs-animation-display',
        innerHTML: '<img />'
      });
    }
  }]);

  return AnimationDisplay;
}(Component);

Component.registerComponent('AnimationDisplay', AnimationDisplay);

exports.default = AnimationDisplay;
},{}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file camera-button.js
 * @since 2.0.0
 */

var Button = videojs.getComponent('Button');
var Component = videojs.getComponent('Component');

/**
 * Button to toggle between create and retry snapshot image.
 *
 * @class
 * @augments videojs.Button
*/

var CameraButton = function (_Button) {
    _inherits(CameraButton, _Button);

    function CameraButton() {
        _classCallCheck(this, CameraButton);

        return _possibleConstructorReturn(this, (CameraButton.__proto__ || Object.getPrototypeOf(CameraButton)).apply(this, arguments));
    }

    _createClass(CameraButton, [{
        key: 'buildCSSClass',

        /**
         * Builds the default DOM `className`.
         *
         * @return {string}
         *         The DOM `className` for this object.
         */
        value: function buildCSSClass() {
            return 'vjs-camera-button vjs-control vjs-button vjs-icon-photo-camera';
        }

        /**
         * Enable the `CameraButton` element so that it can be activated or clicked.
         */

    }, {
        key: 'enable',
        value: function enable() {
            _get(CameraButton.prototype.__proto__ || Object.getPrototypeOf(CameraButton.prototype), 'enable', this).call(this);

            this.on(this.player_, 'startRecord', this.onStart);
            this.on(this.player_, 'stopRecord', this.onStop);
        }

        /**
         * Disable the `CameraButton` element so that it cannot be activated or clicked.
         */

    }, {
        key: 'disable',
        value: function disable() {
            _get(CameraButton.prototype.__proto__ || Object.getPrototypeOf(CameraButton.prototype), 'disable', this).call(this);

            this.off(this.player_, 'startRecord', this.onStart);
            this.off(this.player_, 'stopRecord', this.onStop);
        }

        /**
         * This gets called when the button is clicked.
         *
         * @param {EventTarget~Event} event
         *        The `tap` or `click` event that caused this function to be
         *        called.
         *
         * @listens tap
         * @listens click
         */

    }, {
        key: 'handleClick',
        value: function handleClick(event) {
            var recorder = this.player_.record();

            if (!recorder.isProcessing()) {
                // create snapshot
                recorder.start();
            } else {
                // retry
                recorder.retrySnapshot();

                // reset camera button
                this.onStop();
            }
        }

        /**
         * Add the vjs-icon-replay class to the element so it can change appearance.
         *
         * @param {EventTarget~Event} [event]
         *        The event that caused this function to run.
         *
         * @listens Player#startRecord
         */

    }, {
        key: 'onStart',
        value: function onStart(event) {
            // replace element class so it can change appearance
            this.removeClass('vjs-icon-photo-camera');
            this.addClass('vjs-icon-replay');

            // change the button text
            this.controlText('Retry');
        }

        /**
         * Add the vjs-icon-photo-camera class to the element so it can change appearance.
         *
         * @param {EventTarget~Event} [event]
         *        The event that caused this function to run.
         *
         * @listens Player#stopRecord
         */

    }, {
        key: 'onStop',
        value: function onStop(event) {
            // replace element class so it can change appearance
            this.removeClass('vjs-icon-replay');
            this.addClass('vjs-icon-photo-camera');

            // change the button text
            this.controlText('Image');
        }
    }]);

    return CameraButton;
}(Button);

/**
 * The text that should display over the `CameraButton`s controls. Added for localization.
 *
 * @type {string}
 * @private
 */


CameraButton.prototype.controlText_ = 'Image';

Component.registerComponent('CameraButton', CameraButton);

exports.default = CameraButton;
},{}],3:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file device-button.js
 * @since 2.0.0
 */

var Button = videojs.getComponent('Button');
var Component = videojs.getComponent('Component');

/**
 * Button to select recording device.
 *
 * @class
 * @augments videojs.Button
*/

var DeviceButton = function (_Button) {
  _inherits(DeviceButton, _Button);

  function DeviceButton() {
    _classCallCheck(this, DeviceButton);

    return _possibleConstructorReturn(this, (DeviceButton.__proto__ || Object.getPrototypeOf(DeviceButton)).apply(this, arguments));
  }

  _createClass(DeviceButton, [{
    key: 'handleClick',

    /**
     * This gets called when this button gets:
     *
     * - Clicked (via the `click` event, listening starts in the constructor)
     * - Tapped (via the `tap` event, listening starts in the constructor)
     *
     * @param {EventTarget~Event} event
     *        The `keydown`, `tap`, or `click` event that caused this function to be
     *        called.
     *
     * @listens tap
     * @listens click
     */
    value: function handleClick(event) {
      // open device dialog
      this.player_.record().getDevice();
    }
  }]);

  return DeviceButton;
}(Button);

/**
 * The text that should display over the `DeviceButton`s controls. Added for localization.
 *
 * @type {string}
 * @private
 */


DeviceButton.prototype.controlText_ = 'Device';

Component.registerComponent('DeviceButton', DeviceButton);

exports.default = DeviceButton;
},{}],4:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file record-canvas
 * @since 2.0.0
 */

var Component = videojs.getComponent('Component');

/**
 * Canvas for displaying snapshot image.
 *
 * @class
 * @augments videojs.Component
*/

var RecordCanvas = function (_Component) {
  _inherits(RecordCanvas, _Component);

  function RecordCanvas() {
    _classCallCheck(this, RecordCanvas);

    return _possibleConstructorReturn(this, (RecordCanvas.__proto__ || Object.getPrototypeOf(RecordCanvas)).apply(this, arguments));
  }

  _createClass(RecordCanvas, [{
    key: 'createEl',


    /**
     * Create the `RecordCanvas`s DOM element.
     *
     * @return {Element}
     *         The dom element that gets created.
     */
    value: function createEl() {
      return _get(RecordCanvas.prototype.__proto__ || Object.getPrototypeOf(RecordCanvas.prototype), 'createEl', this).call(this, 'div', {
        className: 'vjs-record-canvas',
        innerHTML: '<canvas></canvas>'
      });
    }
  }]);

  return RecordCanvas;
}(Component);

Component.registerComponent('RecordCanvas', RecordCanvas);

exports.default = RecordCanvas;
},{}],5:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file record-indicator.js
 * @since 2.0.0
 */

var Component = videojs.getComponent('Component');

/**
 * Icon indicating recording is active.
 *
 * @class
 * @augments videojs.Component
*/

var RecordIndicator = function (_Component) {
    _inherits(RecordIndicator, _Component);

    /**
     * The constructor function for the class.
     *
     * @private
     * @param {(videojs.Player|Object)} player - Video.js player instance.
     * @param {Object} options - Player options.
     */
    function RecordIndicator(player, options) {
        _classCallCheck(this, RecordIndicator);

        var _this = _possibleConstructorReturn(this, (RecordIndicator.__proto__ || Object.getPrototypeOf(RecordIndicator)).call(this, player, options));

        _this.enable();
        return _this;
    }

    /**
     * Create the `RecordIndicator`s DOM element.
     *
     * @return {Element}
     *         The dom element that gets created.
     */


    _createClass(RecordIndicator, [{
        key: 'createEl',
        value: function createEl() {
            return _get(RecordIndicator.prototype.__proto__ || Object.getPrototypeOf(RecordIndicator.prototype), 'createEl', this).call(this, 'div', {
                className: 'vjs-record-indicator vjs-control',
                dir: 'ltr'
            });
        }

        /**
         * Enable event handlers.
         */

    }, {
        key: 'enable',
        value: function enable() {
            this.on(this.player_, 'startRecord', this.show);
            this.on(this.player_, 'stopRecord', this.hide);
        }

        /**
         * Disable event handlers.
         */

    }, {
        key: 'disable',
        value: function disable() {
            this.off(this.player_, 'startRecord', this.show);
            this.off(this.player_, 'stopRecord', this.hide);
        }
    }]);

    return RecordIndicator;
}(Component);

Component.registerComponent('RecordIndicator', RecordIndicator);

exports.default = RecordIndicator;
},{}],6:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file record-toggle.js
 * @since 2.0.0
 */

var Button = videojs.getComponent('Button');
var Component = videojs.getComponent('Component');

/**
 * Button to toggle between start and stop recording.
 *
 * @class
 * @augments videojs.Button
*/

var RecordToggle = function (_Button) {
    _inherits(RecordToggle, _Button);

    function RecordToggle() {
        _classCallCheck(this, RecordToggle);

        return _possibleConstructorReturn(this, (RecordToggle.__proto__ || Object.getPrototypeOf(RecordToggle)).apply(this, arguments));
    }

    _createClass(RecordToggle, [{
        key: 'buildCSSClass',

        /**
         * Builds the default DOM `className`.
         *
         * @return {string}
         *         The DOM `className` for this object.
         */
        value: function buildCSSClass() {
            return 'vjs-record-button vjs-control vjs-button vjs-icon-record-start';
        }

        /**
         * Enable the `RecordToggle` element so that it can be activated or clicked.
         */

    }, {
        key: 'enable',
        value: function enable() {
            _get(RecordToggle.prototype.__proto__ || Object.getPrototypeOf(RecordToggle.prototype), 'enable', this).call(this);

            this.on(this.player_, 'startRecord', this.onStart);
            this.on(this.player_, 'stopRecord', this.onStop);
        }

        /**
         * Disable the `RecordToggle` element so that it cannot be activated or clicked.
         */

    }, {
        key: 'disable',
        value: function disable() {
            _get(RecordToggle.prototype.__proto__ || Object.getPrototypeOf(RecordToggle.prototype), 'disable', this).call(this);

            this.off(this.player_, 'startRecord', this.onStart);
            this.off(this.player_, 'stopRecord', this.onStop);
        }

        /**
         * This gets called when the button is clicked.
         *
         * @param {EventTarget~Event} event
         *        The `tap` or `click` event that caused this function to be
         *        called.
         *
         * @listens tap
         * @listens click
         */

    }, {
        key: 'handleClick',
        value: function handleClick(event) {
            var recorder = this.player_.record();
            if (!recorder.isRecording()) {
                recorder.start();
            } else {
                recorder.stop();
            }
        }

        /**
         * Add the vjs-icon-record-stop class to the element so it can change appearance.
         *
         * @param {EventTarget~Event} [event]
         *        The event that caused this function to run.
         *
         * @listens Player#startRecord
         */

    }, {
        key: 'onStart',
        value: function onStart(event) {
            // replace element class so it can change appearance
            this.removeClass('vjs-icon-record-start');
            this.addClass('vjs-icon-record-stop');

            // change the button text
            this.controlText('Stop');
        }

        /**
         * Add the vjs-icon-record-start class to the element so it can change appearance.
         *
         * @param {EventTarget~Event} [event]
         *        The event that caused this function to run.
         *
         * @listens Player#stopRecord
         */

    }, {
        key: 'onStop',
        value: function onStop(event) {
            // replace element class so it can change appearance
            this.removeClass('vjs-icon-record-stop');
            this.addClass('vjs-icon-record-start');

            // change the button text
            this.controlText('Record');
        }
    }]);

    return RecordToggle;
}(Button);

/**
 * The text that should display over the `RecordToggle`s controls. Added for localization.
 *
 * @type {string}
 * @private
 */


RecordToggle.prototype.controlText_ = 'Record';

Component.registerComponent('RecordToggle', RecordToggle);

exports.default = RecordToggle;
},{}],7:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
/**
 * @file defaults.js
 * @since 2.0.0
 */

//plugin defaults
var pluginDefaultOptions = {
    // Single snapshot image.
    image: false,
    // Include audio in the recorded clip.
    audio: false,
    // Include video in the recorded clip.
    video: false,
    // Animated GIF.
    animation: false,
    // Maximum length of the recorded clip.
    maxLength: 10,
    // Width of the recorded video frames.
    frameWidth: 320,
    // Height of the recorded video frames.
    frameHeight: 240,
    // Enables console logging for debugging purposes.
    debug: false,
    // The mime type for the video recorder. Default to 'video/webm'.
    // Use 'video/mp4' (Firefox) or 'video/webm;codecs=H264' (Chrome 52 and
    // newer) for MP4.
    videoMimeType: 'video/webm',
    // Video recorder type to use. This allows you to specify an alternative
    // recorder class, e.g. WhammyRecorder. Defaults to 'auto' which let's
    // recordrtc specify the best available recorder type.
    videoRecorderType: 'auto',
    // Audio recording library to use. Legal values are 'recordrtc',
    // 'libvorbis.js', 'opus-recorder', 'lamejs' and 'recorder.js'.
    audioEngine: 'recordrtc',
    // Audio recorder type to use. This allows you to specify an alternative
    // recorder class, e.g. StereoAudioRecorder. Defaults to 'auto' which let's
    // recordrtc specify the best available recorder type. Currently this
    // setting is only used with the 'recordrtc' audioEngine.
    audioRecorderType: 'auto',
    // The mime type for the audio recorder. Defaults to 'auto' which will pick
    // the best option available in the browser (e.g. either 'audio/wav',
    // 'audio/ogg' or 'audio/webm').
    audioMimeType: 'auto',
    // The size of the audio buffer (in sample-frames) which needs to
    // be processed each time onprocessaudio is called.
    // From the spec: This value controls how frequently the audioprocess event is
    // dispatched and how many sample-frames need to be processed each call.
    // Lower values for buffer size will result in a lower (better) latency.
    // Higher values will be necessary to avoid audio breakup and glitches.
    // Legal values are 256, 512, 1024, 2048, 4096, 8192 or 16384.
    audioBufferSize: 4096,
    // The audio sample rate (in sample-frames per second) at which the
    // AudioContext handles audio. It is assumed that all AudioNodes
    // in the context run at this rate. In making this assumption,
    // sample-rate converters or "varispeed" processors are not supported
    // in real-time processing.
    // The sampleRate parameter describes the sample-rate of the
    // linear PCM audio data in the buffer in sample-frames per second.
    // An implementation must support sample-rates in at least
    // the range 22050 to 96000.
    audioSampleRate: 44100,
    // The audio bitrate in kbps (only used in lamejs plugin).
    audioBitRate: 128,
    // Allows you to record single-channel audio, which can reduce the
    // filesize.
    audioChannels: 2,
    // URL for the audio worker.
    audioWorkerURL: '',
    // Frame rate in frames per second.
    animationFrameRate: 200,
    // Sets quality of color quantization (conversion of images to the
    // maximum 256 colors allowed by the GIF specification).
    // Lower values (minimum = 1) produce better colors,
    // but slow processing significantly. 10 is the default,
    // and produces good color mapping at reasonable speeds.
    // Values greater than 20 do not yield significant improvements
    // in speed.
    animationQuality: 10,
    // Accepts numbers in milliseconds; use this to force intervals-based blobs.
    timeSlice: 0
};

exports.default = pluginDefaultOptions;
},{}],8:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * @file record-engine.js
 * @since 2.0.0
 */

var Component = videojs.getComponent('Component');

// supported recorder plugin engines
var RECORDRTC = 'recordrtc';
var LIBVORBISJS = 'libvorbis.js';
var RECORDERJS = 'recorder.js';
var LAMEJS = 'lamejs';
var OPUSRECORDER = 'opus-recorder';

/**
 * Base class for recorder backends.
 * @class
 * @augments videojs.Component
 */

var RecordEngine = function (_Component) {
    _inherits(RecordEngine, _Component);

    /**
     * Creates an instance of this class.
     *
     * @param  {Player} player
     *         The `Player` that this class should be attached to.
     *
     * @param  {Object} [options]
     *         The key/value store of player options.
     */
    function RecordEngine(player, options) {
        _classCallCheck(this, RecordEngine);

        // auto mixin the evented mixin (required since video.js v6.6.0)
        options.evented = true;

        return _possibleConstructorReturn(this, (RecordEngine.__proto__ || Object.getPrototypeOf(RecordEngine)).call(this, player, options));
    }

    /**
     * Remove any temporary data and references to streams.
     * @private
     */


    _createClass(RecordEngine, [{
        key: 'dispose',
        value: function dispose() {
            // dispose previous recording
            if (this.recordedData !== undefined) {
                URL.revokeObjectURL(this.recordedData);
            }
        }

        /**
         * Add filename and timestamp to recorded file object.
         *
         * @param {(blob|file)} fileObj - Blob or File object.
         */

    }, {
        key: 'addFileInfo',
        value: function addFileInfo(fileObj) {
            if (fileObj instanceof Blob || fileObj instanceof File) {
                // set modification date
                var now = new Date();
                try {
                    fileObj.lastModified = now.getTime();
                    fileObj.lastModifiedDate = now;
                } catch (e) {
                    if (e instanceof TypeError) {
                        // ignore: setting getter-only property "lastModifiedDate"
                    } else {
                        // re-raise error
                        throw e;
                    }
                }
                // guess extension name from mime type, e.g. audio/ogg, but
                // any extension is valid here. Chrome also accepts extended
                // mime types like video/webm;codecs=h264,vp9,opus
                var fileExtension = '.' + fileObj.type.split('/')[1];
                if (fileExtension.indexOf(';') > -1) {
                    fileExtension = fileExtension.split(';')[0];
                }

                // use timestamp in filename, e.g. 1451180941326.ogg
                try {
                    fileObj.name = now.getTime() + fileExtension;
                } catch (e) {
                    if (e instanceof TypeError) {
                        // ignore: setting getter-only property "name"
                    } else {
                        // re-raise error
                        throw e;
                    }
                }
            }
        }

        /**
         * Invoked when recording is stopped and resulting stream is available.
         *
         * @param {blob} data - Reference to the recorded Blob.
         */

    }, {
        key: 'onStopRecording',
        value: function onStopRecording(data) {
            this.recordedData = data;

            // add filename and timestamp to recorded file object
            this.addFileInfo(this.recordedData);

            // remove reference to recorded stream
            this.dispose();

            // notify listeners
            this.trigger('recordComplete');
        }

        /**
         * Show save as dialog in browser so the user can store the recorded media
         * locally.
         *
         * @param {object} name - Object with names for the particular blob(s)
         *     you want to save. File extensions are added automatically. For
         *     example: {'video': 'name-of-video-file'}. Supported keys are
         *     'audio', 'video' and 'gif'.
         */

    }, {
        key: 'saveAs',
        value: function saveAs(name) {
            var fileName = name[Object.keys(name)[0]];

            if (typeof navigator.msSaveOrOpenBlob !== 'undefined') {
                return navigator.msSaveOrOpenBlob(this.recordedData, fileName);
            } else if (typeof navigator.msSaveBlob !== 'undefined') {
                return navigator.msSaveBlob(this.recordedData, fileName);
            }

            var hyperlink = document.createElement('a');
            hyperlink.href = URL.createObjectURL(this.recordedData);
            hyperlink.download = fileName;

            hyperlink.style = 'display:none;opacity:0;color:transparent;';
            (document.body || document.documentElement).appendChild(hyperlink);

            if (typeof hyperlink.click === 'function') {
                hyperlink.click();
            } else {
                hyperlink.target = '_blank';
                hyperlink.dispatchEvent(new MouseEvent('click', {
                    view: window,
                    bubbles: true,
                    cancelable: true
                }));
            }

            URL.revokeObjectURL(hyperlink.href);
        }
    }]);

    return RecordEngine;
}(Component);

// expose component for external plugins


videojs.RecordEngine = RecordEngine;
Component.registerComponent('RecordEngine', RecordEngine);

exports.RecordEngine = RecordEngine;
exports.RECORDRTC = RECORDRTC;
exports.LIBVORBISJS = LIBVORBISJS;
exports.RECORDERJS = RECORDERJS;
exports.LAMEJS = LAMEJS;
exports.OPUSRECORDER = OPUSRECORDER;
},{}],9:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
/**
 * @file record-mode.js
 * @since 2.0.0
 */

// recorder modes
var IMAGE_ONLY = 'image_only';
var AUDIO_ONLY = 'audio_only';
var VIDEO_ONLY = 'video_only';
var AUDIO_VIDEO = 'audio_video';
var ANIMATION = 'animation';

var getRecorderMode = function getRecorderMode(image, audio, video, animation) {
    if (isModeEnabled(image)) {
        return IMAGE_ONLY;
    } else if (isModeEnabled(animation)) {
        return ANIMATION;
    } else if (isModeEnabled(audio) && !isModeEnabled(video)) {
        return AUDIO_ONLY;
    } else if (isModeEnabled(audio) && isModeEnabled(video)) {
        return AUDIO_VIDEO;
    } else if (!isModeEnabled(audio) && isModeEnabled(video)) {
        return VIDEO_ONLY;
    }
};

/**
 * Return boolean indicating whether mode is enabled or not.
 */
var isModeEnabled = function isModeEnabled(mode) {
    return mode === Object(mode) || mode === true;
};

exports.getRecorderMode = getRecorderMode;
exports.IMAGE_ONLY = IMAGE_ONLY;
exports.AUDIO_ONLY = AUDIO_ONLY;
exports.VIDEO_ONLY = VIDEO_ONLY;
exports.AUDIO_VIDEO = AUDIO_VIDEO;
exports.ANIMATION = ANIMATION;
},{}],10:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

var _recordEngine = require('./record-engine');

var _detectBrowser = require('../utils/detect-browser');

var _recordMode = require('./record-mode');

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @file record-rtc.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @since 2.0.0
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */

var Component = videojs.getComponent('Component');

/**
 * Engine used with the MRecordRTC class in the RecordRTC library.
 *
 * @class
 * @augments videojs.RecordEngine
 */

var RecordRTCEngine = function (_RecordEngine) {
    _inherits(RecordRTCEngine, _RecordEngine);

    function RecordRTCEngine() {
        _classCallCheck(this, RecordRTCEngine);

        return _possibleConstructorReturn(this, (RecordRTCEngine.__proto__ || Object.getPrototypeOf(RecordRTCEngine)).apply(this, arguments));
    }

    _createClass(RecordRTCEngine, [{
        key: 'setup',


        /**
         * Setup recording engine.
         */
        value: function setup(stream, mediaType, debug) {
            this.inputStream = stream;
            this.mediaType = mediaType;
            this.debug = debug;

            // setup RecordRTC
            this.engine = new RecordRTC.MRecordRTC();
            this.engine.mediaType = this.mediaType;
            this.engine.disableLogs = !this.debug;
            this.engine.mimeType = this.mimeType;

            // audio settings
            this.engine.bufferSize = this.bufferSize;
            this.engine.sampleRate = this.sampleRate;
            this.engine.numberOfAudioChannels = this.audioChannels;

            // video/canvas settings
            this.engine.video = this.video;
            this.engine.canvas = this.canvas;

            // animated gif settings
            this.engine.quality = this.quality;
            this.engine.frameRate = this.frameRate;
            if (this.onTimeStamp !== undefined) {
                this.engine.timeSlice = this.timeSlice;
                this.engine.onTimeStamp = this.onTimeStamp;
            }

            // connect stream to recording engine
            this.engine.addStream(this.inputStream);
        }

        /**
         * Remove any temporary data and references to streams.
         */

    }, {
        key: 'dispose',
        value: function dispose() {
            _get(RecordRTCEngine.prototype.__proto__ || Object.getPrototypeOf(RecordRTCEngine.prototype), 'dispose', this).call(this);

            if (typeof this.engine.destroy === 'function') {
                this.engine.destroy();
            }
        }

        /**
         * Start recording.
         */

    }, {
        key: 'start',
        value: function start() {
            this.engine.startRecording();
        }

        /**
         * Stop recording. Result will be available async when onStopRecording
         * is called.
         */

    }, {
        key: 'stop',
        value: function stop() {
            this.engine.stopRecording(this.onStopRecording.bind(this));
        }

        /**
         * Pause recording.
         */

    }, {
        key: 'pause',
        value: function pause() {
            this.engine.pauseRecording();
        }

        /**
         * Resume recording.
         */

    }, {
        key: 'resume',
        value: function resume() {
            this.engine.resumeRecording();
        }

        /**
         * Show save as dialog in browser so the user can store the recorded media
         * locally.
         *
         * @param {object} name - Object with names for the particular blob(s)
         *     you want to save. File extensions are added automatically. For
         *     example: {'video': 'name-of-video-file'}. Supported keys are
         *     'audio', 'video' and 'gif'.
         */

    }, {
        key: 'saveAs',
        value: function saveAs(name) {
            if (this.engine && name !== undefined) {
                this.engine.save(name);
            }
        }

        /**
         * Invoked when recording is stopped and resulting stream is available.
         *
         * @private
         * @param {string} audioVideoURL - Reference to the recorded Blob
         *     object, e.g. 'blob:http://localhost:8080/10100016-4248-9949-b0d6-0bb40db56eba'
         * @param {string} type - Media type, eg. 'video' or 'audio'.
         */

    }, {
        key: 'onStopRecording',
        value: function onStopRecording(audioVideoURL, type) {
            var _this2 = this;

            // store reference to recorded stream URL
            this.mediaURL = audioVideoURL;

            // store reference to recorded stream data
            var recordType = this.player().record().getRecordType();
            this.engine.getBlob(function (recording) {
                switch (recordType) {
                    case _recordMode.AUDIO_ONLY:
                        _this2.recordedData = recording.audio;

                        _this2.addFileInfo(_this2.recordedData);

                        // notify listeners
                        _this2.trigger('recordComplete');
                        break;

                    case _recordMode.VIDEO_ONLY:
                    case _recordMode.AUDIO_VIDEO:
                        // when recording both audio and video, recordrtc
                        // calls this twice on chrome, first with audio data
                        // and then with video data.
                        // on firefox it's called once but with a single
                        // blob that includes both audio and video data.
                        if (recording.video !== undefined) {
                            // data is video-only but on firefox audio+video
                            _this2.recordedData = recording.video;

                            // on the chrome browser two blobs are created
                            // containing the separate audio/video streams.
                            if (recordType === _recordMode.AUDIO_VIDEO && (0, _detectBrowser.isChrome)()) {
                                // store both audio and video
                                _this2.recordedData = recording;

                                for (var mtype in _this2.recordedData) {
                                    _this2.addFileInfo(_this2.recordedData[mtype]);
                                }
                            } else {
                                _this2.addFileInfo(_this2.recordedData);
                            }

                            // notify listeners
                            _this2.trigger('recordComplete');
                        }
                        break;

                    case _recordMode.ANIMATION:
                        _this2.recordedData = recording.gif;

                        _this2.addFileInfo(_this2.recordedData);

                        // notify listeners
                        _this2.trigger('recordComplete');
                        break;
                }
            });
        }
    }]);

    return RecordRTCEngine;
}(_recordEngine.RecordEngine);

// expose plugin


videojs.RecordRTCEngine = RecordRTCEngine;

Component.registerComponent('RecordRTCEngine', RecordRTCEngine);

exports.default = RecordRTCEngine;
},{"../utils/detect-browser":12,"./record-engine":8,"./record-mode":9}],11:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
/**
 * @file browser-shim.js
 * @since 2.0.0
 */

var setSrcObject = function setSrcObject(stream, element, ignoreCreateObjectURL) {
    if ('createObjectURL' in URL && !ignoreCreateObjectURL) {
        try {
            element.src = URL.createObjectURL(stream);
        } catch (e) {
            setSrcObject(stream, element, true);
            return;
        }
    } else if ('srcObject' in element) {
        element.srcObject = stream;
    } else if ('mozSrcObject' in element) {
        element.mozSrcObject = stream;
    } else {
        console.log('createObjectURL/srcObject both are not supported.');
    }
};

exports.default = setSrcObject;
},{}],12:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.isSafari = exports.isChrome = exports.isOpera = exports.isEdge = exports.detectBrowser = undefined;

var _window = require('global/window');

var _window2 = _interopRequireDefault(_window);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/**
 * Browser detector.
 *
 * @private
 * @return {object} result containing browser, version and minVersion
 *     properties.
 */
var detectBrowser = function detectBrowser() {
    // returned result object
    var result = {};
    result.browser = null;
    result.version = null;
    result.minVersion = null;

    // fail early if it's not a browser
    if (typeof _window2.default === 'undefined' || !_window2.default.navigator) {
        result.browser = 'Not a supported browser.';
        return result;
    }

    // Firefox
    if (navigator.mozGetUserMedia) {
        result.browser = 'firefox';
        result.version = extractVersion(navigator.userAgent, /Firefox\/(\d+)\./, 1);
        result.minVersion = 31;
    } else if (navigator.webkitGetUserMedia) {
        // Chrome, Chromium, Webview, Opera
        if (_window2.default.webkitRTCPeerConnection) {
            result.browser = 'chrome';
            result.version = extractVersion(navigator.userAgent, /Chrom(e|ium)\/(\d+)\./, 2);
            result.minVersion = 38;
        } else {
            // Safari (in an unpublished version) or unknown webkit-based.
            if (navigator.userAgent.match(/Version\/(\d+).(\d+)/)) {
                result.browser = 'safari';
                result.version = extractVersion(navigator.userAgent, /AppleWebKit\/(\d+)\./, 1);
                result.minVersion = 11;
            } else {
                // unknown webkit-based browser.
                result.browser = 'Unsupported webkit-based browser ' + 'with GUM support but no WebRTC support.';
                return result;
            }
        }
        // Edge
    } else if (navigator.mediaDevices && navigator.userAgent.match(/Edge\/(\d+).(\d+)$/)) {
        result.browser = 'edge';
        result.version = extractVersion(navigator.userAgent, /Edge\/(\d+).(\d+)$/, 2);
        result.minVersion = 10547;
    } else if (navigator.mediaDevices && navigator.userAgent.match(/AppleWebKit\/(\d+)\./)) {
        // Safari, with webkitGetUserMedia removed.
        result.browser = 'safari';
        result.version = extractVersion(navigator.userAgent, /AppleWebKit\/(\d+)\./, 1);
    } else {
        // default fallthrough: not supported.
        result.browser = 'Not a supported browser.';
        return result;
    }

    return result;
};

/**
 * Extract browser version out of the provided user agent string.
 *
 * @private
 * @param {!string} uastring - userAgent string.
 * @param {!string} expr - Regular expression used as match criteria.
 * @param {!number} pos - position in the version string to be
 *     returned.
 * @return {!number} browser version.
 */
/**
 * @file detect-browser.js
 * @since 2.0.0
 */

var extractVersion = function extractVersion(uastring, expr, pos) {
    var match = uastring.match(expr);
    return match && match.length >= pos && parseInt(match[pos], 10);
};

var isEdge = function isEdge() {
    return detectBrowser().browser === 'edge';
};

var isSafari = function isSafari() {
    return detectBrowser().browser === 'safari';
};

var isOpera = function isOpera() {
    return !!_window2.default.opera || navigator.userAgent.indexOf('OPR/') !== -1;
};

var isChrome = function isChrome() {
    return detectBrowser().browser === 'chrome';
};

exports.detectBrowser = detectBrowser;
exports.isEdge = isEdge;
exports.isOpera = isOpera;
exports.isChrome = isChrome;
exports.isSafari = isSafari;
},{"global/window":14}],13:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
/**
 * @file format-time.js
 * @since 2.0.0
 */

/**
 * Format seconds as a time string, H:MM:SS, M:SS or M:SS:MMM.
 *
 * Supplying a guide (in seconds) will force a number of leading zeros
 * to cover the length of the guide.
 *
 * @param {number} seconds - Number of seconds to be turned into a
 *     string.
 * @param {number} guide - Number (in seconds) to model the string
 *     after.
 * @param {number} msDisplayMax - Number (in milliseconds) to model the string
 *     after.
 * @return {string} Time formatted as H:MM:SS, M:SS or M:SS:MMM, e.g.
 *     0:00:12.
 * @private
 */
var formatTime = function formatTime(seconds, guide, msDisplayMax) {
    // Default to using seconds as guide
    seconds = seconds < 0 ? 0 : seconds;
    guide = guide || seconds;
    var s = Math.floor(seconds % 60),
        m = Math.floor(seconds / 60 % 60),
        h = Math.floor(seconds / 3600),
        gm = Math.floor(guide / 60 % 60),
        gh = Math.floor(guide / 3600),
        ms = Math.floor((seconds - s) * 1000);

    // handle invalid times
    if (isNaN(seconds) || seconds === Infinity) {
        // '-' is false for all relational operators (e.g. <, >=) so this
        // setting will add the minimum number of fields specified by the
        // guide
        h = m = s = ms = '-';
    }

    // Check if we need to show milliseconds
    if (guide > 0 && guide < msDisplayMax) {
        if (ms < 100) {
            if (ms < 10) {
                ms = '00' + ms;
            } else {
                ms = '0' + ms;
            }
        }
        ms = ':' + ms;
    } else {
        ms = '';
    }

    // Check if we need to show hours
    h = h > 0 || gh > 0 ? h + ':' : '';

    // If hours are showing, we may need to add a leading zero.
    // Always show at least one digit of minutes.
    m = ((h || gm >= 10) && m < 10 ? '0' + m : m) + ':';

    // Check if leading zero is need for seconds
    s = s < 10 ? '0' + s : s;

    return h + m + s + ms;
};

exports.default = formatTime;
},{}],14:[function(require,module,exports){
(function (global){
var win;

if (typeof window !== "undefined") {
    win = window;
} else if (typeof global !== "undefined") {
    win = global;
} else if (typeof self !== "undefined"){
    win = self;
} else {
    win = {};
}

module.exports = win;

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})

},{}],15:[function(require,module,exports){
(function (global){
'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

var _animationDisplay = require('./controls/animation-display');

var _animationDisplay2 = _interopRequireDefault(_animationDisplay);

var _recordCanvas = require('./controls/record-canvas');

var _recordCanvas2 = _interopRequireDefault(_recordCanvas);

var _deviceButton = require('./controls/device-button');

var _deviceButton2 = _interopRequireDefault(_deviceButton);

var _cameraButton = require('./controls/camera-button');

var _cameraButton2 = _interopRequireDefault(_cameraButton);

var _recordToggle = require('./controls/record-toggle');

var _recordToggle2 = _interopRequireDefault(_recordToggle);

var _recordIndicator = require('./controls/record-indicator');

var _recordIndicator2 = _interopRequireDefault(_recordIndicator);

var _defaults = require('./defaults');

var _defaults2 = _interopRequireDefault(_defaults);

var _formatTime = require('./utils/format-time');

var _formatTime2 = _interopRequireDefault(_formatTime);

var _browserShim = require('./utils/browser-shim');

var _browserShim2 = _interopRequireDefault(_browserShim);

var _detectBrowser = require('./utils/detect-browser');

var _recordRtc = require('./engine/record-rtc');

var _recordRtc2 = _interopRequireDefault(_recordRtc);

var _recordEngine = require('./engine/record-engine');

var _recordMode = require('./engine/record-mode');

var _video = (typeof window !== "undefined" ? window['videojs'] : typeof global !== "undefined" ? global['videojs'] : null);

var _video2 = _interopRequireDefault(_video);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; } /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * @file videojs.record.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                *
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * The main file for the videojs-record project.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                * MIT license: https://github.com/collab-project/videojs-record/blob/master/LICENSE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                */

var Plugin = _video2.default.getPlugin('plugin');
var Player = _video2.default.getComponent('Player');

var AUTO = 'auto';

// monkey-patch play (#152)
Player.prototype.play = function play() {
    var retval = this.techGet_('play');
    // silence errors (unhandled promise from play)
    if (retval !== undefined && typeof retval.then === 'function') {
        retval.then(null, function (e) {});
    }
    return retval;
};

/**
 * Record audio/video/images using the Video.js player.
 *
 * @class
 * @augments videojs.Plugin
 */

var Record = function (_Plugin) {
    _inherits(Record, _Plugin);

    /**
     * The constructor function for the class.
     *
     * @param {(videojs.Player|Object)} player
     * @param {Object} options - Player options.
     */
    function Record(player, options) {
        _classCallCheck(this, Record);

        // setup plugin options
        var _this = _possibleConstructorReturn(this, (Record.__proto__ || Object.getPrototypeOf(Record)).call(this, player, options));

        _this.loadOptions();

        // (re)set recorder state
        _this.resetState();

        // add device button with icon based on type
        var deviceIcon = 'av-perm';
        switch (_this.getRecordType()) {
            case _recordMode.IMAGE_ONLY:
            case _recordMode.VIDEO_ONLY:
            case _recordMode.ANIMATION:
                deviceIcon = 'video-perm';
                break;
            case _recordMode.AUDIO_ONLY:
                deviceIcon = 'audio-perm';
                break;
        }
        _deviceButton2.default.prototype.buildCSSClass = function () {
            // use dynamic icon class
            return 'vjs-device-button vjs-control vjs-icon-' + deviceIcon;
        };
        player.deviceButton = new _deviceButton2.default(player, options);
        player.addChild(player.deviceButton);

        // add blinking record indicator
        player.recordIndicator = new _recordIndicator2.default(player, options);
        player.recordIndicator.hide();
        player.addChild(player.recordIndicator);

        // add canvas for recording and displaying image
        player.recordCanvas = new _recordCanvas2.default(player, options);
        player.recordCanvas.hide();
        player.addChild(player.recordCanvas);

        // add image for animation display
        player.animationDisplay = new _animationDisplay2.default(player, options);
        player.animationDisplay.hide();
        player.addChild(player.animationDisplay);

        // add camera button
        player.cameraButton = new _cameraButton2.default(player, options);
        player.cameraButton.hide();

        // add record toggle
        player.recordToggle = new _recordToggle2.default(player, options);
        player.recordToggle.hide();

        // wait until player ui is ready
        _this.player.one('ready', _this.setupUI.bind(_this));
        return _this;
    }

    /**
     * Setup plugin options.
     */


    _createClass(Record, [{
        key: 'loadOptions',
        value: function loadOptions() {
            var recordOptions = _video2.default.mergeOptions(_defaults2.default, this.player.options_.plugins.record);

            // record settings
            this.recordImage = recordOptions.image;
            this.recordAudio = recordOptions.audio;
            this.recordVideo = recordOptions.video;
            this.recordAnimation = recordOptions.animation;
            this.maxLength = recordOptions.maxLength;
            this.debug = recordOptions.debug;
            this.recordTimeSlice = recordOptions.timeSlice;

            // video/canvas settings
            this.videoFrameWidth = recordOptions.frameWidth;
            this.videoFrameHeight = recordOptions.frameHeight;
            this.videoRecorderType = recordOptions.videoRecorderType;
            this.videoMimeType = recordOptions.videoMimeType;

            // audio settings
            this.audioEngine = recordOptions.audioEngine;
            this.audioRecorderType = recordOptions.audioRecorderType;
            this.audioWorkerURL = recordOptions.audioWorkerURL;
            this.audioBufferSize = recordOptions.audioBufferSize;
            this.audioSampleRate = recordOptions.audioSampleRate;
            this.audioBitRate = recordOptions.audioBitRate;
            this.audioChannels = recordOptions.audioChannels;
            this.audioMimeType = recordOptions.audioMimeType;

            // animation settings
            this.animationFrameRate = recordOptions.animationFrameRate;
            this.animationQuality = recordOptions.animationQuality;
        }

        /**
         * Player UI is ready.
         * @private
         */

    }, {
        key: 'setupUI',
        value: function setupUI() {
            var _this2 = this;

            // insert custom controls on left-side of controlbar
            this.player.controlBar.addChild(this.player.cameraButton);
            this.player.controlBar.el().insertBefore(this.player.cameraButton.el(), this.player.controlBar.el().firstChild);
            this.player.controlBar.el().insertBefore(this.player.recordToggle.el(), this.player.controlBar.el().firstChild);

            // get rid of unused controls
            if (this.player.controlBar.remainingTimeDisplay !== undefined) {
                this.player.controlBar.remainingTimeDisplay.el().style.display = 'none';
            }
            if (this.player.controlBar.liveDisplay !== undefined) {
                this.player.controlBar.liveDisplay.el().style.display = 'none';
            }

            // loop feature is never used in this plugin
            this.player.loop(false);

            // tweak player UI based on type
            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    // reference to videojs-wavesurfer plugin
                    this.surfer = this.player.wavesurfer();
                    break;

                case _recordMode.IMAGE_ONLY:
                case _recordMode.VIDEO_ONLY:
                case _recordMode.AUDIO_VIDEO:
                case _recordMode.ANIMATION:
                    // customize controls
                    this.player.bigPlayButton.hide();

                    // loadedmetadata resets the durationDisplay for the
                    // first time
                    this.player.one('loadedmetadata', function () {
                        // display max record time
                        _this2.setDuration(_this2.maxLength);
                    });

                    // the native controls don't work for this UI so disable
                    // them no matter what
                    if (this.player.usingNativeControls_ === true) {
                        if (this.player.tech_.el_ !== undefined) {
                            this.player.tech_.el_.controls = false;
                        }
                    }

                    // clicking or tapping the player video element should not try
                    // to start playback
                    this.player.removeTechControlsListeners_();

                    if (this.player.options_.controls) {
                        // progress control isn't used by this plugin
                        this.player.controlBar.progressControl.hide();

                        // prevent controlbar fadeout
                        this.player.on('userinactive', function (event) {
                            _this2.player.userActive(true);
                        });

                        // videojs automatically hides the controls when no valid 'source'
                        // element is included in the video or audio tag. Don't. Ever again.
                        this.player.controlBar.show();
                        this.player.controlBar.el().style.display = 'flex';
                    }
                    break;
            }

            // disable time display events that constantly try to reset the current time
            // and duration values
            this.player.off('timeupdate');
            this.player.off('durationchange');
            this.player.off('loadedmetadata');

            // display max record time
            this.setDuration(this.maxLength);

            // hide play control
            this.player.controlBar.playToggle.hide();
        }

        /**
         * Indicates whether the plugin is currently recording or not.
         *
         * @return {boolean} Plugin currently recording or not.
         */

    }, {
        key: 'isRecording',
        value: function isRecording() {
            return this._recording;
        }

        /**
         * Indicates whether the plugin is currently processing recorded data
         * or not.
         *
         * @return {boolean} Plugin processing or not.
         */

    }, {
        key: 'isProcessing',
        value: function isProcessing() {
            return this._processing;
        }

        /**
         * Indicates whether the plugin is destroyed or not.
         *
         * @return {boolean} Plugin destroyed or not.
         */

    }, {
        key: 'isDestroyed',
        value: function isDestroyed() {
            return this.player && this.player.children() === null;
        }

        /**
         * Open the browser's recording device selection dialog.
         */

    }, {
        key: 'getDevice',
        value: function getDevice() {
            // define device callbacks once
            if (this.deviceReadyCallback === undefined) {
                this.deviceReadyCallback = this.onDeviceReady.bind(this);
            }
            if (this.deviceErrorCallback === undefined) {
                this.deviceErrorCallback = this.onDeviceError.bind(this);
            }
            if (this.engineStopCallback === undefined) {
                this.engineStopCallback = this.onRecordComplete.bind(this);
            }
            // ask the browser to give the user access to the media device
            // and get a stream reference in the callback function
            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    // setup microphone
                    this.mediaType = {
                        audio: this.audioRecorderType === AUTO ? true : this.audioRecorderType,
                        video: false
                    };
                    // remove existing microphone listeners
                    this.surfer.surfer.microphone.un('deviceReady', this.deviceReadyCallback);
                    this.surfer.surfer.microphone.un('deviceError', this.deviceErrorCallback);

                    // setup new microphone listeners
                    this.surfer.surfer.microphone.on('deviceReady', this.deviceReadyCallback);
                    this.surfer.surfer.microphone.on('deviceError', this.deviceErrorCallback);

                    // disable existing playback events
                    this.surfer.setupPlaybackEvents(false);

                    // (re)set surfer liveMode
                    this.surfer.liveMode = true;
                    this.surfer.surfer.microphone.paused = false;

                    // open browser device selection dialog
                    this.surfer.surfer.microphone.start();
                    break;

                case _recordMode.IMAGE_ONLY:
                case _recordMode.VIDEO_ONLY:
                    // setup camera
                    this.mediaType = {
                        audio: false,
                        video: this.videoRecorderType === AUTO ? true : this.videoRecorderType
                    };
                    navigator.mediaDevices.getUserMedia({
                        audio: false,
                        video: this.getRecordType() === _recordMode.IMAGE_ONLY ? this.recordImage : this.recordVideo
                    }).then(this.onDeviceReady.bind(this)).catch(this.onDeviceError.bind(this));
                    break;

                case _recordMode.AUDIO_VIDEO:
                    // setup camera and microphone
                    this.mediaType = {
                        audio: this.audioRecorderType === AUTO ? true : this.audioRecorderType,
                        video: this.videoRecorderType === AUTO ? true : this.videoRecorderType
                    };
                    navigator.mediaDevices.getUserMedia({
                        audio: this.recordAudio,
                        video: this.recordVideo
                    }).then(this.onDeviceReady.bind(this)).catch(this.onDeviceError.bind(this));
                    break;

                case _recordMode.ANIMATION:
                    // setup camera
                    this.mediaType = {
                        // animated GIF
                        audio: false,
                        video: false,
                        gif: true
                    };
                    navigator.mediaDevices.getUserMedia({
                        audio: false,
                        video: this.recordAnimation
                    }).then(this.onDeviceReady.bind(this)).catch(this.onDeviceError.bind(this));
                    break;
            }
        }

        /**
         * Invoked when the device is ready.
         * @private
         * @param stream: LocalMediaStream instance.
         */

    }, {
        key: 'onDeviceReady',
        value: function onDeviceReady(stream) {
            var _this3 = this;

            this._deviceActive = true;

            // store reference to stream for stopping etc.
            this.stream = stream;

            // hide device selection button
            this.player.deviceButton.hide();

            // reset time (e.g. when stopDevice was used)
            this.setDuration(this.maxLength);
            this.setCurrentTime(0);

            // hide play/pause control (e.g. when stopDevice was used)
            this.player.controlBar.playToggle.hide();

            // reset playback listeners
            this.off(this.player, 'timeupdate', this.playbackTimeUpdate);
            this.off(this.player, 'ended', this.playbackTimeUpdate);

            // setup recording engine
            if (this.getRecordType() !== _recordMode.IMAGE_ONLY) {
                // currently libvorbis.js, recorder.js, opus-recorder and lamejs
                // are only supported in audio-only mode
                if (this.getRecordType() !== _recordMode.AUDIO_ONLY && (this.audioEngine === _recordEngine.LIBVORBISJS || this.audioEngine === _recordEngine.RECORDERJS || this.audioEngine === _recordEngine.LAMEJS || this.audioEngine === _recordEngine.OPUSRECORDER)) {
                    throw new Error('Currently ' + this.audioEngine + ' is only supported in audio-only mode.');
                }

                // get recorder class
                var EngineClass;
                switch (this.audioEngine) {
                    case _recordEngine.RECORDRTC:
                        // RecordRTC.js (default)
                        EngineClass = _video2.default.RecordRTCEngine;
                        break;

                    case _recordEngine.LIBVORBISJS:
                        // libvorbis.js
                        EngineClass = _video2.default.LibVorbisEngine;
                        break;

                    case _recordEngine.RECORDERJS:
                        // recorder.js
                        EngineClass = _video2.default.RecorderjsEngine;
                        break;

                    case _recordEngine.LAMEJS:
                        // lamejs
                        EngineClass = _video2.default.LamejsEngine;
                        break;

                    case _recordEngine.OPUSRECORDER:
                        // opus-recorder
                        EngineClass = _video2.default.OpusRecorderEngine;
                        break;

                    default:
                        // unknown engine
                        throw new Error('Unknown audioEngine: ' + this.audioEngine);
                }
                try {
                    // connect stream to recording engine
                    this.engine = new EngineClass(this.player, this.player.options_);
                } catch (err) {
                    console.error(err);
                    throw new Error('Could not load ' + this.audioEngine + ' plugin');
                }

                // listen for events
                this.engine.on('recordComplete', this.engineStopCallback);

                // audio settings
                this.engine.bufferSize = this.audioBufferSize;
                this.engine.sampleRate = this.audioSampleRate;
                this.engine.bitRate = this.audioBitRate;
                this.engine.audioChannels = this.audioChannels;
                this.engine.audioWorkerURL = this.audioWorkerURL;

                // mime type
                this.engine.mimeType = {
                    video: this.videoMimeType,
                    gif: 'image/gif'
                };
                if (this.audioMimeType !== null && this.audioMimeType !== AUTO) {
                    this.engine.mimeType.audio = this.audioMimeType;
                }

                // video/canvas settings
                this.engine.video = {
                    width: this.videoFrameWidth,
                    height: this.videoFrameHeight
                };
                this.engine.canvas = {
                    width: this.videoFrameWidth,
                    height: this.videoFrameHeight
                };

                // animated GIF settings
                this.engine.quality = this.animationQuality;
                this.engine.frameRate = this.animationFrameRate;

                // timeSlice
                if (this.recordTimeSlice && this.recordTimeSlice > 0) {
                    this.engine.timeSlice = this.recordTimeSlice;
                    this.engine.onTimeStamp = this.onTimeStamp.bind(this);
                }

                // initialize recorder
                this.engine.setup(this.stream, this.mediaType, this.debug);

                // show elements that should never be hidden in animation,
                // audio and/or video modus
                var uiElements = [this.player.controlBar.currentTimeDisplay, this.player.controlBar.timeDivider, this.player.controlBar.durationDisplay];
                uiElements.forEach(function (element) {
                    if (element !== undefined) {
                        element.el().style.display = 'block';
                        element.show();
                    }
                });

                // show record button
                this.player.recordToggle.show();
            } else {
                // disable record indicator
                this.player.recordIndicator.disable();

                // setup UI for retrying snapshot (e.g. when stopDevice was
                // used)
                this.retrySnapshot();

                // reset and show camera button
                this.player.cameraButton.onStop();
                this.player.cameraButton.show();
            }

            // setup preview
            if (this.getRecordType() !== _recordMode.AUDIO_ONLY) {
                // show live preview
                this.mediaElement = this.player.el().firstChild;
                this.mediaElement.controls = false;

                // mute incoming audio for feedback loops
                this.mediaElement.muted = true;

                // hide the volume bar while it's muted
                this.displayVolumeControl(false);

                // load stream
                this.load(this.stream);

                // stream loading is async, so we wait until it's ready to play
                // the stream
                this.player.one('loadedmetadata', function () {
                    // start stream
                    _this3.mediaElement.play();

                    // forward to listeners
                    _this3.player.trigger('deviceReady');
                });
            } else {
                // forward to listeners
                this.player.trigger('deviceReady');
            }
        }

        /**
         * Invoked when an device error occurred.
         * @private
         */

    }, {
        key: 'onDeviceError',
        value: function onDeviceError(code) {
            this._deviceActive = false;

            // store code
            this.player.deviceErrorCode = code;

            // forward error to player
            this.player.trigger('deviceError');
        }

        /**
         * Start recording.
         */

    }, {
        key: 'start',
        value: function start() {
            var _this4 = this;

            if (!this.isProcessing()) {
                this._recording = true;

                // hide play/pause control
                this.player.controlBar.playToggle.hide();

                // reset playback listeners
                this.off(this.player, 'timeupdate', this.playbackTimeUpdate);
                this.off(this.player, 'ended', this.playbackTimeUpdate);

                // start preview
                switch (this.getRecordType()) {
                    case _recordMode.AUDIO_ONLY:
                        // disable playback events
                        this.surfer.setupPlaybackEvents(false);

                        // start/resume live audio visualization
                        this.surfer.surfer.microphone.paused = false;
                        this.surfer.liveMode = true;
                        this.surfer.surfer.microphone.play();
                        break;

                    case _recordMode.VIDEO_ONLY:
                    case _recordMode.AUDIO_VIDEO:
                        // preview video stream in video element
                        this.startVideoPreview();
                        break;

                    case _recordMode.ANIMATION:
                        // hide the first frame
                        this.player.recordCanvas.hide();

                        // hide the animation
                        this.player.animationDisplay.hide();

                        // show preview video
                        this.mediaElement.style.display = 'block';

                        // for animations, capture the first frame
                        // that can be displayed as soon as recording
                        // is complete
                        this.captureFrame().then(function (result) {
                            // start video preview **after** capturing first frame
                            _this4.startVideoPreview();
                        });
                        break;
                }

                // start recording
                switch (this.getRecordType()) {
                    case _recordMode.IMAGE_ONLY:
                        // create snapshot
                        this.createSnapshot();

                        // notify UI
                        this.player.trigger('startRecord');
                        break;

                    case _recordMode.VIDEO_ONLY:
                    case _recordMode.AUDIO_VIDEO:
                    case _recordMode.ANIMATION:
                        // wait for media stream on video element to actually load
                        this.player.one('loadedmetadata', function () {
                            // start actually recording process
                            _this4.startRecording();
                        });
                        break;

                    default:
                        // all resources have already loaded, so we can start
                        // recording right away
                        this.startRecording();
                }
            }
        }

        /**
         * Start recording.
         * @private
         */

    }, {
        key: 'startRecording',
        value: function startRecording() {
            // register starting point
            this.paused = false;
            this.pauseTime = this.pausedTime = 0;
            this.startTime = new Date().getTime();

            // start countdown
            this.countDown = this.player.setInterval(this.onCountDown.bind(this), 100);

            // cleanup previous recording
            if (this.engine !== undefined) {
                this.engine.dispose();
            }

            // start recording stream
            this.engine.start();

            // notify UI
            this.player.trigger('startRecord');
        }

        /**
         * Stop recording.
         */

    }, {
        key: 'stop',
        value: function stop() {
            if (!this.isProcessing()) {
                this._recording = false;
                this._processing = true;

                if (this.getRecordType() !== _recordMode.IMAGE_ONLY) {
                    // notify UI
                    this.player.trigger('stopRecord');

                    // stop countdown
                    this.player.clearInterval(this.countDown);

                    // stop recording stream (result will be available async)
                    if (this.engine) {
                        this.engine.stop();
                    }
                } else {
                    if (this.player.recordedData) {
                        // notify listeners that image data is (already) available
                        this.player.trigger('finishRecord');
                    }
                }
            }
        }

        /**
         * Stop device(s) and recording if active.
         */

    }, {
        key: 'stopDevice',
        value: function stopDevice() {
            if (this.isRecording()) {
                // stop stream once recorded data is available,
                // otherwise it'll break recording
                this.player.one('finishRecord', this.stopStream.bind(this));

                // stop recording
                this.stop();
            } else {
                // stop stream now, since there's no recorded data available
                this.stopStream();
            }
        }

        /**
         * Stop stream and device.
         */

    }, {
        key: 'stopStream',
        value: function stopStream() {
            // stop stream and device
            if (this.stream) {
                this._deviceActive = false;

                if (this.getRecordType() === _recordMode.AUDIO_ONLY) {
                    // make the microphone plugin stop it's device
                    this.surfer.surfer.microphone.stopDevice();
                    return;
                }
                this.stream.getTracks().forEach(function (stream) {
                    stream.stop();
                });
            }
        }

        /**
         * Pause recording.
         */

    }, {
        key: 'pause',
        value: function pause() {
            if (!this.paused) {
                this.pauseTime = new Date().getTime();
                this.paused = true;

                this.engine.pause();
            }
        }

        /**
         * Resume recording.
         */

    }, {
        key: 'resume',
        value: function resume() {
            if (this.paused) {
                this.pausedTime += new Date().getTime() - this.pauseTime;

                this.engine.resume();
                this.paused = false;
            }
        }

        /**
         * Invoked when recording completed and the resulting stream is
         * available.
         * @private
         */

    }, {
        key: 'onRecordComplete',
        value: function onRecordComplete() {
            var _this5 = this;

            // store reference to recorded stream data
            this.player.recordedData = this.engine.recordedData;

            // change the replay button back to a play button
            this.player.controlBar.playToggle.removeClass('vjs-ended');
            this.player.controlBar.playToggle.show();

            // notify listeners that data is available
            this.player.trigger('finishRecord');

            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    // pause player so user can start playback
                    this.surfer.pause();

                    // setup events for playback
                    this.surfer.setupPlaybackEvents(true);

                    // display loader
                    this.player.loadingSpinner.show();

                    // restore interaction with controls after waveform
                    // rendering is complete
                    this.surfer.surfer.once('ready', function () {
                        _this5._processing = false;
                    });

                    // visualize recorded stream
                    this.load(this.player.recordedData);
                    break;

                case _recordMode.VIDEO_ONLY:
                case _recordMode.AUDIO_VIDEO:
                    // pausing the player so we can visualize the recorded data
                    // will trigger an async video.js 'pause' event that we
                    // have to wait for.
                    this.player.one('pause', function () {
                        // video data is ready
                        _this5._processing = false;

                        // hide loader
                        _this5.player.loadingSpinner.hide();

                        // show stream total duration
                        _this5.setDuration(_this5.streamDuration);

                        // update time during playback and at end
                        _this5.on(_this5.player, 'timeupdate', _this5.playbackTimeUpdate);
                        _this5.on(_this5.player, 'ended', _this5.playbackTimeUpdate);

                        // unmute local audio during playback
                        if (_this5.getRecordType() === _recordMode.AUDIO_VIDEO) {
                            _this5.mediaElement.muted = false;

                            // show the volume bar when it's unmuted
                            _this5.displayVolumeControl(true);
                        }

                        // load recorded media
                        if ((0, _detectBrowser.isChrome)() && _this5.getRecordType() === _recordMode.AUDIO_VIDEO) {
                            // use video property on Chrome
                            _this5.load(_this5.player.recordedData.video);
                        } else {
                            _this5.load(_this5.player.recordedData);
                        }
                    });

                    // pause player so user can start playback
                    this.player.pause();
                    break;

                case _recordMode.ANIMATION:
                    // animation data is ready
                    this._processing = false;

                    // hide loader
                    this.player.loadingSpinner.hide();

                    // show animation total duration
                    this.setDuration(this.streamDuration);

                    // hide preview video
                    this.mediaElement.style.display = 'none';

                    // show the first frame
                    this.player.recordCanvas.show();

                    // pause player so user can start playback
                    this.player.pause();

                    // show animation on play
                    this.on(this.player, 'play', this.showAnimation);

                    // hide animation on pause
                    this.on(this.player, 'pause', this.hideAnimation);
                    break;
            }
        }

        /**
         * Invoked during recording and displays the remaining time.
         * @private
         */

    }, {
        key: 'onCountDown',
        value: function onCountDown() {
            if (!this.paused) {
                var now = new Date().getTime();
                var duration = this.maxLength;
                var currentTime = (now - (this.startTime + this.pausedTime)) / 1000;

                this.streamDuration = currentTime;

                if (currentTime >= duration) {
                    // at the end
                    currentTime = duration;

                    // stop recording
                    this.stop();
                }

                // update duration
                this.setDuration(duration);

                // update current time
                this.setCurrentTime(currentTime, duration);

                // notify listeners
                this.player.trigger('progressRecord');
            }
        }

        /**
         * Get the current time of the recorded stream during playback.
         *
         * Returns 0 if no recording is available (yet).
         */

    }, {
        key: 'getCurrentTime',
        value: function getCurrentTime() {
            var currentTime = isNaN(this.streamCurrentTime) ? 0 : this.streamCurrentTime;

            if (this.getRecordType() === _recordMode.AUDIO_ONLY) {
                currentTime = this.surfer.getCurrentTime();
            }

            return currentTime;
        }

        /**
         * Updates the player's element displaying the current time.
         *
         * @private
         * @param {number} [currentTime=0] - Current position of the
         *    playhead (in seconds).
         * @param {number} [duration=0] - Duration in seconds.
         */

    }, {
        key: 'setCurrentTime',
        value: function setCurrentTime(currentTime, duration) {
            currentTime = isNaN(currentTime) ? 0 : currentTime;
            duration = isNaN(duration) ? 0 : duration;

            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    this.surfer.setCurrentTime(currentTime, duration);
                    break;

                case _recordMode.VIDEO_ONLY:
                case _recordMode.AUDIO_VIDEO:
                case _recordMode.ANIMATION:
                    this.streamCurrentTime = Math.min(currentTime, duration);

                    // update current time display component
                    this.player.controlBar.currentTimeDisplay.formattedTime_ = this.player.controlBar.currentTimeDisplay.contentEl().lastChild.textContent = (0, _formatTime2.default)(this.streamCurrentTime, duration, this.msDisplayMax);
                    break;
            }
        }

        /**
         * Get the length of the recorded stream in seconds.
         *
         * Returns 0 if no recording is available (yet).
         */

    }, {
        key: 'getDuration',
        value: function getDuration() {
            var duration = isNaN(this.streamDuration) ? 0 : this.streamDuration;

            return duration;
        }

        /**
         * Updates the player's element displaying the duration time.
         *
         * @param {number} [duration=0] - Duration in seconds.
         * @private
         */

    }, {
        key: 'setDuration',
        value: function setDuration(duration) {
            duration = isNaN(duration) ? 0 : duration;

            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    this.surfer.setDuration(duration);
                    break;

                case _recordMode.VIDEO_ONLY:
                case _recordMode.AUDIO_VIDEO:
                case _recordMode.ANIMATION:
                    // update duration display component
                    this.player.controlBar.durationDisplay.formattedTime_ = this.player.controlBar.durationDisplay.contentEl().lastChild.textContent = (0, _formatTime2.default)(duration, duration, this.msDisplayMax);
                    break;
            }
        }

        /**
         * Start loading data.
         *
         * @param {(string|blob|file)} url - Either the URL of the media file,
         *     a Blob, a File object or MediaStream.
         */

    }, {
        key: 'load',
        value: function load(url) {
            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    // visualize recorded Blob stream
                    this.surfer.load(url);
                    break;

                case _recordMode.IMAGE_ONLY:
                case _recordMode.VIDEO_ONLY:
                case _recordMode.AUDIO_VIDEO:
                case _recordMode.ANIMATION:
                    if (url instanceof Blob || url instanceof File) {
                        // assign blob using createObjectURL
                        (0, _browserShim2.default)(url, this.mediaElement, false);
                    } else {
                        // assign stream without createObjectURL
                        (0, _browserShim2.default)(url, this.mediaElement, true);
                    }
                    break;
            }
        }

        /**
         * Show save as dialog in browser so the user can store the recorded media
         * locally.
         *
         * @param {object} name - Object with one or more names for the particular
         *     blob(s) you want to save. File extensions are added automatically.
         *     For example: {'video': 'name-of-video-file'}. Supported keys are
         *     'audio', 'video' and 'gif'.
         */

    }, {
        key: 'saveAs',
        value: function saveAs(name) {
            if (this.engine && name !== undefined) {
                this.engine.saveAs(name);
            }
        }

        /**
         * Destroy plugin only.
         *
         * Use `destroy` to remove the plugin and the player.
         */

    }, {
        key: 'dispose',
        value: function dispose() {
            // disable common event listeners
            this.player.off('ready');
            this.player.off('userinactive');
            this.player.off('loadedmetadata');

            // prevent callbacks if recording is in progress
            if (this.engine) {
                this.engine.dispose();
                this.engine.off('recordComplete', this.engineStopCallback);
            }

            // stop recording and device
            this.stop();
            this.stopDevice();

            // stop countdown
            this.player.clearInterval(this.countDown);

            // dispose wavesurfer.js
            if (this.getRecordType() == _recordMode.AUDIO_ONLY) {
                if (this.surfer) {
                    // also disposes player
                    this.surfer.destroy();
                }
            }

            this.resetState();

            _get(Record.prototype.__proto__ || Object.getPrototypeOf(Record.prototype), 'dispose', this).call(this);
        }

        /**
         * Destroy plugin and players and cleanup resources.
         */

    }, {
        key: 'destroy',
        value: function destroy() {
            this.player.dispose();
        }

        /**
         * Reset the plugin.
         */

    }, {
        key: 'reset',
        value: function reset() {
            var _this6 = this;

            // prevent callbacks if recording is in progress
            if (this.engine) {
                this.engine.dispose();
                this.engine.off('recordComplete', this.engineStopCallback);
            }

            // stop recording and device
            this.stop();
            this.stopDevice();

            // stop countdown
            this.player.clearInterval(this.countDown);

            // reset options
            this.loadOptions();

            // reset recorder state
            this.resetState();

            // reset record time
            this.setDuration(this.maxLength);
            this.setCurrentTime(0);

            // reset player
            this.player.reset();
            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    if (this.surfer && this.surfer.surfer) {
                        // empty last frame
                        this.surfer.surfer.empty();
                    }
                    break;

                case _recordMode.IMAGE_ONLY:
                case _recordMode.ANIMATION:
                    // reset UI
                    this.player.recordCanvas.hide();
                    this.player.cameraButton.hide();
                    break;
            }

            // hide play control
            this.player.controlBar.playToggle.hide();

            // show device selection button
            this.player.deviceButton.show();

            // hide record button
            this.player.recordToggle.hide();

            // loadedmetadata resets the durationDisplay for the
            // first time
            this.player.one('loadedmetadata', function () {
                // display max record time
                _this6.setDuration(_this6.maxLength);
            });
        }

        /**
         * Reset the plugin recorder state.
         * @private
         */

    }, {
        key: 'resetState',
        value: function resetState() {
            this._recording = false;
            this._processing = false;
            this._deviceActive = false;
            this.devices = [];
        }

        /**
         * Get recorder type.
         */

    }, {
        key: 'getRecordType',
        value: function getRecordType() {
            return (0, _recordMode.getRecorderMode)(this.recordImage, this.recordAudio, this.recordVideo, this.recordAnimation);
        }

        /**
         * Create and display snapshot image.
         * @private
         */

    }, {
        key: 'createSnapshot',
        value: function createSnapshot() {
            var _this7 = this;

            this.captureFrame().then(function (result) {
                // turn the canvas data into base64 data with a PNG header
                _this7.player.recordedData = result.toDataURL('image/png');

                // hide preview video
                _this7.mediaElement.style.display = 'none';

                // show the snapshot
                _this7.player.recordCanvas.show();

                // stop recording
                _this7.stop();
            });
        }

        /**
         * Reset UI for retrying a snapshot image.
         * @private
         */

    }, {
        key: 'retrySnapshot',
        value: function retrySnapshot() {
            this._processing = false;

            // retry: hide the snapshot
            this.player.recordCanvas.hide();

            // show preview video
            this.player.el().firstChild.style.display = 'block';
        }

        /**
         * Capture frame from camera and copy data to canvas.
         * @private
         */

    }, {
        key: 'captureFrame',
        value: function captureFrame() {
            var _this8 = this;

            var detected = (0, _detectBrowser.detectBrowser)();
            var recordCanvas = this.player.recordCanvas.el().firstChild;

            // set the canvas size to the dimensions of the camera,
            // which also wipes the content of the canvas
            recordCanvas.width = this.player.width();
            recordCanvas.height = this.player.height();

            return new Promise(function (resolve, reject) {
                // MediaCapture is only supported on:
                // - Chrome 60 and newer (see
                // https://github.com/w3c/mediacapture-image/blob/gh-pages/implementation-status.md)
                // - Firefox behind flag (https://bugzilla.mozilla.org/show_bug.cgi?id=888177)
                //
                // importing ImageCapture can fail when enabling chrome flag is still required.
                // if so; ignore and continue
                if (detected.browser === 'chrome' && detected.version >= 60 && (typeof ImageCapture === 'undefined' ? 'undefined' : _typeof(ImageCapture)) === (typeof Function === 'undefined' ? 'undefined' : _typeof(Function))) {
                    try {
                        var track = _this8.stream.getVideoTracks()[0];
                        var imageCapture = new ImageCapture(track);
                        var photoSettings = {
                            imageWidth: recordCanvas.width,
                            imageHeight: recordCanvas.height
                        };

                        // take picture
                        imageCapture.takePhoto(photoSettings).then(function (blob) {
                            return createImageBitmap(blob);
                        }).then(function (imageBitmap) {
                            // get a frame and copy it onto the canvas
                            _this8.drawCanvas(recordCanvas, imageBitmap);

                            // notify others
                            resolve(recordCanvas);
                        });
                        return;
                    } catch (err) {}
                }
                // no ImageCapture available: do it the oldskool way

                // get a frame and copy it onto the canvas
                _this8.drawCanvas(recordCanvas, _this8.mediaElement);

                // notify others
                resolve(recordCanvas);
            });
        }

        /**
         * Draw image frame on canvas element.
         * @private
         */

    }, {
        key: 'drawCanvas',
        value: function drawCanvas(canvas, element) {
            canvas.getContext('2d').drawImage(element, 0, 0, canvas.width, canvas.height);
        }

        /**
         * Start preview of video stream.
         * @private
         */

    }, {
        key: 'startVideoPreview',
        value: function startVideoPreview() {
            // disable playback events
            this.off('timeupdate');
            this.off('durationchange');
            this.off('loadedmetadata');
            this.off('play');

            // mute local audio
            this.mediaElement.muted = true;

            // hide volume control to prevent feedback
            this.displayVolumeControl(false);

            // start or resume live preview
            this.load(this.stream);
            this.mediaElement.play();
        }

        /**
         * Show animated GIF.
         * @private
         */

    }, {
        key: 'showAnimation',
        value: function showAnimation() {
            var animationDisplay = this.player.animationDisplay.el().firstChild;

            // set the image size to the dimensions of the recorded animation
            animationDisplay.width = this.player.width();
            animationDisplay.height = this.player.height();

            // hide the first frame
            this.player.recordCanvas.hide();

            // show the animation
            (0, _browserShim2.default)(this.player.recordedData, animationDisplay, false);
            this.player.animationDisplay.show();
        }

        /**
         * Hide animated GIF.
         * @private
         */

    }, {
        key: 'hideAnimation',
        value: function hideAnimation() {
            // show the first frame
            this.player.recordCanvas.show();

            // hide the animation
            this.player.animationDisplay.hide();
        }

        /**
         * Update time during playback.
         * @private
         */

    }, {
        key: 'playbackTimeUpdate',
        value: function playbackTimeUpdate() {
            this.setCurrentTime(this.player.currentTime(), this.streamDuration);
        }

        /**
         * Received new timestamp (when timeSlice option is enabled).
         * @private
         */

    }, {
        key: 'onTimeStamp',
        value: function onTimeStamp(current, all) {
            this.player.currentTimestamp = current;
            this.player.allTimestamps = all;

            // get blob (only for MediaStreamRecorder)
            var internal;
            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    internal = this.engine.engine.audioRecorder;
                    break;

                case _recordMode.ANIMATION:
                    internal = this.engine.engine.gifRecorder;
                    break;

                default:
                    internal = this.engine.engine.videoRecorder;
            }
            internal = internal.getInternalRecorder();
            if (internal instanceof MediaStreamRecorder === true) {
                this.player.recordedData = internal.getArrayOfBlobs();

                // inject file info for newest blob
                this.engine.addFileInfo(this.player.recordedData[this.player.recordedData.length - 1]);
            }

            // notify others
            this.player.trigger('timestamp');
        }

        /**
         * Collects information about the media input and output devices
         * available on the system.
         *
         * Returns an array.
         */

    }, {
        key: 'enumerateDevices',
        value: function enumerateDevices() {
            var _this9 = this;

            if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
                this.player.enumerateErrorCode = 'enumerateDevices() not supported.';
                this.player.trigger('enumerateError');
                return;
            }

            // List cameras and microphones.
            navigator.mediaDevices.enumerateDevices(this).then(function (devices) {
                _this9.devices = [];
                devices.forEach(function (device) {
                    _this9.devices.push(device);
                });

                // notify listeners
                _this9.player.trigger('enumerateReady');
            }).catch(function (err) {
                _this9.player.enumerateErrorCode = err;
                _this9.player.trigger('enumerateError');
            });
        }

        /**
         * Change the audio output device.
         *
         * @param {string} deviceId - Id of audio output device.
         */

    }, {
        key: 'setAudioOutput',
        value: function setAudioOutput(deviceId) {
            var _this10 = this;

            var errorMessage = void 0;

            switch (this.getRecordType()) {
                case _recordMode.AUDIO_ONLY:
                    // use wavesurfer
                    this.surfer.surfer.setSinkId(deviceId).then(function (result) {
                        // notify listeners
                        _this10.player.trigger('audioOutputReady');
                    }).catch(function (err) {
                        errorMessage = err;
                    });
                    break;

                default:
                    var element = player.tech_.el_;
                    if (deviceId) {
                        if (typeof element.sinkId !== 'undefined') {
                            element.setSinkId(deviceId).then(function (result) {
                                // notify listeners
                                _this10.player.trigger('audioOutputReady');
                            }).catch(function (err) {
                                errorMessage = err;
                            });
                        } else {
                            errorMessage = 'Browser does not support audio output device selection.';
                        }
                    } else {
                        errorMessage = 'Invalid deviceId: ' + deviceId;
                    }
                    break;
            }

            // error if we get here: notify listeners
            if (errorMessage) {
                this.player.trigger('error', errorMessage);
            }
        }

        /**
         * Show or hide the volume menu.
         *
         * @private
         * @param {boolean} display - Hide/show volume control.
         */

    }, {
        key: 'displayVolumeControl',
        value: function displayVolumeControl(display) {
            if (this.player.controlBar.volumePanel !== undefined) {
                if (display === true) {
                    display = 'flex';
                } else {
                    display = 'none';
                }
                this.player.controlBar.volumePanel.el().style.display = display;
            }
        }
    }]);

    return Record;
}(Plugin);

// version nr gets replaced during build


Record.VERSION = '2.1.3';

// register plugin
_video2.default.Record = Record;
_video2.default.registerPlugin('record', Record);

// export plugin
module.exports = {
    Record: Record
};
}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})

},{"./controls/animation-display":1,"./controls/camera-button":2,"./controls/device-button":3,"./controls/record-canvas":4,"./controls/record-indicator":5,"./controls/record-toggle":6,"./defaults":7,"./engine/record-engine":8,"./engine/record-mode":9,"./engine/record-rtc":10,"./utils/browser-shim":11,"./utils/detect-browser":12,"./utils/format-time":13}]},{},[15])(15)
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJlczUvY29udHJvbHMvYW5pbWF0aW9uLWRpc3BsYXkuanMiLCJlczUvY29udHJvbHMvY2FtZXJhLWJ1dHRvbi5qcyIsImVzNS9jb250cm9scy9kZXZpY2UtYnV0dG9uLmpzIiwiZXM1L2NvbnRyb2xzL3JlY29yZC1jYW52YXMuanMiLCJlczUvY29udHJvbHMvcmVjb3JkLWluZGljYXRvci5qcyIsImVzNS9jb250cm9scy9yZWNvcmQtdG9nZ2xlLmpzIiwiZXM1L2RlZmF1bHRzLmpzIiwiZXM1L2VuZ2luZS9yZWNvcmQtZW5naW5lLmpzIiwiZXM1L2VuZ2luZS9yZWNvcmQtbW9kZS5qcyIsImVzNS9lbmdpbmUvcmVjb3JkLXJ0Yy5qcyIsImVzNS91dGlscy9icm93c2VyLXNoaW0uanMiLCJlczUvdXRpbHMvZGV0ZWN0LWJyb3dzZXIuanMiLCJlczUvdXRpbHMvZm9ybWF0LXRpbWUuanMiLCJub2RlX21vZHVsZXMvZ2xvYmFsL3dpbmRvdy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7Ozs7O0FBQUE7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDOURBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDbktBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQzNFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDOURBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDOUZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDN0pBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQ3ZGQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQ2pNQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQzNDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUM3T0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDM0JBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQ2xIQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FDeEVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfXJldHVybiBlfSkoKSIsIid1c2Ugc3RyaWN0JztcblxuT2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFwiX19lc01vZHVsZVwiLCB7XG4gIHZhbHVlOiB0cnVlXG59KTtcblxudmFyIF9jcmVhdGVDbGFzcyA9IGZ1bmN0aW9uICgpIHsgZnVuY3Rpb24gZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7IGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHsgdmFyIGRlc2NyaXB0b3IgPSBwcm9wc1tpXTsgZGVzY3JpcHRvci5lbnVtZXJhYmxlID0gZGVzY3JpcHRvci5lbnVtZXJhYmxlIHx8IGZhbHNlOyBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7IGlmIChcInZhbHVlXCIgaW4gZGVzY3JpcHRvcikgZGVzY3JpcHRvci53cml0YWJsZSA9IHRydWU7IE9iamVjdC5kZWZpbmVQcm9wZXJ0eSh0YXJnZXQsIGRlc2NyaXB0b3Iua2V5LCBkZXNjcmlwdG9yKTsgfSB9IHJldHVybiBmdW5jdGlvbiAoQ29uc3RydWN0b3IsIHByb3RvUHJvcHMsIHN0YXRpY1Byb3BzKSB7IGlmIChwcm90b1Byb3BzKSBkZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLnByb3RvdHlwZSwgcHJvdG9Qcm9wcyk7IGlmIChzdGF0aWNQcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvciwgc3RhdGljUHJvcHMpOyByZXR1cm4gQ29uc3RydWN0b3I7IH07IH0oKTtcblxudmFyIF9nZXQgPSBmdW5jdGlvbiBnZXQob2JqZWN0LCBwcm9wZXJ0eSwgcmVjZWl2ZXIpIHsgaWYgKG9iamVjdCA9PT0gbnVsbCkgb2JqZWN0ID0gRnVuY3Rpb24ucHJvdG90eXBlOyB2YXIgZGVzYyA9IE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3Iob2JqZWN0LCBwcm9wZXJ0eSk7IGlmIChkZXNjID09PSB1bmRlZmluZWQpIHsgdmFyIHBhcmVudCA9IE9iamVjdC5nZXRQcm90b3R5cGVPZihvYmplY3QpOyBpZiAocGFyZW50ID09PSBudWxsKSB7IHJldHVybiB1bmRlZmluZWQ7IH0gZWxzZSB7IHJldHVybiBnZXQocGFyZW50LCBwcm9wZXJ0eSwgcmVjZWl2ZXIpOyB9IH0gZWxzZSBpZiAoXCJ2YWx1ZVwiIGluIGRlc2MpIHsgcmV0dXJuIGRlc2MudmFsdWU7IH0gZWxzZSB7IHZhciBnZXR0ZXIgPSBkZXNjLmdldDsgaWYgKGdldHRlciA9PT0gdW5kZWZpbmVkKSB7IHJldHVybiB1bmRlZmluZWQ7IH0gcmV0dXJuIGdldHRlci5jYWxsKHJlY2VpdmVyKTsgfSB9O1xuXG5mdW5jdGlvbiBfY2xhc3NDYWxsQ2hlY2soaW5zdGFuY2UsIENvbnN0cnVjdG9yKSB7IGlmICghKGluc3RhbmNlIGluc3RhbmNlb2YgQ29uc3RydWN0b3IpKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJDYW5ub3QgY2FsbCBhIGNsYXNzIGFzIGEgZnVuY3Rpb25cIik7IH0gfVxuXG5mdW5jdGlvbiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybihzZWxmLCBjYWxsKSB7IGlmICghc2VsZikgeyB0aHJvdyBuZXcgUmVmZXJlbmNlRXJyb3IoXCJ0aGlzIGhhc24ndCBiZWVuIGluaXRpYWxpc2VkIC0gc3VwZXIoKSBoYXNuJ3QgYmVlbiBjYWxsZWRcIik7IH0gcmV0dXJuIGNhbGwgJiYgKHR5cGVvZiBjYWxsID09PSBcIm9iamVjdFwiIHx8IHR5cGVvZiBjYWxsID09PSBcImZ1bmN0aW9uXCIpID8gY2FsbCA6IHNlbGY7IH1cblxuZnVuY3Rpb24gX2luaGVyaXRzKHN1YkNsYXNzLCBzdXBlckNsYXNzKSB7IGlmICh0eXBlb2Ygc3VwZXJDbGFzcyAhPT0gXCJmdW5jdGlvblwiICYmIHN1cGVyQ2xhc3MgIT09IG51bGwpIHsgdGhyb3cgbmV3IFR5cGVFcnJvcihcIlN1cGVyIGV4cHJlc3Npb24gbXVzdCBlaXRoZXIgYmUgbnVsbCBvciBhIGZ1bmN0aW9uLCBub3QgXCIgKyB0eXBlb2Ygc3VwZXJDbGFzcyk7IH0gc3ViQ2xhc3MucHJvdG90eXBlID0gT2JqZWN0LmNyZWF0ZShzdXBlckNsYXNzICYmIHN1cGVyQ2xhc3MucHJvdG90eXBlLCB7IGNvbnN0cnVjdG9yOiB7IHZhbHVlOiBzdWJDbGFzcywgZW51bWVyYWJsZTogZmFsc2UsIHdyaXRhYmxlOiB0cnVlLCBjb25maWd1cmFibGU6IHRydWUgfSB9KTsgaWYgKHN1cGVyQ2xhc3MpIE9iamVjdC5zZXRQcm90b3R5cGVPZiA/IE9iamVjdC5zZXRQcm90b3R5cGVPZihzdWJDbGFzcywgc3VwZXJDbGFzcykgOiBzdWJDbGFzcy5fX3Byb3RvX18gPSBzdXBlckNsYXNzOyB9XG5cbi8qKlxyXG4gKiBAZmlsZSBhbmltYXRpb24tZGlzcGxheS5qc1xyXG4gKiBAc2luY2UgMi4wLjBcclxuICovXG5cbnZhciBDb21wb25lbnQgPSB2aWRlb2pzLmdldENvbXBvbmVudCgnQ29tcG9uZW50Jyk7XG5cbi8qKlxyXG4gKiBJbWFnZSBmb3IgZGlzcGxheWluZyBhbmltYXRlZCBHSUYgaW1hZ2UuXHJcbiAqXHJcbiAqIEBjbGFzc1xyXG4gKiBAYXVnbWVudHMgdmlkZW9qcy5Db21wb25lbnRcclxuKi9cblxudmFyIEFuaW1hdGlvbkRpc3BsYXkgPSBmdW5jdGlvbiAoX0NvbXBvbmVudCkge1xuICBfaW5oZXJpdHMoQW5pbWF0aW9uRGlzcGxheSwgX0NvbXBvbmVudCk7XG5cbiAgZnVuY3Rpb24gQW5pbWF0aW9uRGlzcGxheSgpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgQW5pbWF0aW9uRGlzcGxheSk7XG5cbiAgICByZXR1cm4gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4odGhpcywgKEFuaW1hdGlvbkRpc3BsYXkuX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihBbmltYXRpb25EaXNwbGF5KSkuYXBwbHkodGhpcywgYXJndW1lbnRzKSk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoQW5pbWF0aW9uRGlzcGxheSwgW3tcbiAgICBrZXk6ICdjcmVhdGVFbCcsXG5cblxuICAgIC8qKlxyXG4gICAgICogQ3JlYXRlIHRoZSBgQW5pbWF0aW9uRGlzcGxheWBzIERPTSBlbGVtZW50LlxyXG4gICAgICpcclxuICAgICAqIEByZXR1cm4ge0VsZW1lbnR9XHJcbiAgICAgKiAgICAgICAgIFRoZSBkb20gZWxlbWVudCB0aGF0IGdldHMgY3JlYXRlZC5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiBjcmVhdGVFbCgpIHtcbiAgICAgIHJldHVybiBfZ2V0KEFuaW1hdGlvbkRpc3BsYXkucHJvdG90eXBlLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoQW5pbWF0aW9uRGlzcGxheS5wcm90b3R5cGUpLCAnY3JlYXRlRWwnLCB0aGlzKS5jYWxsKHRoaXMsICdkaXYnLCB7XG4gICAgICAgIGNsYXNzTmFtZTogJ3Zqcy1hbmltYXRpb24tZGlzcGxheScsXG4gICAgICAgIGlubmVySFRNTDogJzxpbWcgLz4nXG4gICAgICB9KTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gQW5pbWF0aW9uRGlzcGxheTtcbn0oQ29tcG9uZW50KTtcblxuQ29tcG9uZW50LnJlZ2lzdGVyQ29tcG9uZW50KCdBbmltYXRpb25EaXNwbGF5JywgQW5pbWF0aW9uRGlzcGxheSk7XG5cbmV4cG9ydHMuZGVmYXVsdCA9IEFuaW1hdGlvbkRpc3BsYXk7IiwiJ3VzZSBzdHJpY3QnO1xuXG5PYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgXCJfX2VzTW9kdWxlXCIsIHtcbiAgICB2YWx1ZTogdHJ1ZVxufSk7XG5cbnZhciBfY3JlYXRlQ2xhc3MgPSBmdW5jdGlvbiAoKSB7IGZ1bmN0aW9uIGRlZmluZVByb3BlcnRpZXModGFyZ2V0LCBwcm9wcykgeyBmb3IgKHZhciBpID0gMDsgaSA8IHByb3BzLmxlbmd0aDsgaSsrKSB7IHZhciBkZXNjcmlwdG9yID0gcHJvcHNbaV07IGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTsgZGVzY3JpcHRvci5jb25maWd1cmFibGUgPSB0cnVlOyBpZiAoXCJ2YWx1ZVwiIGluIGRlc2NyaXB0b3IpIGRlc2NyaXB0b3Iud3JpdGFibGUgPSB0cnVlOyBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7IH0gfSByZXR1cm4gZnVuY3Rpb24gKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykgeyBpZiAocHJvdG9Qcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvci5wcm90b3R5cGUsIHByb3RvUHJvcHMpOyBpZiAoc3RhdGljUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9OyB9KCk7XG5cbnZhciBfZ2V0ID0gZnVuY3Rpb24gZ2V0KG9iamVjdCwgcHJvcGVydHksIHJlY2VpdmVyKSB7IGlmIChvYmplY3QgPT09IG51bGwpIG9iamVjdCA9IEZ1bmN0aW9uLnByb3RvdHlwZTsgdmFyIGRlc2MgPSBPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yKG9iamVjdCwgcHJvcGVydHkpOyBpZiAoZGVzYyA9PT0gdW5kZWZpbmVkKSB7IHZhciBwYXJlbnQgPSBPYmplY3QuZ2V0UHJvdG90eXBlT2Yob2JqZWN0KTsgaWYgKHBhcmVudCA9PT0gbnVsbCkgeyByZXR1cm4gdW5kZWZpbmVkOyB9IGVsc2UgeyByZXR1cm4gZ2V0KHBhcmVudCwgcHJvcGVydHksIHJlY2VpdmVyKTsgfSB9IGVsc2UgaWYgKFwidmFsdWVcIiBpbiBkZXNjKSB7IHJldHVybiBkZXNjLnZhbHVlOyB9IGVsc2UgeyB2YXIgZ2V0dGVyID0gZGVzYy5nZXQ7IGlmIChnZXR0ZXIgPT09IHVuZGVmaW5lZCkgeyByZXR1cm4gdW5kZWZpbmVkOyB9IHJldHVybiBnZXR0ZXIuY2FsbChyZWNlaXZlcik7IH0gfTtcblxuZnVuY3Rpb24gX2NsYXNzQ2FsbENoZWNrKGluc3RhbmNlLCBDb25zdHJ1Y3RvcikgeyBpZiAoIShpbnN0YW5jZSBpbnN0YW5jZW9mIENvbnN0cnVjdG9yKSkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiQ2Fubm90IGNhbGwgYSBjbGFzcyBhcyBhIGZ1bmN0aW9uXCIpOyB9IH1cblxuZnVuY3Rpb24gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4oc2VsZiwgY2FsbCkgeyBpZiAoIXNlbGYpIHsgdGhyb3cgbmV3IFJlZmVyZW5jZUVycm9yKFwidGhpcyBoYXNuJ3QgYmVlbiBpbml0aWFsaXNlZCAtIHN1cGVyKCkgaGFzbid0IGJlZW4gY2FsbGVkXCIpOyB9IHJldHVybiBjYWxsICYmICh0eXBlb2YgY2FsbCA9PT0gXCJvYmplY3RcIiB8fCB0eXBlb2YgY2FsbCA9PT0gXCJmdW5jdGlvblwiKSA/IGNhbGwgOiBzZWxmOyB9XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykgeyBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJTdXBlciBleHByZXNzaW9uIG11c3QgZWl0aGVyIGJlIG51bGwgb3IgYSBmdW5jdGlvbiwgbm90IFwiICsgdHlwZW9mIHN1cGVyQ2xhc3MpOyB9IHN1YkNsYXNzLnByb3RvdHlwZSA9IE9iamVjdC5jcmVhdGUoc3VwZXJDbGFzcyAmJiBzdXBlckNsYXNzLnByb3RvdHlwZSwgeyBjb25zdHJ1Y3RvcjogeyB2YWx1ZTogc3ViQ2xhc3MsIGVudW1lcmFibGU6IGZhbHNlLCB3cml0YWJsZTogdHJ1ZSwgY29uZmlndXJhYmxlOiB0cnVlIH0gfSk7IGlmIChzdXBlckNsYXNzKSBPYmplY3Quc2V0UHJvdG90eXBlT2YgPyBPYmplY3Quc2V0UHJvdG90eXBlT2Yoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIDogc3ViQ2xhc3MuX19wcm90b19fID0gc3VwZXJDbGFzczsgfVxuXG4vKipcclxuICogQGZpbGUgY2FtZXJhLWJ1dHRvbi5qc1xyXG4gKiBAc2luY2UgMi4wLjBcclxuICovXG5cbnZhciBCdXR0b24gPSB2aWRlb2pzLmdldENvbXBvbmVudCgnQnV0dG9uJyk7XG52YXIgQ29tcG9uZW50ID0gdmlkZW9qcy5nZXRDb21wb25lbnQoJ0NvbXBvbmVudCcpO1xuXG4vKipcclxuICogQnV0dG9uIHRvIHRvZ2dsZSBiZXR3ZWVuIGNyZWF0ZSBhbmQgcmV0cnkgc25hcHNob3QgaW1hZ2UuXHJcbiAqXHJcbiAqIEBjbGFzc1xyXG4gKiBAYXVnbWVudHMgdmlkZW9qcy5CdXR0b25cclxuKi9cblxudmFyIENhbWVyYUJ1dHRvbiA9IGZ1bmN0aW9uIChfQnV0dG9uKSB7XG4gICAgX2luaGVyaXRzKENhbWVyYUJ1dHRvbiwgX0J1dHRvbik7XG5cbiAgICBmdW5jdGlvbiBDYW1lcmFCdXR0b24oKSB7XG4gICAgICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBDYW1lcmFCdXR0b24pO1xuXG4gICAgICAgIHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCAoQ2FtZXJhQnV0dG9uLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoQ2FtZXJhQnV0dG9uKSkuYXBwbHkodGhpcywgYXJndW1lbnRzKSk7XG4gICAgfVxuXG4gICAgX2NyZWF0ZUNsYXNzKENhbWVyYUJ1dHRvbiwgW3tcbiAgICAgICAga2V5OiAnYnVpbGRDU1NDbGFzcycsXG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogQnVpbGRzIHRoZSBkZWZhdWx0IERPTSBgY2xhc3NOYW1lYC5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEByZXR1cm4ge3N0cmluZ31cclxuICAgICAgICAgKiAgICAgICAgIFRoZSBET00gYGNsYXNzTmFtZWAgZm9yIHRoaXMgb2JqZWN0LlxyXG4gICAgICAgICAqL1xuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gYnVpbGRDU1NDbGFzcygpIHtcbiAgICAgICAgICAgIHJldHVybiAndmpzLWNhbWVyYS1idXR0b24gdmpzLWNvbnRyb2wgdmpzLWJ1dHRvbiB2anMtaWNvbi1waG90by1jYW1lcmEnO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogRW5hYmxlIHRoZSBgQ2FtZXJhQnV0dG9uYCBlbGVtZW50IHNvIHRoYXQgaXQgY2FuIGJlIGFjdGl2YXRlZCBvciBjbGlja2VkLlxyXG4gICAgICAgICAqL1xuXG4gICAgfSwge1xuICAgICAgICBrZXk6ICdlbmFibGUnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gZW5hYmxlKCkge1xuICAgICAgICAgICAgX2dldChDYW1lcmFCdXR0b24ucHJvdG90eXBlLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoQ2FtZXJhQnV0dG9uLnByb3RvdHlwZSksICdlbmFibGUnLCB0aGlzKS5jYWxsKHRoaXMpO1xuXG4gICAgICAgICAgICB0aGlzLm9uKHRoaXMucGxheWVyXywgJ3N0YXJ0UmVjb3JkJywgdGhpcy5vblN0YXJ0KTtcbiAgICAgICAgICAgIHRoaXMub24odGhpcy5wbGF5ZXJfLCAnc3RvcFJlY29yZCcsIHRoaXMub25TdG9wKTtcbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIERpc2FibGUgdGhlIGBDYW1lcmFCdXR0b25gIGVsZW1lbnQgc28gdGhhdCBpdCBjYW5ub3QgYmUgYWN0aXZhdGVkIG9yIGNsaWNrZWQuXHJcbiAgICAgICAgICovXG5cbiAgICB9LCB7XG4gICAgICAgIGtleTogJ2Rpc2FibGUnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gZGlzYWJsZSgpIHtcbiAgICAgICAgICAgIF9nZXQoQ2FtZXJhQnV0dG9uLnByb3RvdHlwZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKENhbWVyYUJ1dHRvbi5wcm90b3R5cGUpLCAnZGlzYWJsZScsIHRoaXMpLmNhbGwodGhpcyk7XG5cbiAgICAgICAgICAgIHRoaXMub2ZmKHRoaXMucGxheWVyXywgJ3N0YXJ0UmVjb3JkJywgdGhpcy5vblN0YXJ0KTtcbiAgICAgICAgICAgIHRoaXMub2ZmKHRoaXMucGxheWVyXywgJ3N0b3BSZWNvcmQnLCB0aGlzLm9uU3RvcCk7XG4gICAgICAgIH1cblxuICAgICAgICAvKipcclxuICAgICAgICAgKiBUaGlzIGdldHMgY2FsbGVkIHdoZW4gdGhlIGJ1dHRvbiBpcyBjbGlja2VkLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQHBhcmFtIHtFdmVudFRhcmdldH5FdmVudH0gZXZlbnRcclxuICAgICAgICAgKiAgICAgICAgVGhlIGB0YXBgIG9yIGBjbGlja2AgZXZlbnQgdGhhdCBjYXVzZWQgdGhpcyBmdW5jdGlvbiB0byBiZVxyXG4gICAgICAgICAqICAgICAgICBjYWxsZWQuXHJcbiAgICAgICAgICpcclxuICAgICAgICAgKiBAbGlzdGVucyB0YXBcclxuICAgICAgICAgKiBAbGlzdGVucyBjbGlja1xyXG4gICAgICAgICAqL1xuXG4gICAgfSwge1xuICAgICAgICBrZXk6ICdoYW5kbGVDbGljaycsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBoYW5kbGVDbGljayhldmVudCkge1xuICAgICAgICAgICAgdmFyIHJlY29yZGVyID0gdGhpcy5wbGF5ZXJfLnJlY29yZCgpO1xuXG4gICAgICAgICAgICBpZiAoIXJlY29yZGVyLmlzUHJvY2Vzc2luZygpKSB7XG4gICAgICAgICAgICAgICAgLy8gY3JlYXRlIHNuYXBzaG90XG4gICAgICAgICAgICAgICAgcmVjb3JkZXIuc3RhcnQoKTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgLy8gcmV0cnlcbiAgICAgICAgICAgICAgICByZWNvcmRlci5yZXRyeVNuYXBzaG90KCk7XG5cbiAgICAgICAgICAgICAgICAvLyByZXNldCBjYW1lcmEgYnV0dG9uXG4gICAgICAgICAgICAgICAgdGhpcy5vblN0b3AoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEFkZCB0aGUgdmpzLWljb24tcmVwbGF5IGNsYXNzIHRvIHRoZSBlbGVtZW50IHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZS5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEBwYXJhbSB7RXZlbnRUYXJnZXR+RXZlbnR9IFtldmVudF1cclxuICAgICAgICAgKiAgICAgICAgVGhlIGV2ZW50IHRoYXQgY2F1c2VkIHRoaXMgZnVuY3Rpb24gdG8gcnVuLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQGxpc3RlbnMgUGxheWVyI3N0YXJ0UmVjb3JkXHJcbiAgICAgICAgICovXG5cbiAgICB9LCB7XG4gICAgICAgIGtleTogJ29uU3RhcnQnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gb25TdGFydChldmVudCkge1xuICAgICAgICAgICAgLy8gcmVwbGFjZSBlbGVtZW50IGNsYXNzIHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZVxuICAgICAgICAgICAgdGhpcy5yZW1vdmVDbGFzcygndmpzLWljb24tcGhvdG8tY2FtZXJhJyk7XG4gICAgICAgICAgICB0aGlzLmFkZENsYXNzKCd2anMtaWNvbi1yZXBsYXknKTtcblxuICAgICAgICAgICAgLy8gY2hhbmdlIHRoZSBidXR0b24gdGV4dFxuICAgICAgICAgICAgdGhpcy5jb250cm9sVGV4dCgnUmV0cnknKTtcbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEFkZCB0aGUgdmpzLWljb24tcGhvdG8tY2FtZXJhIGNsYXNzIHRvIHRoZSBlbGVtZW50IHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZS5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEBwYXJhbSB7RXZlbnRUYXJnZXR+RXZlbnR9IFtldmVudF1cclxuICAgICAgICAgKiAgICAgICAgVGhlIGV2ZW50IHRoYXQgY2F1c2VkIHRoaXMgZnVuY3Rpb24gdG8gcnVuLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQGxpc3RlbnMgUGxheWVyI3N0b3BSZWNvcmRcclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnb25TdG9wJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIG9uU3RvcChldmVudCkge1xuICAgICAgICAgICAgLy8gcmVwbGFjZSBlbGVtZW50IGNsYXNzIHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZVxuICAgICAgICAgICAgdGhpcy5yZW1vdmVDbGFzcygndmpzLWljb24tcmVwbGF5Jyk7XG4gICAgICAgICAgICB0aGlzLmFkZENsYXNzKCd2anMtaWNvbi1waG90by1jYW1lcmEnKTtcblxuICAgICAgICAgICAgLy8gY2hhbmdlIHRoZSBidXR0b24gdGV4dFxuICAgICAgICAgICAgdGhpcy5jb250cm9sVGV4dCgnSW1hZ2UnKTtcbiAgICAgICAgfVxuICAgIH1dKTtcblxuICAgIHJldHVybiBDYW1lcmFCdXR0b247XG59KEJ1dHRvbik7XG5cbi8qKlxyXG4gKiBUaGUgdGV4dCB0aGF0IHNob3VsZCBkaXNwbGF5IG92ZXIgdGhlIGBDYW1lcmFCdXR0b25gcyBjb250cm9scy4gQWRkZWQgZm9yIGxvY2FsaXphdGlvbi5cclxuICpcclxuICogQHR5cGUge3N0cmluZ31cclxuICogQHByaXZhdGVcclxuICovXG5cblxuQ2FtZXJhQnV0dG9uLnByb3RvdHlwZS5jb250cm9sVGV4dF8gPSAnSW1hZ2UnO1xuXG5Db21wb25lbnQucmVnaXN0ZXJDb21wb25lbnQoJ0NhbWVyYUJ1dHRvbicsIENhbWVyYUJ1dHRvbik7XG5cbmV4cG9ydHMuZGVmYXVsdCA9IENhbWVyYUJ1dHRvbjsiLCIndXNlIHN0cmljdCc7XG5cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBcIl9fZXNNb2R1bGVcIiwge1xuICB2YWx1ZTogdHJ1ZVxufSk7XG5cbnZhciBfY3JlYXRlQ2xhc3MgPSBmdW5jdGlvbiAoKSB7IGZ1bmN0aW9uIGRlZmluZVByb3BlcnRpZXModGFyZ2V0LCBwcm9wcykgeyBmb3IgKHZhciBpID0gMDsgaSA8IHByb3BzLmxlbmd0aDsgaSsrKSB7IHZhciBkZXNjcmlwdG9yID0gcHJvcHNbaV07IGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTsgZGVzY3JpcHRvci5jb25maWd1cmFibGUgPSB0cnVlOyBpZiAoXCJ2YWx1ZVwiIGluIGRlc2NyaXB0b3IpIGRlc2NyaXB0b3Iud3JpdGFibGUgPSB0cnVlOyBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7IH0gfSByZXR1cm4gZnVuY3Rpb24gKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykgeyBpZiAocHJvdG9Qcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvci5wcm90b3R5cGUsIHByb3RvUHJvcHMpOyBpZiAoc3RhdGljUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9OyB9KCk7XG5cbmZ1bmN0aW9uIF9jbGFzc0NhbGxDaGVjayhpbnN0YW5jZSwgQ29uc3RydWN0b3IpIHsgaWYgKCEoaW5zdGFuY2UgaW5zdGFuY2VvZiBDb25zdHJ1Y3RvcikpIHsgdGhyb3cgbmV3IFR5cGVFcnJvcihcIkNhbm5vdCBjYWxsIGEgY2xhc3MgYXMgYSBmdW5jdGlvblwiKTsgfSB9XG5cbmZ1bmN0aW9uIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHNlbGYsIGNhbGwpIHsgaWYgKCFzZWxmKSB7IHRocm93IG5ldyBSZWZlcmVuY2VFcnJvcihcInRoaXMgaGFzbid0IGJlZW4gaW5pdGlhbGlzZWQgLSBzdXBlcigpIGhhc24ndCBiZWVuIGNhbGxlZFwiKTsgfSByZXR1cm4gY2FsbCAmJiAodHlwZW9mIGNhbGwgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikgPyBjYWxsIDogc2VsZjsgfVxuXG5mdW5jdGlvbiBfaW5oZXJpdHMoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIHsgaWYgKHR5cGVvZiBzdXBlckNsYXNzICE9PSBcImZ1bmN0aW9uXCIgJiYgc3VwZXJDbGFzcyAhPT0gbnVsbCkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiU3VwZXIgZXhwcmVzc2lvbiBtdXN0IGVpdGhlciBiZSBudWxsIG9yIGEgZnVuY3Rpb24sIG5vdCBcIiArIHR5cGVvZiBzdXBlckNsYXNzKTsgfSBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MgJiYgc3VwZXJDbGFzcy5wcm90b3R5cGUsIHsgY29uc3RydWN0b3I6IHsgdmFsdWU6IHN1YkNsYXNzLCBlbnVtZXJhYmxlOiBmYWxzZSwgd3JpdGFibGU6IHRydWUsIGNvbmZpZ3VyYWJsZTogdHJ1ZSB9IH0pOyBpZiAoc3VwZXJDbGFzcykgT2JqZWN0LnNldFByb3RvdHlwZU9mID8gT2JqZWN0LnNldFByb3RvdHlwZU9mKHN1YkNsYXNzLCBzdXBlckNsYXNzKSA6IHN1YkNsYXNzLl9fcHJvdG9fXyA9IHN1cGVyQ2xhc3M7IH1cblxuLyoqXHJcbiAqIEBmaWxlIGRldmljZS1idXR0b24uanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG52YXIgQnV0dG9uID0gdmlkZW9qcy5nZXRDb21wb25lbnQoJ0J1dHRvbicpO1xudmFyIENvbXBvbmVudCA9IHZpZGVvanMuZ2V0Q29tcG9uZW50KCdDb21wb25lbnQnKTtcblxuLyoqXHJcbiAqIEJ1dHRvbiB0byBzZWxlY3QgcmVjb3JkaW5nIGRldmljZS5cclxuICpcclxuICogQGNsYXNzXHJcbiAqIEBhdWdtZW50cyB2aWRlb2pzLkJ1dHRvblxyXG4qL1xuXG52YXIgRGV2aWNlQnV0dG9uID0gZnVuY3Rpb24gKF9CdXR0b24pIHtcbiAgX2luaGVyaXRzKERldmljZUJ1dHRvbiwgX0J1dHRvbik7XG5cbiAgZnVuY3Rpb24gRGV2aWNlQnV0dG9uKCkge1xuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBEZXZpY2VCdXR0b24pO1xuXG4gICAgcmV0dXJuIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHRoaXMsIChEZXZpY2VCdXR0b24uX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihEZXZpY2VCdXR0b24pKS5hcHBseSh0aGlzLCBhcmd1bWVudHMpKTtcbiAgfVxuXG4gIF9jcmVhdGVDbGFzcyhEZXZpY2VCdXR0b24sIFt7XG4gICAga2V5OiAnaGFuZGxlQ2xpY2snLFxuXG4gICAgLyoqXHJcbiAgICAgKiBUaGlzIGdldHMgY2FsbGVkIHdoZW4gdGhpcyBidXR0b24gZ2V0czpcclxuICAgICAqXHJcbiAgICAgKiAtIENsaWNrZWQgKHZpYSB0aGUgYGNsaWNrYCBldmVudCwgbGlzdGVuaW5nIHN0YXJ0cyBpbiB0aGUgY29uc3RydWN0b3IpXHJcbiAgICAgKiAtIFRhcHBlZCAodmlhIHRoZSBgdGFwYCBldmVudCwgbGlzdGVuaW5nIHN0YXJ0cyBpbiB0aGUgY29uc3RydWN0b3IpXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtIHtFdmVudFRhcmdldH5FdmVudH0gZXZlbnRcclxuICAgICAqICAgICAgICBUaGUgYGtleWRvd25gLCBgdGFwYCwgb3IgYGNsaWNrYCBldmVudCB0aGF0IGNhdXNlZCB0aGlzIGZ1bmN0aW9uIHRvIGJlXHJcbiAgICAgKiAgICAgICAgY2FsbGVkLlxyXG4gICAgICpcclxuICAgICAqIEBsaXN0ZW5zIHRhcFxyXG4gICAgICogQGxpc3RlbnMgY2xpY2tcclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiBoYW5kbGVDbGljayhldmVudCkge1xuICAgICAgLy8gb3BlbiBkZXZpY2UgZGlhbG9nXG4gICAgICB0aGlzLnBsYXllcl8ucmVjb3JkKCkuZ2V0RGV2aWNlKCk7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIERldmljZUJ1dHRvbjtcbn0oQnV0dG9uKTtcblxuLyoqXHJcbiAqIFRoZSB0ZXh0IHRoYXQgc2hvdWxkIGRpc3BsYXkgb3ZlciB0aGUgYERldmljZUJ1dHRvbmBzIGNvbnRyb2xzLiBBZGRlZCBmb3IgbG9jYWxpemF0aW9uLlxyXG4gKlxyXG4gKiBAdHlwZSB7c3RyaW5nfVxyXG4gKiBAcHJpdmF0ZVxyXG4gKi9cblxuXG5EZXZpY2VCdXR0b24ucHJvdG90eXBlLmNvbnRyb2xUZXh0XyA9ICdEZXZpY2UnO1xuXG5Db21wb25lbnQucmVnaXN0ZXJDb21wb25lbnQoJ0RldmljZUJ1dHRvbicsIERldmljZUJ1dHRvbik7XG5cbmV4cG9ydHMuZGVmYXVsdCA9IERldmljZUJ1dHRvbjsiLCIndXNlIHN0cmljdCc7XG5cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBcIl9fZXNNb2R1bGVcIiwge1xuICB2YWx1ZTogdHJ1ZVxufSk7XG5cbnZhciBfY3JlYXRlQ2xhc3MgPSBmdW5jdGlvbiAoKSB7IGZ1bmN0aW9uIGRlZmluZVByb3BlcnRpZXModGFyZ2V0LCBwcm9wcykgeyBmb3IgKHZhciBpID0gMDsgaSA8IHByb3BzLmxlbmd0aDsgaSsrKSB7IHZhciBkZXNjcmlwdG9yID0gcHJvcHNbaV07IGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTsgZGVzY3JpcHRvci5jb25maWd1cmFibGUgPSB0cnVlOyBpZiAoXCJ2YWx1ZVwiIGluIGRlc2NyaXB0b3IpIGRlc2NyaXB0b3Iud3JpdGFibGUgPSB0cnVlOyBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7IH0gfSByZXR1cm4gZnVuY3Rpb24gKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykgeyBpZiAocHJvdG9Qcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvci5wcm90b3R5cGUsIHByb3RvUHJvcHMpOyBpZiAoc3RhdGljUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9OyB9KCk7XG5cbnZhciBfZ2V0ID0gZnVuY3Rpb24gZ2V0KG9iamVjdCwgcHJvcGVydHksIHJlY2VpdmVyKSB7IGlmIChvYmplY3QgPT09IG51bGwpIG9iamVjdCA9IEZ1bmN0aW9uLnByb3RvdHlwZTsgdmFyIGRlc2MgPSBPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yKG9iamVjdCwgcHJvcGVydHkpOyBpZiAoZGVzYyA9PT0gdW5kZWZpbmVkKSB7IHZhciBwYXJlbnQgPSBPYmplY3QuZ2V0UHJvdG90eXBlT2Yob2JqZWN0KTsgaWYgKHBhcmVudCA9PT0gbnVsbCkgeyByZXR1cm4gdW5kZWZpbmVkOyB9IGVsc2UgeyByZXR1cm4gZ2V0KHBhcmVudCwgcHJvcGVydHksIHJlY2VpdmVyKTsgfSB9IGVsc2UgaWYgKFwidmFsdWVcIiBpbiBkZXNjKSB7IHJldHVybiBkZXNjLnZhbHVlOyB9IGVsc2UgeyB2YXIgZ2V0dGVyID0gZGVzYy5nZXQ7IGlmIChnZXR0ZXIgPT09IHVuZGVmaW5lZCkgeyByZXR1cm4gdW5kZWZpbmVkOyB9IHJldHVybiBnZXR0ZXIuY2FsbChyZWNlaXZlcik7IH0gfTtcblxuZnVuY3Rpb24gX2NsYXNzQ2FsbENoZWNrKGluc3RhbmNlLCBDb25zdHJ1Y3RvcikgeyBpZiAoIShpbnN0YW5jZSBpbnN0YW5jZW9mIENvbnN0cnVjdG9yKSkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiQ2Fubm90IGNhbGwgYSBjbGFzcyBhcyBhIGZ1bmN0aW9uXCIpOyB9IH1cblxuZnVuY3Rpb24gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4oc2VsZiwgY2FsbCkgeyBpZiAoIXNlbGYpIHsgdGhyb3cgbmV3IFJlZmVyZW5jZUVycm9yKFwidGhpcyBoYXNuJ3QgYmVlbiBpbml0aWFsaXNlZCAtIHN1cGVyKCkgaGFzbid0IGJlZW4gY2FsbGVkXCIpOyB9IHJldHVybiBjYWxsICYmICh0eXBlb2YgY2FsbCA9PT0gXCJvYmplY3RcIiB8fCB0eXBlb2YgY2FsbCA9PT0gXCJmdW5jdGlvblwiKSA/IGNhbGwgOiBzZWxmOyB9XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykgeyBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJTdXBlciBleHByZXNzaW9uIG11c3QgZWl0aGVyIGJlIG51bGwgb3IgYSBmdW5jdGlvbiwgbm90IFwiICsgdHlwZW9mIHN1cGVyQ2xhc3MpOyB9IHN1YkNsYXNzLnByb3RvdHlwZSA9IE9iamVjdC5jcmVhdGUoc3VwZXJDbGFzcyAmJiBzdXBlckNsYXNzLnByb3RvdHlwZSwgeyBjb25zdHJ1Y3RvcjogeyB2YWx1ZTogc3ViQ2xhc3MsIGVudW1lcmFibGU6IGZhbHNlLCB3cml0YWJsZTogdHJ1ZSwgY29uZmlndXJhYmxlOiB0cnVlIH0gfSk7IGlmIChzdXBlckNsYXNzKSBPYmplY3Quc2V0UHJvdG90eXBlT2YgPyBPYmplY3Quc2V0UHJvdG90eXBlT2Yoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIDogc3ViQ2xhc3MuX19wcm90b19fID0gc3VwZXJDbGFzczsgfVxuXG4vKipcclxuICogQGZpbGUgcmVjb3JkLWNhbnZhc1xyXG4gKiBAc2luY2UgMi4wLjBcclxuICovXG5cbnZhciBDb21wb25lbnQgPSB2aWRlb2pzLmdldENvbXBvbmVudCgnQ29tcG9uZW50Jyk7XG5cbi8qKlxyXG4gKiBDYW52YXMgZm9yIGRpc3BsYXlpbmcgc25hcHNob3QgaW1hZ2UuXHJcbiAqXHJcbiAqIEBjbGFzc1xyXG4gKiBAYXVnbWVudHMgdmlkZW9qcy5Db21wb25lbnRcclxuKi9cblxudmFyIFJlY29yZENhbnZhcyA9IGZ1bmN0aW9uIChfQ29tcG9uZW50KSB7XG4gIF9pbmhlcml0cyhSZWNvcmRDYW52YXMsIF9Db21wb25lbnQpO1xuXG4gIGZ1bmN0aW9uIFJlY29yZENhbnZhcygpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgUmVjb3JkQ2FudmFzKTtcblxuICAgIHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCAoUmVjb3JkQ2FudmFzLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoUmVjb3JkQ2FudmFzKSkuYXBwbHkodGhpcywgYXJndW1lbnRzKSk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoUmVjb3JkQ2FudmFzLCBbe1xuICAgIGtleTogJ2NyZWF0ZUVsJyxcblxuXG4gICAgLyoqXHJcbiAgICAgKiBDcmVhdGUgdGhlIGBSZWNvcmRDYW52YXNgcyBET00gZWxlbWVudC5cclxuICAgICAqXHJcbiAgICAgKiBAcmV0dXJuIHtFbGVtZW50fVxyXG4gICAgICogICAgICAgICBUaGUgZG9tIGVsZW1lbnQgdGhhdCBnZXRzIGNyZWF0ZWQuXHJcbiAgICAgKi9cbiAgICB2YWx1ZTogZnVuY3Rpb24gY3JlYXRlRWwoKSB7XG4gICAgICByZXR1cm4gX2dldChSZWNvcmRDYW52YXMucHJvdG90eXBlLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoUmVjb3JkQ2FudmFzLnByb3RvdHlwZSksICdjcmVhdGVFbCcsIHRoaXMpLmNhbGwodGhpcywgJ2RpdicsIHtcbiAgICAgICAgY2xhc3NOYW1lOiAndmpzLXJlY29yZC1jYW52YXMnLFxuICAgICAgICBpbm5lckhUTUw6ICc8Y2FudmFzPjwvY2FudmFzPidcbiAgICAgIH0pO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBSZWNvcmRDYW52YXM7XG59KENvbXBvbmVudCk7XG5cbkNvbXBvbmVudC5yZWdpc3RlckNvbXBvbmVudCgnUmVjb3JkQ2FudmFzJywgUmVjb3JkQ2FudmFzKTtcblxuZXhwb3J0cy5kZWZhdWx0ID0gUmVjb3JkQ2FudmFzOyIsIid1c2Ugc3RyaWN0JztcblxuT2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFwiX19lc01vZHVsZVwiLCB7XG4gICAgdmFsdWU6IHRydWVcbn0pO1xuXG52YXIgX2NyZWF0ZUNsYXNzID0gZnVuY3Rpb24gKCkgeyBmdW5jdGlvbiBkZWZpbmVQcm9wZXJ0aWVzKHRhcmdldCwgcHJvcHMpIHsgZm9yICh2YXIgaSA9IDA7IGkgPCBwcm9wcy5sZW5ndGg7IGkrKykgeyB2YXIgZGVzY3JpcHRvciA9IHByb3BzW2ldOyBkZXNjcmlwdG9yLmVudW1lcmFibGUgPSBkZXNjcmlwdG9yLmVudW1lcmFibGUgfHwgZmFsc2U7IGRlc2NyaXB0b3IuY29uZmlndXJhYmxlID0gdHJ1ZTsgaWYgKFwidmFsdWVcIiBpbiBkZXNjcmlwdG9yKSBkZXNjcmlwdG9yLndyaXRhYmxlID0gdHJ1ZTsgT2JqZWN0LmRlZmluZVByb3BlcnR5KHRhcmdldCwgZGVzY3JpcHRvci5rZXksIGRlc2NyaXB0b3IpOyB9IH0gcmV0dXJuIGZ1bmN0aW9uIChDb25zdHJ1Y3RvciwgcHJvdG9Qcm9wcywgc3RhdGljUHJvcHMpIHsgaWYgKHByb3RvUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IucHJvdG90eXBlLCBwcm90b1Byb3BzKTsgaWYgKHN0YXRpY1Byb3BzKSBkZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLCBzdGF0aWNQcm9wcyk7IHJldHVybiBDb25zdHJ1Y3RvcjsgfTsgfSgpO1xuXG52YXIgX2dldCA9IGZ1bmN0aW9uIGdldChvYmplY3QsIHByb3BlcnR5LCByZWNlaXZlcikgeyBpZiAob2JqZWN0ID09PSBudWxsKSBvYmplY3QgPSBGdW5jdGlvbi5wcm90b3R5cGU7IHZhciBkZXNjID0gT2JqZWN0LmdldE93blByb3BlcnR5RGVzY3JpcHRvcihvYmplY3QsIHByb3BlcnR5KTsgaWYgKGRlc2MgPT09IHVuZGVmaW5lZCkgeyB2YXIgcGFyZW50ID0gT2JqZWN0LmdldFByb3RvdHlwZU9mKG9iamVjdCk7IGlmIChwYXJlbnQgPT09IG51bGwpIHsgcmV0dXJuIHVuZGVmaW5lZDsgfSBlbHNlIHsgcmV0dXJuIGdldChwYXJlbnQsIHByb3BlcnR5LCByZWNlaXZlcik7IH0gfSBlbHNlIGlmIChcInZhbHVlXCIgaW4gZGVzYykgeyByZXR1cm4gZGVzYy52YWx1ZTsgfSBlbHNlIHsgdmFyIGdldHRlciA9IGRlc2MuZ2V0OyBpZiAoZ2V0dGVyID09PSB1bmRlZmluZWQpIHsgcmV0dXJuIHVuZGVmaW5lZDsgfSByZXR1cm4gZ2V0dGVyLmNhbGwocmVjZWl2ZXIpOyB9IH07XG5cbmZ1bmN0aW9uIF9jbGFzc0NhbGxDaGVjayhpbnN0YW5jZSwgQ29uc3RydWN0b3IpIHsgaWYgKCEoaW5zdGFuY2UgaW5zdGFuY2VvZiBDb25zdHJ1Y3RvcikpIHsgdGhyb3cgbmV3IFR5cGVFcnJvcihcIkNhbm5vdCBjYWxsIGEgY2xhc3MgYXMgYSBmdW5jdGlvblwiKTsgfSB9XG5cbmZ1bmN0aW9uIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHNlbGYsIGNhbGwpIHsgaWYgKCFzZWxmKSB7IHRocm93IG5ldyBSZWZlcmVuY2VFcnJvcihcInRoaXMgaGFzbid0IGJlZW4gaW5pdGlhbGlzZWQgLSBzdXBlcigpIGhhc24ndCBiZWVuIGNhbGxlZFwiKTsgfSByZXR1cm4gY2FsbCAmJiAodHlwZW9mIGNhbGwgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikgPyBjYWxsIDogc2VsZjsgfVxuXG5mdW5jdGlvbiBfaW5oZXJpdHMoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIHsgaWYgKHR5cGVvZiBzdXBlckNsYXNzICE9PSBcImZ1bmN0aW9uXCIgJiYgc3VwZXJDbGFzcyAhPT0gbnVsbCkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiU3VwZXIgZXhwcmVzc2lvbiBtdXN0IGVpdGhlciBiZSBudWxsIG9yIGEgZnVuY3Rpb24sIG5vdCBcIiArIHR5cGVvZiBzdXBlckNsYXNzKTsgfSBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MgJiYgc3VwZXJDbGFzcy5wcm90b3R5cGUsIHsgY29uc3RydWN0b3I6IHsgdmFsdWU6IHN1YkNsYXNzLCBlbnVtZXJhYmxlOiBmYWxzZSwgd3JpdGFibGU6IHRydWUsIGNvbmZpZ3VyYWJsZTogdHJ1ZSB9IH0pOyBpZiAoc3VwZXJDbGFzcykgT2JqZWN0LnNldFByb3RvdHlwZU9mID8gT2JqZWN0LnNldFByb3RvdHlwZU9mKHN1YkNsYXNzLCBzdXBlckNsYXNzKSA6IHN1YkNsYXNzLl9fcHJvdG9fXyA9IHN1cGVyQ2xhc3M7IH1cblxuLyoqXHJcbiAqIEBmaWxlIHJlY29yZC1pbmRpY2F0b3IuanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG52YXIgQ29tcG9uZW50ID0gdmlkZW9qcy5nZXRDb21wb25lbnQoJ0NvbXBvbmVudCcpO1xuXG4vKipcclxuICogSWNvbiBpbmRpY2F0aW5nIHJlY29yZGluZyBpcyBhY3RpdmUuXHJcbiAqXHJcbiAqIEBjbGFzc1xyXG4gKiBAYXVnbWVudHMgdmlkZW9qcy5Db21wb25lbnRcclxuKi9cblxudmFyIFJlY29yZEluZGljYXRvciA9IGZ1bmN0aW9uIChfQ29tcG9uZW50KSB7XG4gICAgX2luaGVyaXRzKFJlY29yZEluZGljYXRvciwgX0NvbXBvbmVudCk7XG5cbiAgICAvKipcclxuICAgICAqIFRoZSBjb25zdHJ1Y3RvciBmdW5jdGlvbiBmb3IgdGhlIGNsYXNzLlxyXG4gICAgICpcclxuICAgICAqIEBwcml2YXRlXHJcbiAgICAgKiBAcGFyYW0geyh2aWRlb2pzLlBsYXllcnxPYmplY3QpfSBwbGF5ZXIgLSBWaWRlby5qcyBwbGF5ZXIgaW5zdGFuY2UuXHJcbiAgICAgKiBAcGFyYW0ge09iamVjdH0gb3B0aW9ucyAtIFBsYXllciBvcHRpb25zLlxyXG4gICAgICovXG4gICAgZnVuY3Rpb24gUmVjb3JkSW5kaWNhdG9yKHBsYXllciwgb3B0aW9ucykge1xuICAgICAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgUmVjb3JkSW5kaWNhdG9yKTtcblxuICAgICAgICB2YXIgX3RoaXMgPSBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCAoUmVjb3JkSW5kaWNhdG9yLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoUmVjb3JkSW5kaWNhdG9yKSkuY2FsbCh0aGlzLCBwbGF5ZXIsIG9wdGlvbnMpKTtcblxuICAgICAgICBfdGhpcy5lbmFibGUoKTtcbiAgICAgICAgcmV0dXJuIF90aGlzO1xuICAgIH1cblxuICAgIC8qKlxyXG4gICAgICogQ3JlYXRlIHRoZSBgUmVjb3JkSW5kaWNhdG9yYHMgRE9NIGVsZW1lbnQuXHJcbiAgICAgKlxyXG4gICAgICogQHJldHVybiB7RWxlbWVudH1cclxuICAgICAqICAgICAgICAgVGhlIGRvbSBlbGVtZW50IHRoYXQgZ2V0cyBjcmVhdGVkLlxyXG4gICAgICovXG5cblxuICAgIF9jcmVhdGVDbGFzcyhSZWNvcmRJbmRpY2F0b3IsIFt7XG4gICAgICAgIGtleTogJ2NyZWF0ZUVsJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIGNyZWF0ZUVsKCkge1xuICAgICAgICAgICAgcmV0dXJuIF9nZXQoUmVjb3JkSW5kaWNhdG9yLnByb3RvdHlwZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKFJlY29yZEluZGljYXRvci5wcm90b3R5cGUpLCAnY3JlYXRlRWwnLCB0aGlzKS5jYWxsKHRoaXMsICdkaXYnLCB7XG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAndmpzLXJlY29yZC1pbmRpY2F0b3IgdmpzLWNvbnRyb2wnLFxuICAgICAgICAgICAgICAgIGRpcjogJ2x0cidcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogRW5hYmxlIGV2ZW50IGhhbmRsZXJzLlxyXG4gICAgICAgICAqL1xuXG4gICAgfSwge1xuICAgICAgICBrZXk6ICdlbmFibGUnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gZW5hYmxlKCkge1xuICAgICAgICAgICAgdGhpcy5vbih0aGlzLnBsYXllcl8sICdzdGFydFJlY29yZCcsIHRoaXMuc2hvdyk7XG4gICAgICAgICAgICB0aGlzLm9uKHRoaXMucGxheWVyXywgJ3N0b3BSZWNvcmQnLCB0aGlzLmhpZGUpO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogRGlzYWJsZSBldmVudCBoYW5kbGVycy5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnZGlzYWJsZScsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBkaXNhYmxlKCkge1xuICAgICAgICAgICAgdGhpcy5vZmYodGhpcy5wbGF5ZXJfLCAnc3RhcnRSZWNvcmQnLCB0aGlzLnNob3cpO1xuICAgICAgICAgICAgdGhpcy5vZmYodGhpcy5wbGF5ZXJfLCAnc3RvcFJlY29yZCcsIHRoaXMuaGlkZSk7XG4gICAgICAgIH1cbiAgICB9XSk7XG5cbiAgICByZXR1cm4gUmVjb3JkSW5kaWNhdG9yO1xufShDb21wb25lbnQpO1xuXG5Db21wb25lbnQucmVnaXN0ZXJDb21wb25lbnQoJ1JlY29yZEluZGljYXRvcicsIFJlY29yZEluZGljYXRvcik7XG5cbmV4cG9ydHMuZGVmYXVsdCA9IFJlY29yZEluZGljYXRvcjsiLCIndXNlIHN0cmljdCc7XG5cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBcIl9fZXNNb2R1bGVcIiwge1xuICAgIHZhbHVlOiB0cnVlXG59KTtcblxudmFyIF9jcmVhdGVDbGFzcyA9IGZ1bmN0aW9uICgpIHsgZnVuY3Rpb24gZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7IGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHsgdmFyIGRlc2NyaXB0b3IgPSBwcm9wc1tpXTsgZGVzY3JpcHRvci5lbnVtZXJhYmxlID0gZGVzY3JpcHRvci5lbnVtZXJhYmxlIHx8IGZhbHNlOyBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7IGlmIChcInZhbHVlXCIgaW4gZGVzY3JpcHRvcikgZGVzY3JpcHRvci53cml0YWJsZSA9IHRydWU7IE9iamVjdC5kZWZpbmVQcm9wZXJ0eSh0YXJnZXQsIGRlc2NyaXB0b3Iua2V5LCBkZXNjcmlwdG9yKTsgfSB9IHJldHVybiBmdW5jdGlvbiAoQ29uc3RydWN0b3IsIHByb3RvUHJvcHMsIHN0YXRpY1Byb3BzKSB7IGlmIChwcm90b1Byb3BzKSBkZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLnByb3RvdHlwZSwgcHJvdG9Qcm9wcyk7IGlmIChzdGF0aWNQcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvciwgc3RhdGljUHJvcHMpOyByZXR1cm4gQ29uc3RydWN0b3I7IH07IH0oKTtcblxudmFyIF9nZXQgPSBmdW5jdGlvbiBnZXQob2JqZWN0LCBwcm9wZXJ0eSwgcmVjZWl2ZXIpIHsgaWYgKG9iamVjdCA9PT0gbnVsbCkgb2JqZWN0ID0gRnVuY3Rpb24ucHJvdG90eXBlOyB2YXIgZGVzYyA9IE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3Iob2JqZWN0LCBwcm9wZXJ0eSk7IGlmIChkZXNjID09PSB1bmRlZmluZWQpIHsgdmFyIHBhcmVudCA9IE9iamVjdC5nZXRQcm90b3R5cGVPZihvYmplY3QpOyBpZiAocGFyZW50ID09PSBudWxsKSB7IHJldHVybiB1bmRlZmluZWQ7IH0gZWxzZSB7IHJldHVybiBnZXQocGFyZW50LCBwcm9wZXJ0eSwgcmVjZWl2ZXIpOyB9IH0gZWxzZSBpZiAoXCJ2YWx1ZVwiIGluIGRlc2MpIHsgcmV0dXJuIGRlc2MudmFsdWU7IH0gZWxzZSB7IHZhciBnZXR0ZXIgPSBkZXNjLmdldDsgaWYgKGdldHRlciA9PT0gdW5kZWZpbmVkKSB7IHJldHVybiB1bmRlZmluZWQ7IH0gcmV0dXJuIGdldHRlci5jYWxsKHJlY2VpdmVyKTsgfSB9O1xuXG5mdW5jdGlvbiBfY2xhc3NDYWxsQ2hlY2soaW5zdGFuY2UsIENvbnN0cnVjdG9yKSB7IGlmICghKGluc3RhbmNlIGluc3RhbmNlb2YgQ29uc3RydWN0b3IpKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJDYW5ub3QgY2FsbCBhIGNsYXNzIGFzIGEgZnVuY3Rpb25cIik7IH0gfVxuXG5mdW5jdGlvbiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybihzZWxmLCBjYWxsKSB7IGlmICghc2VsZikgeyB0aHJvdyBuZXcgUmVmZXJlbmNlRXJyb3IoXCJ0aGlzIGhhc24ndCBiZWVuIGluaXRpYWxpc2VkIC0gc3VwZXIoKSBoYXNuJ3QgYmVlbiBjYWxsZWRcIik7IH0gcmV0dXJuIGNhbGwgJiYgKHR5cGVvZiBjYWxsID09PSBcIm9iamVjdFwiIHx8IHR5cGVvZiBjYWxsID09PSBcImZ1bmN0aW9uXCIpID8gY2FsbCA6IHNlbGY7IH1cblxuZnVuY3Rpb24gX2luaGVyaXRzKHN1YkNsYXNzLCBzdXBlckNsYXNzKSB7IGlmICh0eXBlb2Ygc3VwZXJDbGFzcyAhPT0gXCJmdW5jdGlvblwiICYmIHN1cGVyQ2xhc3MgIT09IG51bGwpIHsgdGhyb3cgbmV3IFR5cGVFcnJvcihcIlN1cGVyIGV4cHJlc3Npb24gbXVzdCBlaXRoZXIgYmUgbnVsbCBvciBhIGZ1bmN0aW9uLCBub3QgXCIgKyB0eXBlb2Ygc3VwZXJDbGFzcyk7IH0gc3ViQ2xhc3MucHJvdG90eXBlID0gT2JqZWN0LmNyZWF0ZShzdXBlckNsYXNzICYmIHN1cGVyQ2xhc3MucHJvdG90eXBlLCB7IGNvbnN0cnVjdG9yOiB7IHZhbHVlOiBzdWJDbGFzcywgZW51bWVyYWJsZTogZmFsc2UsIHdyaXRhYmxlOiB0cnVlLCBjb25maWd1cmFibGU6IHRydWUgfSB9KTsgaWYgKHN1cGVyQ2xhc3MpIE9iamVjdC5zZXRQcm90b3R5cGVPZiA/IE9iamVjdC5zZXRQcm90b3R5cGVPZihzdWJDbGFzcywgc3VwZXJDbGFzcykgOiBzdWJDbGFzcy5fX3Byb3RvX18gPSBzdXBlckNsYXNzOyB9XG5cbi8qKlxyXG4gKiBAZmlsZSByZWNvcmQtdG9nZ2xlLmpzXHJcbiAqIEBzaW5jZSAyLjAuMFxyXG4gKi9cblxudmFyIEJ1dHRvbiA9IHZpZGVvanMuZ2V0Q29tcG9uZW50KCdCdXR0b24nKTtcbnZhciBDb21wb25lbnQgPSB2aWRlb2pzLmdldENvbXBvbmVudCgnQ29tcG9uZW50Jyk7XG5cbi8qKlxyXG4gKiBCdXR0b24gdG8gdG9nZ2xlIGJldHdlZW4gc3RhcnQgYW5kIHN0b3AgcmVjb3JkaW5nLlxyXG4gKlxyXG4gKiBAY2xhc3NcclxuICogQGF1Z21lbnRzIHZpZGVvanMuQnV0dG9uXHJcbiovXG5cbnZhciBSZWNvcmRUb2dnbGUgPSBmdW5jdGlvbiAoX0J1dHRvbikge1xuICAgIF9pbmhlcml0cyhSZWNvcmRUb2dnbGUsIF9CdXR0b24pO1xuXG4gICAgZnVuY3Rpb24gUmVjb3JkVG9nZ2xlKCkge1xuICAgICAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgUmVjb3JkVG9nZ2xlKTtcblxuICAgICAgICByZXR1cm4gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4odGhpcywgKFJlY29yZFRvZ2dsZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKFJlY29yZFRvZ2dsZSkpLmFwcGx5KHRoaXMsIGFyZ3VtZW50cykpO1xuICAgIH1cblxuICAgIF9jcmVhdGVDbGFzcyhSZWNvcmRUb2dnbGUsIFt7XG4gICAgICAgIGtleTogJ2J1aWxkQ1NTQ2xhc3MnLFxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEJ1aWxkcyB0aGUgZGVmYXVsdCBET00gYGNsYXNzTmFtZWAuXHJcbiAgICAgICAgICpcclxuICAgICAgICAgKiBAcmV0dXJuIHtzdHJpbmd9XHJcbiAgICAgICAgICogICAgICAgICBUaGUgRE9NIGBjbGFzc05hbWVgIGZvciB0aGlzIG9iamVjdC5cclxuICAgICAgICAgKi9cbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIGJ1aWxkQ1NTQ2xhc3MoKSB7XG4gICAgICAgICAgICByZXR1cm4gJ3Zqcy1yZWNvcmQtYnV0dG9uIHZqcy1jb250cm9sIHZqcy1idXR0b24gdmpzLWljb24tcmVjb3JkLXN0YXJ0JztcbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEVuYWJsZSB0aGUgYFJlY29yZFRvZ2dsZWAgZWxlbWVudCBzbyB0aGF0IGl0IGNhbiBiZSBhY3RpdmF0ZWQgb3IgY2xpY2tlZC5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnZW5hYmxlJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIGVuYWJsZSgpIHtcbiAgICAgICAgICAgIF9nZXQoUmVjb3JkVG9nZ2xlLnByb3RvdHlwZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKFJlY29yZFRvZ2dsZS5wcm90b3R5cGUpLCAnZW5hYmxlJywgdGhpcykuY2FsbCh0aGlzKTtcblxuICAgICAgICAgICAgdGhpcy5vbih0aGlzLnBsYXllcl8sICdzdGFydFJlY29yZCcsIHRoaXMub25TdGFydCk7XG4gICAgICAgICAgICB0aGlzLm9uKHRoaXMucGxheWVyXywgJ3N0b3BSZWNvcmQnLCB0aGlzLm9uU3RvcCk7XG4gICAgICAgIH1cblxuICAgICAgICAvKipcclxuICAgICAgICAgKiBEaXNhYmxlIHRoZSBgUmVjb3JkVG9nZ2xlYCBlbGVtZW50IHNvIHRoYXQgaXQgY2Fubm90IGJlIGFjdGl2YXRlZCBvciBjbGlja2VkLlxyXG4gICAgICAgICAqL1xuXG4gICAgfSwge1xuICAgICAgICBrZXk6ICdkaXNhYmxlJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIGRpc2FibGUoKSB7XG4gICAgICAgICAgICBfZ2V0KFJlY29yZFRvZ2dsZS5wcm90b3R5cGUuX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihSZWNvcmRUb2dnbGUucHJvdG90eXBlKSwgJ2Rpc2FibGUnLCB0aGlzKS5jYWxsKHRoaXMpO1xuXG4gICAgICAgICAgICB0aGlzLm9mZih0aGlzLnBsYXllcl8sICdzdGFydFJlY29yZCcsIHRoaXMub25TdGFydCk7XG4gICAgICAgICAgICB0aGlzLm9mZih0aGlzLnBsYXllcl8sICdzdG9wUmVjb3JkJywgdGhpcy5vblN0b3ApO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogVGhpcyBnZXRzIGNhbGxlZCB3aGVuIHRoZSBidXR0b24gaXMgY2xpY2tlZC5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEBwYXJhbSB7RXZlbnRUYXJnZXR+RXZlbnR9IGV2ZW50XHJcbiAgICAgICAgICogICAgICAgIFRoZSBgdGFwYCBvciBgY2xpY2tgIGV2ZW50IHRoYXQgY2F1c2VkIHRoaXMgZnVuY3Rpb24gdG8gYmVcclxuICAgICAgICAgKiAgICAgICAgY2FsbGVkLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQGxpc3RlbnMgdGFwXHJcbiAgICAgICAgICogQGxpc3RlbnMgY2xpY2tcclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnaGFuZGxlQ2xpY2snLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gaGFuZGxlQ2xpY2soZXZlbnQpIHtcbiAgICAgICAgICAgIHZhciByZWNvcmRlciA9IHRoaXMucGxheWVyXy5yZWNvcmQoKTtcbiAgICAgICAgICAgIGlmICghcmVjb3JkZXIuaXNSZWNvcmRpbmcoKSkge1xuICAgICAgICAgICAgICAgIHJlY29yZGVyLnN0YXJ0KCk7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHJlY29yZGVyLnN0b3AoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEFkZCB0aGUgdmpzLWljb24tcmVjb3JkLXN0b3AgY2xhc3MgdG8gdGhlIGVsZW1lbnQgc28gaXQgY2FuIGNoYW5nZSBhcHBlYXJhbmNlLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQHBhcmFtIHtFdmVudFRhcmdldH5FdmVudH0gW2V2ZW50XVxyXG4gICAgICAgICAqICAgICAgICBUaGUgZXZlbnQgdGhhdCBjYXVzZWQgdGhpcyBmdW5jdGlvbiB0byBydW4uXHJcbiAgICAgICAgICpcclxuICAgICAgICAgKiBAbGlzdGVucyBQbGF5ZXIjc3RhcnRSZWNvcmRcclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnb25TdGFydCcsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBvblN0YXJ0KGV2ZW50KSB7XG4gICAgICAgICAgICAvLyByZXBsYWNlIGVsZW1lbnQgY2xhc3Mgc28gaXQgY2FuIGNoYW5nZSBhcHBlYXJhbmNlXG4gICAgICAgICAgICB0aGlzLnJlbW92ZUNsYXNzKCd2anMtaWNvbi1yZWNvcmQtc3RhcnQnKTtcbiAgICAgICAgICAgIHRoaXMuYWRkQ2xhc3MoJ3Zqcy1pY29uLXJlY29yZC1zdG9wJyk7XG5cbiAgICAgICAgICAgIC8vIGNoYW5nZSB0aGUgYnV0dG9uIHRleHRcbiAgICAgICAgICAgIHRoaXMuY29udHJvbFRleHQoJ1N0b3AnKTtcbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIEFkZCB0aGUgdmpzLWljb24tcmVjb3JkLXN0YXJ0IGNsYXNzIHRvIHRoZSBlbGVtZW50IHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZS5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEBwYXJhbSB7RXZlbnRUYXJnZXR+RXZlbnR9IFtldmVudF1cclxuICAgICAgICAgKiAgICAgICAgVGhlIGV2ZW50IHRoYXQgY2F1c2VkIHRoaXMgZnVuY3Rpb24gdG8gcnVuLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQGxpc3RlbnMgUGxheWVyI3N0b3BSZWNvcmRcclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnb25TdG9wJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIG9uU3RvcChldmVudCkge1xuICAgICAgICAgICAgLy8gcmVwbGFjZSBlbGVtZW50IGNsYXNzIHNvIGl0IGNhbiBjaGFuZ2UgYXBwZWFyYW5jZVxuICAgICAgICAgICAgdGhpcy5yZW1vdmVDbGFzcygndmpzLWljb24tcmVjb3JkLXN0b3AnKTtcbiAgICAgICAgICAgIHRoaXMuYWRkQ2xhc3MoJ3Zqcy1pY29uLXJlY29yZC1zdGFydCcpO1xuXG4gICAgICAgICAgICAvLyBjaGFuZ2UgdGhlIGJ1dHRvbiB0ZXh0XG4gICAgICAgICAgICB0aGlzLmNvbnRyb2xUZXh0KCdSZWNvcmQnKTtcbiAgICAgICAgfVxuICAgIH1dKTtcblxuICAgIHJldHVybiBSZWNvcmRUb2dnbGU7XG59KEJ1dHRvbik7XG5cbi8qKlxyXG4gKiBUaGUgdGV4dCB0aGF0IHNob3VsZCBkaXNwbGF5IG92ZXIgdGhlIGBSZWNvcmRUb2dnbGVgcyBjb250cm9scy4gQWRkZWQgZm9yIGxvY2FsaXphdGlvbi5cclxuICpcclxuICogQHR5cGUge3N0cmluZ31cclxuICogQHByaXZhdGVcclxuICovXG5cblxuUmVjb3JkVG9nZ2xlLnByb3RvdHlwZS5jb250cm9sVGV4dF8gPSAnUmVjb3JkJztcblxuQ29tcG9uZW50LnJlZ2lzdGVyQ29tcG9uZW50KCdSZWNvcmRUb2dnbGUnLCBSZWNvcmRUb2dnbGUpO1xuXG5leHBvcnRzLmRlZmF1bHQgPSBSZWNvcmRUb2dnbGU7IiwiJ3VzZSBzdHJpY3QnO1xuXG5PYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgXCJfX2VzTW9kdWxlXCIsIHtcbiAgICB2YWx1ZTogdHJ1ZVxufSk7XG4vKipcclxuICogQGZpbGUgZGVmYXVsdHMuanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG4vL3BsdWdpbiBkZWZhdWx0c1xudmFyIHBsdWdpbkRlZmF1bHRPcHRpb25zID0ge1xuICAgIC8vIFNpbmdsZSBzbmFwc2hvdCBpbWFnZS5cbiAgICBpbWFnZTogZmFsc2UsXG4gICAgLy8gSW5jbHVkZSBhdWRpbyBpbiB0aGUgcmVjb3JkZWQgY2xpcC5cbiAgICBhdWRpbzogZmFsc2UsXG4gICAgLy8gSW5jbHVkZSB2aWRlbyBpbiB0aGUgcmVjb3JkZWQgY2xpcC5cbiAgICB2aWRlbzogZmFsc2UsXG4gICAgLy8gQW5pbWF0ZWQgR0lGLlxuICAgIGFuaW1hdGlvbjogZmFsc2UsXG4gICAgLy8gTWF4aW11bSBsZW5ndGggb2YgdGhlIHJlY29yZGVkIGNsaXAuXG4gICAgbWF4TGVuZ3RoOiAxMCxcbiAgICAvLyBXaWR0aCBvZiB0aGUgcmVjb3JkZWQgdmlkZW8gZnJhbWVzLlxuICAgIGZyYW1lV2lkdGg6IDMyMCxcbiAgICAvLyBIZWlnaHQgb2YgdGhlIHJlY29yZGVkIHZpZGVvIGZyYW1lcy5cbiAgICBmcmFtZUhlaWdodDogMjQwLFxuICAgIC8vIEVuYWJsZXMgY29uc29sZSBsb2dnaW5nIGZvciBkZWJ1Z2dpbmcgcHVycG9zZXMuXG4gICAgZGVidWc6IGZhbHNlLFxuICAgIC8vIFRoZSBtaW1lIHR5cGUgZm9yIHRoZSB2aWRlbyByZWNvcmRlci4gRGVmYXVsdCB0byAndmlkZW8vd2VibScuXG4gICAgLy8gVXNlICd2aWRlby9tcDQnIChGaXJlZm94KSBvciAndmlkZW8vd2VibTtjb2RlY3M9SDI2NCcgKENocm9tZSA1MiBhbmRcbiAgICAvLyBuZXdlcikgZm9yIE1QNC5cbiAgICB2aWRlb01pbWVUeXBlOiAndmlkZW8vd2VibScsXG4gICAgLy8gVmlkZW8gcmVjb3JkZXIgdHlwZSB0byB1c2UuIFRoaXMgYWxsb3dzIHlvdSB0byBzcGVjaWZ5IGFuIGFsdGVybmF0aXZlXG4gICAgLy8gcmVjb3JkZXIgY2xhc3MsIGUuZy4gV2hhbW15UmVjb3JkZXIuIERlZmF1bHRzIHRvICdhdXRvJyB3aGljaCBsZXQnc1xuICAgIC8vIHJlY29yZHJ0YyBzcGVjaWZ5IHRoZSBiZXN0IGF2YWlsYWJsZSByZWNvcmRlciB0eXBlLlxuICAgIHZpZGVvUmVjb3JkZXJUeXBlOiAnYXV0bycsXG4gICAgLy8gQXVkaW8gcmVjb3JkaW5nIGxpYnJhcnkgdG8gdXNlLiBMZWdhbCB2YWx1ZXMgYXJlICdyZWNvcmRydGMnLFxuICAgIC8vICdsaWJ2b3JiaXMuanMnLCAnb3B1cy1yZWNvcmRlcicsICdsYW1lanMnIGFuZCAncmVjb3JkZXIuanMnLlxuICAgIGF1ZGlvRW5naW5lOiAncmVjb3JkcnRjJyxcbiAgICAvLyBBdWRpbyByZWNvcmRlciB0eXBlIHRvIHVzZS4gVGhpcyBhbGxvd3MgeW91IHRvIHNwZWNpZnkgYW4gYWx0ZXJuYXRpdmVcbiAgICAvLyByZWNvcmRlciBjbGFzcywgZS5nLiBTdGVyZW9BdWRpb1JlY29yZGVyLiBEZWZhdWx0cyB0byAnYXV0bycgd2hpY2ggbGV0J3NcbiAgICAvLyByZWNvcmRydGMgc3BlY2lmeSB0aGUgYmVzdCBhdmFpbGFibGUgcmVjb3JkZXIgdHlwZS4gQ3VycmVudGx5IHRoaXNcbiAgICAvLyBzZXR0aW5nIGlzIG9ubHkgdXNlZCB3aXRoIHRoZSAncmVjb3JkcnRjJyBhdWRpb0VuZ2luZS5cbiAgICBhdWRpb1JlY29yZGVyVHlwZTogJ2F1dG8nLFxuICAgIC8vIFRoZSBtaW1lIHR5cGUgZm9yIHRoZSBhdWRpbyByZWNvcmRlci4gRGVmYXVsdHMgdG8gJ2F1dG8nIHdoaWNoIHdpbGwgcGlja1xuICAgIC8vIHRoZSBiZXN0IG9wdGlvbiBhdmFpbGFibGUgaW4gdGhlIGJyb3dzZXIgKGUuZy4gZWl0aGVyICdhdWRpby93YXYnLFxuICAgIC8vICdhdWRpby9vZ2cnIG9yICdhdWRpby93ZWJtJykuXG4gICAgYXVkaW9NaW1lVHlwZTogJ2F1dG8nLFxuICAgIC8vIFRoZSBzaXplIG9mIHRoZSBhdWRpbyBidWZmZXIgKGluIHNhbXBsZS1mcmFtZXMpIHdoaWNoIG5lZWRzIHRvXG4gICAgLy8gYmUgcHJvY2Vzc2VkIGVhY2ggdGltZSBvbnByb2Nlc3NhdWRpbyBpcyBjYWxsZWQuXG4gICAgLy8gRnJvbSB0aGUgc3BlYzogVGhpcyB2YWx1ZSBjb250cm9scyBob3cgZnJlcXVlbnRseSB0aGUgYXVkaW9wcm9jZXNzIGV2ZW50IGlzXG4gICAgLy8gZGlzcGF0Y2hlZCBhbmQgaG93IG1hbnkgc2FtcGxlLWZyYW1lcyBuZWVkIHRvIGJlIHByb2Nlc3NlZCBlYWNoIGNhbGwuXG4gICAgLy8gTG93ZXIgdmFsdWVzIGZvciBidWZmZXIgc2l6ZSB3aWxsIHJlc3VsdCBpbiBhIGxvd2VyIChiZXR0ZXIpIGxhdGVuY3kuXG4gICAgLy8gSGlnaGVyIHZhbHVlcyB3aWxsIGJlIG5lY2Vzc2FyeSB0byBhdm9pZCBhdWRpbyBicmVha3VwIGFuZCBnbGl0Y2hlcy5cbiAgICAvLyBMZWdhbCB2YWx1ZXMgYXJlIDI1NiwgNTEyLCAxMDI0LCAyMDQ4LCA0MDk2LCA4MTkyIG9yIDE2Mzg0LlxuICAgIGF1ZGlvQnVmZmVyU2l6ZTogNDA5NixcbiAgICAvLyBUaGUgYXVkaW8gc2FtcGxlIHJhdGUgKGluIHNhbXBsZS1mcmFtZXMgcGVyIHNlY29uZCkgYXQgd2hpY2ggdGhlXG4gICAgLy8gQXVkaW9Db250ZXh0IGhhbmRsZXMgYXVkaW8uIEl0IGlzIGFzc3VtZWQgdGhhdCBhbGwgQXVkaW9Ob2Rlc1xuICAgIC8vIGluIHRoZSBjb250ZXh0IHJ1biBhdCB0aGlzIHJhdGUuIEluIG1ha2luZyB0aGlzIGFzc3VtcHRpb24sXG4gICAgLy8gc2FtcGxlLXJhdGUgY29udmVydGVycyBvciBcInZhcmlzcGVlZFwiIHByb2Nlc3NvcnMgYXJlIG5vdCBzdXBwb3J0ZWRcbiAgICAvLyBpbiByZWFsLXRpbWUgcHJvY2Vzc2luZy5cbiAgICAvLyBUaGUgc2FtcGxlUmF0ZSBwYXJhbWV0ZXIgZGVzY3JpYmVzIHRoZSBzYW1wbGUtcmF0ZSBvZiB0aGVcbiAgICAvLyBsaW5lYXIgUENNIGF1ZGlvIGRhdGEgaW4gdGhlIGJ1ZmZlciBpbiBzYW1wbGUtZnJhbWVzIHBlciBzZWNvbmQuXG4gICAgLy8gQW4gaW1wbGVtZW50YXRpb24gbXVzdCBzdXBwb3J0IHNhbXBsZS1yYXRlcyBpbiBhdCBsZWFzdFxuICAgIC8vIHRoZSByYW5nZSAyMjA1MCB0byA5NjAwMC5cbiAgICBhdWRpb1NhbXBsZVJhdGU6IDQ0MTAwLFxuICAgIC8vIFRoZSBhdWRpbyBiaXRyYXRlIGluIGticHMgKG9ubHkgdXNlZCBpbiBsYW1lanMgcGx1Z2luKS5cbiAgICBhdWRpb0JpdFJhdGU6IDEyOCxcbiAgICAvLyBBbGxvd3MgeW91IHRvIHJlY29yZCBzaW5nbGUtY2hhbm5lbCBhdWRpbywgd2hpY2ggY2FuIHJlZHVjZSB0aGVcbiAgICAvLyBmaWxlc2l6ZS5cbiAgICBhdWRpb0NoYW5uZWxzOiAyLFxuICAgIC8vIFVSTCBmb3IgdGhlIGF1ZGlvIHdvcmtlci5cbiAgICBhdWRpb1dvcmtlclVSTDogJycsXG4gICAgLy8gRnJhbWUgcmF0ZSBpbiBmcmFtZXMgcGVyIHNlY29uZC5cbiAgICBhbmltYXRpb25GcmFtZVJhdGU6IDIwMCxcbiAgICAvLyBTZXRzIHF1YWxpdHkgb2YgY29sb3IgcXVhbnRpemF0aW9uIChjb252ZXJzaW9uIG9mIGltYWdlcyB0byB0aGVcbiAgICAvLyBtYXhpbXVtIDI1NiBjb2xvcnMgYWxsb3dlZCBieSB0aGUgR0lGIHNwZWNpZmljYXRpb24pLlxuICAgIC8vIExvd2VyIHZhbHVlcyAobWluaW11bSA9IDEpIHByb2R1Y2UgYmV0dGVyIGNvbG9ycyxcbiAgICAvLyBidXQgc2xvdyBwcm9jZXNzaW5nIHNpZ25pZmljYW50bHkuIDEwIGlzIHRoZSBkZWZhdWx0LFxuICAgIC8vIGFuZCBwcm9kdWNlcyBnb29kIGNvbG9yIG1hcHBpbmcgYXQgcmVhc29uYWJsZSBzcGVlZHMuXG4gICAgLy8gVmFsdWVzIGdyZWF0ZXIgdGhhbiAyMCBkbyBub3QgeWllbGQgc2lnbmlmaWNhbnQgaW1wcm92ZW1lbnRzXG4gICAgLy8gaW4gc3BlZWQuXG4gICAgYW5pbWF0aW9uUXVhbGl0eTogMTAsXG4gICAgLy8gQWNjZXB0cyBudW1iZXJzIGluIG1pbGxpc2Vjb25kczsgdXNlIHRoaXMgdG8gZm9yY2UgaW50ZXJ2YWxzLWJhc2VkIGJsb2JzLlxuICAgIHRpbWVTbGljZTogMFxufTtcblxuZXhwb3J0cy5kZWZhdWx0ID0gcGx1Z2luRGVmYXVsdE9wdGlvbnM7IiwiJ3VzZSBzdHJpY3QnO1xuXG5PYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgXCJfX2VzTW9kdWxlXCIsIHtcbiAgICB2YWx1ZTogdHJ1ZVxufSk7XG5cbnZhciBfY3JlYXRlQ2xhc3MgPSBmdW5jdGlvbiAoKSB7IGZ1bmN0aW9uIGRlZmluZVByb3BlcnRpZXModGFyZ2V0LCBwcm9wcykgeyBmb3IgKHZhciBpID0gMDsgaSA8IHByb3BzLmxlbmd0aDsgaSsrKSB7IHZhciBkZXNjcmlwdG9yID0gcHJvcHNbaV07IGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTsgZGVzY3JpcHRvci5jb25maWd1cmFibGUgPSB0cnVlOyBpZiAoXCJ2YWx1ZVwiIGluIGRlc2NyaXB0b3IpIGRlc2NyaXB0b3Iud3JpdGFibGUgPSB0cnVlOyBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7IH0gfSByZXR1cm4gZnVuY3Rpb24gKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykgeyBpZiAocHJvdG9Qcm9wcykgZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvci5wcm90b3R5cGUsIHByb3RvUHJvcHMpOyBpZiAoc3RhdGljUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9OyB9KCk7XG5cbmZ1bmN0aW9uIF9jbGFzc0NhbGxDaGVjayhpbnN0YW5jZSwgQ29uc3RydWN0b3IpIHsgaWYgKCEoaW5zdGFuY2UgaW5zdGFuY2VvZiBDb25zdHJ1Y3RvcikpIHsgdGhyb3cgbmV3IFR5cGVFcnJvcihcIkNhbm5vdCBjYWxsIGEgY2xhc3MgYXMgYSBmdW5jdGlvblwiKTsgfSB9XG5cbmZ1bmN0aW9uIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHNlbGYsIGNhbGwpIHsgaWYgKCFzZWxmKSB7IHRocm93IG5ldyBSZWZlcmVuY2VFcnJvcihcInRoaXMgaGFzbid0IGJlZW4gaW5pdGlhbGlzZWQgLSBzdXBlcigpIGhhc24ndCBiZWVuIGNhbGxlZFwiKTsgfSByZXR1cm4gY2FsbCAmJiAodHlwZW9mIGNhbGwgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikgPyBjYWxsIDogc2VsZjsgfVxuXG5mdW5jdGlvbiBfaW5oZXJpdHMoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIHsgaWYgKHR5cGVvZiBzdXBlckNsYXNzICE9PSBcImZ1bmN0aW9uXCIgJiYgc3VwZXJDbGFzcyAhPT0gbnVsbCkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiU3VwZXIgZXhwcmVzc2lvbiBtdXN0IGVpdGhlciBiZSBudWxsIG9yIGEgZnVuY3Rpb24sIG5vdCBcIiArIHR5cGVvZiBzdXBlckNsYXNzKTsgfSBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MgJiYgc3VwZXJDbGFzcy5wcm90b3R5cGUsIHsgY29uc3RydWN0b3I6IHsgdmFsdWU6IHN1YkNsYXNzLCBlbnVtZXJhYmxlOiBmYWxzZSwgd3JpdGFibGU6IHRydWUsIGNvbmZpZ3VyYWJsZTogdHJ1ZSB9IH0pOyBpZiAoc3VwZXJDbGFzcykgT2JqZWN0LnNldFByb3RvdHlwZU9mID8gT2JqZWN0LnNldFByb3RvdHlwZU9mKHN1YkNsYXNzLCBzdXBlckNsYXNzKSA6IHN1YkNsYXNzLl9fcHJvdG9fXyA9IHN1cGVyQ2xhc3M7IH1cblxuLyoqXHJcbiAqIEBmaWxlIHJlY29yZC1lbmdpbmUuanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG52YXIgQ29tcG9uZW50ID0gdmlkZW9qcy5nZXRDb21wb25lbnQoJ0NvbXBvbmVudCcpO1xuXG4vLyBzdXBwb3J0ZWQgcmVjb3JkZXIgcGx1Z2luIGVuZ2luZXNcbnZhciBSRUNPUkRSVEMgPSAncmVjb3JkcnRjJztcbnZhciBMSUJWT1JCSVNKUyA9ICdsaWJ2b3JiaXMuanMnO1xudmFyIFJFQ09SREVSSlMgPSAncmVjb3JkZXIuanMnO1xudmFyIExBTUVKUyA9ICdsYW1lanMnO1xudmFyIE9QVVNSRUNPUkRFUiA9ICdvcHVzLXJlY29yZGVyJztcblxuLyoqXHJcbiAqIEJhc2UgY2xhc3MgZm9yIHJlY29yZGVyIGJhY2tlbmRzLlxyXG4gKiBAY2xhc3NcclxuICogQGF1Z21lbnRzIHZpZGVvanMuQ29tcG9uZW50XHJcbiAqL1xuXG52YXIgUmVjb3JkRW5naW5lID0gZnVuY3Rpb24gKF9Db21wb25lbnQpIHtcbiAgICBfaW5oZXJpdHMoUmVjb3JkRW5naW5lLCBfQ29tcG9uZW50KTtcblxuICAgIC8qKlxyXG4gICAgICogQ3JlYXRlcyBhbiBpbnN0YW5jZSBvZiB0aGlzIGNsYXNzLlxyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSAge1BsYXllcn0gcGxheWVyXHJcbiAgICAgKiAgICAgICAgIFRoZSBgUGxheWVyYCB0aGF0IHRoaXMgY2xhc3Mgc2hvdWxkIGJlIGF0dGFjaGVkIHRvLlxyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSAge09iamVjdH0gW29wdGlvbnNdXHJcbiAgICAgKiAgICAgICAgIFRoZSBrZXkvdmFsdWUgc3RvcmUgb2YgcGxheWVyIG9wdGlvbnMuXHJcbiAgICAgKi9cbiAgICBmdW5jdGlvbiBSZWNvcmRFbmdpbmUocGxheWVyLCBvcHRpb25zKSB7XG4gICAgICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBSZWNvcmRFbmdpbmUpO1xuXG4gICAgICAgIC8vIGF1dG8gbWl4aW4gdGhlIGV2ZW50ZWQgbWl4aW4gKHJlcXVpcmVkIHNpbmNlIHZpZGVvLmpzIHY2LjYuMClcbiAgICAgICAgb3B0aW9ucy5ldmVudGVkID0gdHJ1ZTtcblxuICAgICAgICByZXR1cm4gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4odGhpcywgKFJlY29yZEVuZ2luZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKFJlY29yZEVuZ2luZSkpLmNhbGwodGhpcywgcGxheWVyLCBvcHRpb25zKSk7XG4gICAgfVxuXG4gICAgLyoqXHJcbiAgICAgKiBSZW1vdmUgYW55IHRlbXBvcmFyeSBkYXRhIGFuZCByZWZlcmVuY2VzIHRvIHN0cmVhbXMuXHJcbiAgICAgKiBAcHJpdmF0ZVxyXG4gICAgICovXG5cblxuICAgIF9jcmVhdGVDbGFzcyhSZWNvcmRFbmdpbmUsIFt7XG4gICAgICAgIGtleTogJ2Rpc3Bvc2UnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gZGlzcG9zZSgpIHtcbiAgICAgICAgICAgIC8vIGRpc3Bvc2UgcHJldmlvdXMgcmVjb3JkaW5nXG4gICAgICAgICAgICBpZiAodGhpcy5yZWNvcmRlZERhdGEgIT09IHVuZGVmaW5lZCkge1xuICAgICAgICAgICAgICAgIFVSTC5yZXZva2VPYmplY3RVUkwodGhpcy5yZWNvcmRlZERhdGEpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogQWRkIGZpbGVuYW1lIGFuZCB0aW1lc3RhbXAgdG8gcmVjb3JkZWQgZmlsZSBvYmplY3QuXHJcbiAgICAgICAgICpcclxuICAgICAgICAgKiBAcGFyYW0geyhibG9ifGZpbGUpfSBmaWxlT2JqIC0gQmxvYiBvciBGaWxlIG9iamVjdC5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnYWRkRmlsZUluZm8nLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gYWRkRmlsZUluZm8oZmlsZU9iaikge1xuICAgICAgICAgICAgaWYgKGZpbGVPYmogaW5zdGFuY2VvZiBCbG9iIHx8IGZpbGVPYmogaW5zdGFuY2VvZiBGaWxlKSB7XG4gICAgICAgICAgICAgICAgLy8gc2V0IG1vZGlmaWNhdGlvbiBkYXRlXG4gICAgICAgICAgICAgICAgdmFyIG5vdyA9IG5ldyBEYXRlKCk7XG4gICAgICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICAgICAgZmlsZU9iai5sYXN0TW9kaWZpZWQgPSBub3cuZ2V0VGltZSgpO1xuICAgICAgICAgICAgICAgICAgICBmaWxlT2JqLmxhc3RNb2RpZmllZERhdGUgPSBub3c7XG4gICAgICAgICAgICAgICAgfSBjYXRjaCAoZSkge1xuICAgICAgICAgICAgICAgICAgICBpZiAoZSBpbnN0YW5jZW9mIFR5cGVFcnJvcikge1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gaWdub3JlOiBzZXR0aW5nIGdldHRlci1vbmx5IHByb3BlcnR5IFwibGFzdE1vZGlmaWVkRGF0ZVwiXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyByZS1yYWlzZSBlcnJvclxuICAgICAgICAgICAgICAgICAgICAgICAgdGhyb3cgZTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAvLyBndWVzcyBleHRlbnNpb24gbmFtZSBmcm9tIG1pbWUgdHlwZSwgZS5nLiBhdWRpby9vZ2csIGJ1dFxuICAgICAgICAgICAgICAgIC8vIGFueSBleHRlbnNpb24gaXMgdmFsaWQgaGVyZS4gQ2hyb21lIGFsc28gYWNjZXB0cyBleHRlbmRlZFxuICAgICAgICAgICAgICAgIC8vIG1pbWUgdHlwZXMgbGlrZSB2aWRlby93ZWJtO2NvZGVjcz1oMjY0LHZwOSxvcHVzXG4gICAgICAgICAgICAgICAgdmFyIGZpbGVFeHRlbnNpb24gPSAnLicgKyBmaWxlT2JqLnR5cGUuc3BsaXQoJy8nKVsxXTtcbiAgICAgICAgICAgICAgICBpZiAoZmlsZUV4dGVuc2lvbi5pbmRleE9mKCc7JykgPiAtMSkge1xuICAgICAgICAgICAgICAgICAgICBmaWxlRXh0ZW5zaW9uID0gZmlsZUV4dGVuc2lvbi5zcGxpdCgnOycpWzBdO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIC8vIHVzZSB0aW1lc3RhbXAgaW4gZmlsZW5hbWUsIGUuZy4gMTQ1MTE4MDk0MTMyNi5vZ2dcbiAgICAgICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICAgICAgICBmaWxlT2JqLm5hbWUgPSBub3cuZ2V0VGltZSgpICsgZmlsZUV4dGVuc2lvbjtcbiAgICAgICAgICAgICAgICB9IGNhdGNoIChlKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmIChlIGluc3RhbmNlb2YgVHlwZUVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBpZ25vcmU6IHNldHRpbmcgZ2V0dGVyLW9ubHkgcHJvcGVydHkgXCJuYW1lXCJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIHJlLXJhaXNlIGVycm9yXG4gICAgICAgICAgICAgICAgICAgICAgICB0aHJvdyBlO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogSW52b2tlZCB3aGVuIHJlY29yZGluZyBpcyBzdG9wcGVkIGFuZCByZXN1bHRpbmcgc3RyZWFtIGlzIGF2YWlsYWJsZS5cclxuICAgICAgICAgKlxyXG4gICAgICAgICAqIEBwYXJhbSB7YmxvYn0gZGF0YSAtIFJlZmVyZW5jZSB0byB0aGUgcmVjb3JkZWQgQmxvYi5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnb25TdG9wUmVjb3JkaW5nJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIG9uU3RvcFJlY29yZGluZyhkYXRhKSB7XG4gICAgICAgICAgICB0aGlzLnJlY29yZGVkRGF0YSA9IGRhdGE7XG5cbiAgICAgICAgICAgIC8vIGFkZCBmaWxlbmFtZSBhbmQgdGltZXN0YW1wIHRvIHJlY29yZGVkIGZpbGUgb2JqZWN0XG4gICAgICAgICAgICB0aGlzLmFkZEZpbGVJbmZvKHRoaXMucmVjb3JkZWREYXRhKTtcblxuICAgICAgICAgICAgLy8gcmVtb3ZlIHJlZmVyZW5jZSB0byByZWNvcmRlZCBzdHJlYW1cbiAgICAgICAgICAgIHRoaXMuZGlzcG9zZSgpO1xuXG4gICAgICAgICAgICAvLyBub3RpZnkgbGlzdGVuZXJzXG4gICAgICAgICAgICB0aGlzLnRyaWdnZXIoJ3JlY29yZENvbXBsZXRlJyk7XG4gICAgICAgIH1cblxuICAgICAgICAvKipcclxuICAgICAgICAgKiBTaG93IHNhdmUgYXMgZGlhbG9nIGluIGJyb3dzZXIgc28gdGhlIHVzZXIgY2FuIHN0b3JlIHRoZSByZWNvcmRlZCBtZWRpYVxyXG4gICAgICAgICAqIGxvY2FsbHkuXHJcbiAgICAgICAgICpcclxuICAgICAgICAgKiBAcGFyYW0ge29iamVjdH0gbmFtZSAtIE9iamVjdCB3aXRoIG5hbWVzIGZvciB0aGUgcGFydGljdWxhciBibG9iKHMpXHJcbiAgICAgICAgICogICAgIHlvdSB3YW50IHRvIHNhdmUuIEZpbGUgZXh0ZW5zaW9ucyBhcmUgYWRkZWQgYXV0b21hdGljYWxseS4gRm9yXHJcbiAgICAgICAgICogICAgIGV4YW1wbGU6IHsndmlkZW8nOiAnbmFtZS1vZi12aWRlby1maWxlJ30uIFN1cHBvcnRlZCBrZXlzIGFyZVxyXG4gICAgICAgICAqICAgICAnYXVkaW8nLCAndmlkZW8nIGFuZCAnZ2lmJy5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnc2F2ZUFzJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIHNhdmVBcyhuYW1lKSB7XG4gICAgICAgICAgICB2YXIgZmlsZU5hbWUgPSBuYW1lW09iamVjdC5rZXlzKG5hbWUpWzBdXTtcblxuICAgICAgICAgICAgaWYgKHR5cGVvZiBuYXZpZ2F0b3IubXNTYXZlT3JPcGVuQmxvYiAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gbmF2aWdhdG9yLm1zU2F2ZU9yT3BlbkJsb2IodGhpcy5yZWNvcmRlZERhdGEsIGZpbGVOYW1lKTtcbiAgICAgICAgICAgIH0gZWxzZSBpZiAodHlwZW9mIG5hdmlnYXRvci5tc1NhdmVCbG9iICE9PSAndW5kZWZpbmVkJykge1xuICAgICAgICAgICAgICAgIHJldHVybiBuYXZpZ2F0b3IubXNTYXZlQmxvYih0aGlzLnJlY29yZGVkRGF0YSwgZmlsZU5hbWUpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB2YXIgaHlwZXJsaW5rID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYScpO1xuICAgICAgICAgICAgaHlwZXJsaW5rLmhyZWYgPSBVUkwuY3JlYXRlT2JqZWN0VVJMKHRoaXMucmVjb3JkZWREYXRhKTtcbiAgICAgICAgICAgIGh5cGVybGluay5kb3dubG9hZCA9IGZpbGVOYW1lO1xuXG4gICAgICAgICAgICBoeXBlcmxpbmsuc3R5bGUgPSAnZGlzcGxheTpub25lO29wYWNpdHk6MDtjb2xvcjp0cmFuc3BhcmVudDsnO1xuICAgICAgICAgICAgKGRvY3VtZW50LmJvZHkgfHwgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KS5hcHBlbmRDaGlsZChoeXBlcmxpbmspO1xuXG4gICAgICAgICAgICBpZiAodHlwZW9mIGh5cGVybGluay5jbGljayA9PT0gJ2Z1bmN0aW9uJykge1xuICAgICAgICAgICAgICAgIGh5cGVybGluay5jbGljaygpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBoeXBlcmxpbmsudGFyZ2V0ID0gJ19ibGFuayc7XG4gICAgICAgICAgICAgICAgaHlwZXJsaW5rLmRpc3BhdGNoRXZlbnQobmV3IE1vdXNlRXZlbnQoJ2NsaWNrJywge1xuICAgICAgICAgICAgICAgICAgICB2aWV3OiB3aW5kb3csXG4gICAgICAgICAgICAgICAgICAgIGJ1YmJsZXM6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIGNhbmNlbGFibGU6IHRydWVcbiAgICAgICAgICAgICAgICB9KSk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIFVSTC5yZXZva2VPYmplY3RVUkwoaHlwZXJsaW5rLmhyZWYpO1xuICAgICAgICB9XG4gICAgfV0pO1xuXG4gICAgcmV0dXJuIFJlY29yZEVuZ2luZTtcbn0oQ29tcG9uZW50KTtcblxuLy8gZXhwb3NlIGNvbXBvbmVudCBmb3IgZXh0ZXJuYWwgcGx1Z2luc1xuXG5cbnZpZGVvanMuUmVjb3JkRW5naW5lID0gUmVjb3JkRW5naW5lO1xuQ29tcG9uZW50LnJlZ2lzdGVyQ29tcG9uZW50KCdSZWNvcmRFbmdpbmUnLCBSZWNvcmRFbmdpbmUpO1xuXG5leHBvcnRzLlJlY29yZEVuZ2luZSA9IFJlY29yZEVuZ2luZTtcbmV4cG9ydHMuUkVDT1JEUlRDID0gUkVDT1JEUlRDO1xuZXhwb3J0cy5MSUJWT1JCSVNKUyA9IExJQlZPUkJJU0pTO1xuZXhwb3J0cy5SRUNPUkRFUkpTID0gUkVDT1JERVJKUztcbmV4cG9ydHMuTEFNRUpTID0gTEFNRUpTO1xuZXhwb3J0cy5PUFVTUkVDT1JERVIgPSBPUFVTUkVDT1JERVI7IiwiJ3VzZSBzdHJpY3QnO1xuXG5PYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgXCJfX2VzTW9kdWxlXCIsIHtcbiAgICB2YWx1ZTogdHJ1ZVxufSk7XG4vKipcclxuICogQGZpbGUgcmVjb3JkLW1vZGUuanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG4vLyByZWNvcmRlciBtb2Rlc1xudmFyIElNQUdFX09OTFkgPSAnaW1hZ2Vfb25seSc7XG52YXIgQVVESU9fT05MWSA9ICdhdWRpb19vbmx5JztcbnZhciBWSURFT19PTkxZID0gJ3ZpZGVvX29ubHknO1xudmFyIEFVRElPX1ZJREVPID0gJ2F1ZGlvX3ZpZGVvJztcbnZhciBBTklNQVRJT04gPSAnYW5pbWF0aW9uJztcblxudmFyIGdldFJlY29yZGVyTW9kZSA9IGZ1bmN0aW9uIGdldFJlY29yZGVyTW9kZShpbWFnZSwgYXVkaW8sIHZpZGVvLCBhbmltYXRpb24pIHtcbiAgICBpZiAoaXNNb2RlRW5hYmxlZChpbWFnZSkpIHtcbiAgICAgICAgcmV0dXJuIElNQUdFX09OTFk7XG4gICAgfSBlbHNlIGlmIChpc01vZGVFbmFibGVkKGFuaW1hdGlvbikpIHtcbiAgICAgICAgcmV0dXJuIEFOSU1BVElPTjtcbiAgICB9IGVsc2UgaWYgKGlzTW9kZUVuYWJsZWQoYXVkaW8pICYmICFpc01vZGVFbmFibGVkKHZpZGVvKSkge1xuICAgICAgICByZXR1cm4gQVVESU9fT05MWTtcbiAgICB9IGVsc2UgaWYgKGlzTW9kZUVuYWJsZWQoYXVkaW8pICYmIGlzTW9kZUVuYWJsZWQodmlkZW8pKSB7XG4gICAgICAgIHJldHVybiBBVURJT19WSURFTztcbiAgICB9IGVsc2UgaWYgKCFpc01vZGVFbmFibGVkKGF1ZGlvKSAmJiBpc01vZGVFbmFibGVkKHZpZGVvKSkge1xuICAgICAgICByZXR1cm4gVklERU9fT05MWTtcbiAgICB9XG59O1xuXG4vKipcclxuICogUmV0dXJuIGJvb2xlYW4gaW5kaWNhdGluZyB3aGV0aGVyIG1vZGUgaXMgZW5hYmxlZCBvciBub3QuXHJcbiAqL1xudmFyIGlzTW9kZUVuYWJsZWQgPSBmdW5jdGlvbiBpc01vZGVFbmFibGVkKG1vZGUpIHtcbiAgICByZXR1cm4gbW9kZSA9PT0gT2JqZWN0KG1vZGUpIHx8IG1vZGUgPT09IHRydWU7XG59O1xuXG5leHBvcnRzLmdldFJlY29yZGVyTW9kZSA9IGdldFJlY29yZGVyTW9kZTtcbmV4cG9ydHMuSU1BR0VfT05MWSA9IElNQUdFX09OTFk7XG5leHBvcnRzLkFVRElPX09OTFkgPSBBVURJT19PTkxZO1xuZXhwb3J0cy5WSURFT19PTkxZID0gVklERU9fT05MWTtcbmV4cG9ydHMuQVVESU9fVklERU8gPSBBVURJT19WSURFTztcbmV4cG9ydHMuQU5JTUFUSU9OID0gQU5JTUFUSU9OOyIsIid1c2Ugc3RyaWN0JztcblxuT2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFwiX19lc01vZHVsZVwiLCB7XG4gICAgdmFsdWU6IHRydWVcbn0pO1xuXG52YXIgX2NyZWF0ZUNsYXNzID0gZnVuY3Rpb24gKCkgeyBmdW5jdGlvbiBkZWZpbmVQcm9wZXJ0aWVzKHRhcmdldCwgcHJvcHMpIHsgZm9yICh2YXIgaSA9IDA7IGkgPCBwcm9wcy5sZW5ndGg7IGkrKykgeyB2YXIgZGVzY3JpcHRvciA9IHByb3BzW2ldOyBkZXNjcmlwdG9yLmVudW1lcmFibGUgPSBkZXNjcmlwdG9yLmVudW1lcmFibGUgfHwgZmFsc2U7IGRlc2NyaXB0b3IuY29uZmlndXJhYmxlID0gdHJ1ZTsgaWYgKFwidmFsdWVcIiBpbiBkZXNjcmlwdG9yKSBkZXNjcmlwdG9yLndyaXRhYmxlID0gdHJ1ZTsgT2JqZWN0LmRlZmluZVByb3BlcnR5KHRhcmdldCwgZGVzY3JpcHRvci5rZXksIGRlc2NyaXB0b3IpOyB9IH0gcmV0dXJuIGZ1bmN0aW9uIChDb25zdHJ1Y3RvciwgcHJvdG9Qcm9wcywgc3RhdGljUHJvcHMpIHsgaWYgKHByb3RvUHJvcHMpIGRlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IucHJvdG90eXBlLCBwcm90b1Byb3BzKTsgaWYgKHN0YXRpY1Byb3BzKSBkZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLCBzdGF0aWNQcm9wcyk7IHJldHVybiBDb25zdHJ1Y3RvcjsgfTsgfSgpO1xuXG52YXIgX2dldCA9IGZ1bmN0aW9uIGdldChvYmplY3QsIHByb3BlcnR5LCByZWNlaXZlcikgeyBpZiAob2JqZWN0ID09PSBudWxsKSBvYmplY3QgPSBGdW5jdGlvbi5wcm90b3R5cGU7IHZhciBkZXNjID0gT2JqZWN0LmdldE93blByb3BlcnR5RGVzY3JpcHRvcihvYmplY3QsIHByb3BlcnR5KTsgaWYgKGRlc2MgPT09IHVuZGVmaW5lZCkgeyB2YXIgcGFyZW50ID0gT2JqZWN0LmdldFByb3RvdHlwZU9mKG9iamVjdCk7IGlmIChwYXJlbnQgPT09IG51bGwpIHsgcmV0dXJuIHVuZGVmaW5lZDsgfSBlbHNlIHsgcmV0dXJuIGdldChwYXJlbnQsIHByb3BlcnR5LCByZWNlaXZlcik7IH0gfSBlbHNlIGlmIChcInZhbHVlXCIgaW4gZGVzYykgeyByZXR1cm4gZGVzYy52YWx1ZTsgfSBlbHNlIHsgdmFyIGdldHRlciA9IGRlc2MuZ2V0OyBpZiAoZ2V0dGVyID09PSB1bmRlZmluZWQpIHsgcmV0dXJuIHVuZGVmaW5lZDsgfSByZXR1cm4gZ2V0dGVyLmNhbGwocmVjZWl2ZXIpOyB9IH07XG5cbnZhciBfcmVjb3JkRW5naW5lID0gcmVxdWlyZSgnLi9yZWNvcmQtZW5naW5lJyk7XG5cbnZhciBfZGV0ZWN0QnJvd3NlciA9IHJlcXVpcmUoJy4uL3V0aWxzL2RldGVjdC1icm93c2VyJyk7XG5cbnZhciBfcmVjb3JkTW9kZSA9IHJlcXVpcmUoJy4vcmVjb3JkLW1vZGUnKTtcblxuZnVuY3Rpb24gX2NsYXNzQ2FsbENoZWNrKGluc3RhbmNlLCBDb25zdHJ1Y3RvcikgeyBpZiAoIShpbnN0YW5jZSBpbnN0YW5jZW9mIENvbnN0cnVjdG9yKSkgeyB0aHJvdyBuZXcgVHlwZUVycm9yKFwiQ2Fubm90IGNhbGwgYSBjbGFzcyBhcyBhIGZ1bmN0aW9uXCIpOyB9IH1cblxuZnVuY3Rpb24gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4oc2VsZiwgY2FsbCkgeyBpZiAoIXNlbGYpIHsgdGhyb3cgbmV3IFJlZmVyZW5jZUVycm9yKFwidGhpcyBoYXNuJ3QgYmVlbiBpbml0aWFsaXNlZCAtIHN1cGVyKCkgaGFzbid0IGJlZW4gY2FsbGVkXCIpOyB9IHJldHVybiBjYWxsICYmICh0eXBlb2YgY2FsbCA9PT0gXCJvYmplY3RcIiB8fCB0eXBlb2YgY2FsbCA9PT0gXCJmdW5jdGlvblwiKSA/IGNhbGwgOiBzZWxmOyB9XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykgeyBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJTdXBlciBleHByZXNzaW9uIG11c3QgZWl0aGVyIGJlIG51bGwgb3IgYSBmdW5jdGlvbiwgbm90IFwiICsgdHlwZW9mIHN1cGVyQ2xhc3MpOyB9IHN1YkNsYXNzLnByb3RvdHlwZSA9IE9iamVjdC5jcmVhdGUoc3VwZXJDbGFzcyAmJiBzdXBlckNsYXNzLnByb3RvdHlwZSwgeyBjb25zdHJ1Y3RvcjogeyB2YWx1ZTogc3ViQ2xhc3MsIGVudW1lcmFibGU6IGZhbHNlLCB3cml0YWJsZTogdHJ1ZSwgY29uZmlndXJhYmxlOiB0cnVlIH0gfSk7IGlmIChzdXBlckNsYXNzKSBPYmplY3Quc2V0UHJvdG90eXBlT2YgPyBPYmplY3Quc2V0UHJvdG90eXBlT2Yoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpIDogc3ViQ2xhc3MuX19wcm90b19fID0gc3VwZXJDbGFzczsgfSAvKipcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICogQGZpbGUgcmVjb3JkLXJ0Yy5qc1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgKiBAc2luY2UgMi4wLjBcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICovXG5cbnZhciBDb21wb25lbnQgPSB2aWRlb2pzLmdldENvbXBvbmVudCgnQ29tcG9uZW50Jyk7XG5cbi8qKlxyXG4gKiBFbmdpbmUgdXNlZCB3aXRoIHRoZSBNUmVjb3JkUlRDIGNsYXNzIGluIHRoZSBSZWNvcmRSVEMgbGlicmFyeS5cclxuICpcclxuICogQGNsYXNzXHJcbiAqIEBhdWdtZW50cyB2aWRlb2pzLlJlY29yZEVuZ2luZVxyXG4gKi9cblxudmFyIFJlY29yZFJUQ0VuZ2luZSA9IGZ1bmN0aW9uIChfUmVjb3JkRW5naW5lKSB7XG4gICAgX2luaGVyaXRzKFJlY29yZFJUQ0VuZ2luZSwgX1JlY29yZEVuZ2luZSk7XG5cbiAgICBmdW5jdGlvbiBSZWNvcmRSVENFbmdpbmUoKSB7XG4gICAgICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBSZWNvcmRSVENFbmdpbmUpO1xuXG4gICAgICAgIHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCAoUmVjb3JkUlRDRW5naW5lLl9fcHJvdG9fXyB8fCBPYmplY3QuZ2V0UHJvdG90eXBlT2YoUmVjb3JkUlRDRW5naW5lKSkuYXBwbHkodGhpcywgYXJndW1lbnRzKSk7XG4gICAgfVxuXG4gICAgX2NyZWF0ZUNsYXNzKFJlY29yZFJUQ0VuZ2luZSwgW3tcbiAgICAgICAga2V5OiAnc2V0dXAnLFxuXG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogU2V0dXAgcmVjb3JkaW5nIGVuZ2luZS5cclxuICAgICAgICAgKi9cbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIHNldHVwKHN0cmVhbSwgbWVkaWFUeXBlLCBkZWJ1Zykge1xuICAgICAgICAgICAgdGhpcy5pbnB1dFN0cmVhbSA9IHN0cmVhbTtcbiAgICAgICAgICAgIHRoaXMubWVkaWFUeXBlID0gbWVkaWFUeXBlO1xuICAgICAgICAgICAgdGhpcy5kZWJ1ZyA9IGRlYnVnO1xuXG4gICAgICAgICAgICAvLyBzZXR1cCBSZWNvcmRSVENcbiAgICAgICAgICAgIHRoaXMuZW5naW5lID0gbmV3IFJlY29yZFJUQy5NUmVjb3JkUlRDKCk7XG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5tZWRpYVR5cGUgPSB0aGlzLm1lZGlhVHlwZTtcbiAgICAgICAgICAgIHRoaXMuZW5naW5lLmRpc2FibGVMb2dzID0gIXRoaXMuZGVidWc7XG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5taW1lVHlwZSA9IHRoaXMubWltZVR5cGU7XG5cbiAgICAgICAgICAgIC8vIGF1ZGlvIHNldHRpbmdzXG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5idWZmZXJTaXplID0gdGhpcy5idWZmZXJTaXplO1xuICAgICAgICAgICAgdGhpcy5lbmdpbmUuc2FtcGxlUmF0ZSA9IHRoaXMuc2FtcGxlUmF0ZTtcbiAgICAgICAgICAgIHRoaXMuZW5naW5lLm51bWJlck9mQXVkaW9DaGFubmVscyA9IHRoaXMuYXVkaW9DaGFubmVscztcblxuICAgICAgICAgICAgLy8gdmlkZW8vY2FudmFzIHNldHRpbmdzXG4gICAgICAgICAgICB0aGlzLmVuZ2luZS52aWRlbyA9IHRoaXMudmlkZW87XG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5jYW52YXMgPSB0aGlzLmNhbnZhcztcblxuICAgICAgICAgICAgLy8gYW5pbWF0ZWQgZ2lmIHNldHRpbmdzXG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5xdWFsaXR5ID0gdGhpcy5xdWFsaXR5O1xuICAgICAgICAgICAgdGhpcy5lbmdpbmUuZnJhbWVSYXRlID0gdGhpcy5mcmFtZVJhdGU7XG4gICAgICAgICAgICBpZiAodGhpcy5vblRpbWVTdGFtcCAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5lbmdpbmUudGltZVNsaWNlID0gdGhpcy50aW1lU2xpY2U7XG4gICAgICAgICAgICAgICAgdGhpcy5lbmdpbmUub25UaW1lU3RhbXAgPSB0aGlzLm9uVGltZVN0YW1wO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAvLyBjb25uZWN0IHN0cmVhbSB0byByZWNvcmRpbmcgZW5naW5lXG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5hZGRTdHJlYW0odGhpcy5pbnB1dFN0cmVhbSk7XG4gICAgICAgIH1cblxuICAgICAgICAvKipcclxuICAgICAgICAgKiBSZW1vdmUgYW55IHRlbXBvcmFyeSBkYXRhIGFuZCByZWZlcmVuY2VzIHRvIHN0cmVhbXMuXHJcbiAgICAgICAgICovXG5cbiAgICB9LCB7XG4gICAgICAgIGtleTogJ2Rpc3Bvc2UnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gZGlzcG9zZSgpIHtcbiAgICAgICAgICAgIF9nZXQoUmVjb3JkUlRDRW5naW5lLnByb3RvdHlwZS5fX3Byb3RvX18gfHwgT2JqZWN0LmdldFByb3RvdHlwZU9mKFJlY29yZFJUQ0VuZ2luZS5wcm90b3R5cGUpLCAnZGlzcG9zZScsIHRoaXMpLmNhbGwodGhpcyk7XG5cbiAgICAgICAgICAgIGlmICh0eXBlb2YgdGhpcy5lbmdpbmUuZGVzdHJveSA9PT0gJ2Z1bmN0aW9uJykge1xuICAgICAgICAgICAgICAgIHRoaXMuZW5naW5lLmRlc3Ryb3koKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIFN0YXJ0IHJlY29yZGluZy5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnc3RhcnQnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gc3RhcnQoKSB7XG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5zdGFydFJlY29yZGluZygpO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogU3RvcCByZWNvcmRpbmcuIFJlc3VsdCB3aWxsIGJlIGF2YWlsYWJsZSBhc3luYyB3aGVuIG9uU3RvcFJlY29yZGluZ1xyXG4gICAgICAgICAqIGlzIGNhbGxlZC5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAnc3RvcCcsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBzdG9wKCkge1xuICAgICAgICAgICAgdGhpcy5lbmdpbmUuc3RvcFJlY29yZGluZyh0aGlzLm9uU3RvcFJlY29yZGluZy5iaW5kKHRoaXMpKTtcbiAgICAgICAgfVxuXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIFBhdXNlIHJlY29yZGluZy5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAncGF1c2UnLFxuICAgICAgICB2YWx1ZTogZnVuY3Rpb24gcGF1c2UoKSB7XG4gICAgICAgICAgICB0aGlzLmVuZ2luZS5wYXVzZVJlY29yZGluZygpO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogUmVzdW1lIHJlY29yZGluZy5cclxuICAgICAgICAgKi9cblxuICAgIH0sIHtcbiAgICAgICAga2V5OiAncmVzdW1lJyxcbiAgICAgICAgdmFsdWU6IGZ1bmN0aW9uIHJlc3VtZSgpIHtcbiAgICAgICAgICAgIHRoaXMuZW5naW5lLnJlc3VtZVJlY29yZGluZygpO1xuICAgICAgICB9XG5cbiAgICAgICAgLyoqXHJcbiAgICAgICAgICogU2hvdyBzYXZlIGFzIGRpYWxvZyBpbiBicm93c2VyIHNvIHRoZSB1c2VyIGNhbiBzdG9yZSB0aGUgcmVjb3JkZWQgbWVkaWFcclxuICAgICAgICAgKiBsb2NhbGx5LlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQHBhcmFtIHtvYmplY3R9IG5hbWUgLSBPYmplY3Qgd2l0aCBuYW1lcyBmb3IgdGhlIHBhcnRpY3VsYXIgYmxvYihzKVxyXG4gICAgICAgICAqICAgICB5b3Ugd2FudCB0byBzYXZlLiBGaWxlIGV4dGVuc2lvbnMgYXJlIGFkZGVkIGF1dG9tYXRpY2FsbHkuIEZvclxyXG4gICAgICAgICAqICAgICBleGFtcGxlOiB7J3ZpZGVvJzogJ25hbWUtb2YtdmlkZW8tZmlsZSd9LiBTdXBwb3J0ZWQga2V5cyBhcmVcclxuICAgICAgICAgKiAgICAgJ2F1ZGlvJywgJ3ZpZGVvJyBhbmQgJ2dpZicuXHJcbiAgICAgICAgICovXG5cbiAgICB9LCB7XG4gICAgICAgIGtleTogJ3NhdmVBcycsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBzYXZlQXMobmFtZSkge1xuICAgICAgICAgICAgaWYgKHRoaXMuZW5naW5lICYmIG5hbWUgIT09IHVuZGVmaW5lZCkge1xuICAgICAgICAgICAgICAgIHRoaXMuZW5naW5lLnNhdmUobmFtZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICAvKipcclxuICAgICAgICAgKiBJbnZva2VkIHdoZW4gcmVjb3JkaW5nIGlzIHN0b3BwZWQgYW5kIHJlc3VsdGluZyBzdHJlYW0gaXMgYXZhaWxhYmxlLlxyXG4gICAgICAgICAqXHJcbiAgICAgICAgICogQHByaXZhdGVcclxuICAgICAgICAgKiBAcGFyYW0ge3N0cmluZ30gYXVkaW9WaWRlb1VSTCAtIFJlZmVyZW5jZSB0byB0aGUgcmVjb3JkZWQgQmxvYlxyXG4gICAgICAgICAqICAgICBvYmplY3QsIGUuZy4gJ2Jsb2I6aHR0cDovL2xvY2FsaG9zdDo4MDgwLzEwMTAwMDE2LTQyNDgtOTk0OS1iMGQ2LTBiYjQwZGI1NmViYSdcclxuICAgICAgICAgKiBAcGFyYW0ge3N0cmluZ30gdHlwZSAtIE1lZGlhIHR5cGUsIGVnLiAndmlkZW8nIG9yICdhdWRpbycuXHJcbiAgICAgICAgICovXG5cbiAgICB9LCB7XG4gICAgICAgIGtleTogJ29uU3RvcFJlY29yZGluZycsXG4gICAgICAgIHZhbHVlOiBmdW5jdGlvbiBvblN0b3BSZWNvcmRpbmcoYXVkaW9WaWRlb1VSTCwgdHlwZSkge1xuICAgICAgICAgICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICAgICAgICAgIC8vIHN0b3JlIHJlZmVyZW5jZSB0byByZWNvcmRlZCBzdHJlYW0gVVJMXG4gICAgICAgICAgICB0aGlzLm1lZGlhVVJMID0gYXVkaW9WaWRlb1VSTDtcblxuICAgICAgICAgICAgLy8gc3RvcmUgcmVmZXJlbmNlIHRvIHJlY29yZGVkIHN0cmVhbSBkYXRhXG4gICAgICAgICAgICB2YXIgcmVjb3JkVHlwZSA9IHRoaXMucGxheWVyKCkucmVjb3JkKCkuZ2V0UmVjb3JkVHlwZSgpO1xuICAgICAgICAgICAgdGhpcy5lbmdpbmUuZ2V0QmxvYihmdW5jdGlvbiAocmVjb3JkaW5nKSB7XG4gICAgICAgICAgICAgICAgc3dpdGNoIChyZWNvcmRUeXBlKSB7XG4gICAgICAgICAgICAgICAgICAgIGNhc2UgX3JlY29yZE1vZGUuQVVESU9fT05MWTpcbiAgICAgICAgICAgICAgICAgICAgICAgIF90aGlzMi5yZWNvcmRlZERhdGEgPSByZWNvcmRpbmcuYXVkaW87XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIF90aGlzMi5hZGRGaWxlSW5mbyhfdGhpczIucmVjb3JkZWREYXRhKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gbm90aWZ5IGxpc3RlbmVyc1xuICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLnRyaWdnZXIoJ3JlY29yZENvbXBsZXRlJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgICAgICAgICBjYXNlIF9yZWNvcmRNb2RlLlZJREVPX09OTFk6XG4gICAgICAgICAgICAgICAgICAgIGNhc2UgX3JlY29yZE1vZGUuQVVESU9fVklERU86XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyB3aGVuIHJlY29yZGluZyBib3RoIGF1ZGlvIGFuZCB2aWRlbywgcmVjb3JkcnRjXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBjYWxscyB0aGlzIHR3aWNlIG9uIGNocm9tZSwgZmlyc3Qgd2l0aCBhdWRpbyBkYXRhXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBhbmQgdGhlbiB3aXRoIHZpZGVvIGRhdGEuXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBvbiBmaXJlZm94IGl0J3MgY2FsbGVkIG9uY2UgYnV0IHdpdGggYSBzaW5nbGVcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGJsb2IgdGhhdCBpbmNsdWRlcyBib3RoIGF1ZGlvIGFuZCB2aWRlbyBkYXRhLlxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHJlY29yZGluZy52aWRlbyAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gZGF0YSBpcyB2aWRlby1vbmx5IGJ1dCBvbiBmaXJlZm94IGF1ZGlvK3ZpZGVvXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLnJlY29yZGVkRGF0YSA9IHJlY29yZGluZy52aWRlbztcblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIG9uIHRoZSBjaHJvbWUgYnJvd3NlciB0d28gYmxvYnMgYXJlIGNyZWF0ZWRcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBjb250YWluaW5nIHRoZSBzZXBhcmF0ZSBhdWRpby92aWRlbyBzdHJlYW1zLlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZWNvcmRUeXBlID09PSBfcmVjb3JkTW9kZS5BVURJT19WSURFTyAmJiAoMCwgX2RldGVjdEJyb3dzZXIuaXNDaHJvbWUpKCkpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gc3RvcmUgYm90aCBhdWRpbyBhbmQgdmlkZW9cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLnJlY29yZGVkRGF0YSA9IHJlY29yZGluZztcblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb3IgKHZhciBtdHlwZSBpbiBfdGhpczIucmVjb3JkZWREYXRhKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBfdGhpczIuYWRkRmlsZUluZm8oX3RoaXMyLnJlY29yZGVkRGF0YVttdHlwZV0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLmFkZEZpbGVJbmZvKF90aGlzMi5yZWNvcmRlZERhdGEpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIG5vdGlmeSBsaXN0ZW5lcnNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBfdGhpczIudHJpZ2dlcigncmVjb3JkQ29tcGxldGUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICAgICAgICAgIGNhc2UgX3JlY29yZE1vZGUuQU5JTUFUSU9OOlxuICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLnJlY29yZGVkRGF0YSA9IHJlY29yZGluZy5naWY7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIF90aGlzMi5hZGRGaWxlSW5mbyhfdGhpczIucmVjb3JkZWREYXRhKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gbm90aWZ5IGxpc3RlbmVyc1xuICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMyLnRyaWdnZXIoJ3JlY29yZENvbXBsZXRlJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH1dKTtcblxuICAgIHJldHVybiBSZWNvcmRSVENFbmdpbmU7XG59KF9yZWNvcmRFbmdpbmUuUmVjb3JkRW5naW5lKTtcblxuLy8gZXhwb3NlIHBsdWdpblxuXG5cbnZpZGVvanMuUmVjb3JkUlRDRW5naW5lID0gUmVjb3JkUlRDRW5naW5lO1xuXG5Db21wb25lbnQucmVnaXN0ZXJDb21wb25lbnQoJ1JlY29yZFJUQ0VuZ2luZScsIFJlY29yZFJUQ0VuZ2luZSk7XG5cbmV4cG9ydHMuZGVmYXVsdCA9IFJlY29yZFJUQ0VuZ2luZTsiLCIndXNlIHN0cmljdCc7XG5cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBcIl9fZXNNb2R1bGVcIiwge1xuICAgIHZhbHVlOiB0cnVlXG59KTtcbi8qKlxyXG4gKiBAZmlsZSBicm93c2VyLXNoaW0uanNcclxuICogQHNpbmNlIDIuMC4wXHJcbiAqL1xuXG52YXIgc2V0U3JjT2JqZWN0ID0gZnVuY3Rpb24gc2V0U3JjT2JqZWN0KHN0cmVhbSwgZWxlbWVudCwgaWdub3JlQ3JlYXRlT2JqZWN0VVJMKSB7XG4gICAgaWYgKCdjcmVhdGVPYmplY3RVUkwnIGluIFVSTCAmJiAhaWdub3JlQ3JlYXRlT2JqZWN0VVJMKSB7XG4gICAgICAgIHRyeSB7XG4gICAgICAgICAgICBlbGVtZW50LnNyYyA9IFVSTC5jcmVhdGVPYmplY3RVUkwoc3RyZWFtKTtcbiAgICAgICAgfSBjYXRjaCAoZSkge1xuICAgICAgICAgICAgc2V0U3JjT2JqZWN0KHN0cmVhbSwgZWxlbWVudCwgdHJ1ZSk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICB9IGVsc2UgaWYgKCdzcmNPYmplY3QnIGluIGVsZW1lbnQpIHtcbiAgICAgICAgZWxlbWVudC5zcmNPYmplY3QgPSBzdHJlYW07XG4gICAgfSBlbHNlIGlmICgnbW96U3JjT2JqZWN0JyBpbiBlbGVtZW50KSB7XG4gICAgICAgIGVsZW1lbnQubW96U3JjT2JqZWN0ID0gc3RyZWFtO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIGNvbnNvbGUubG9nKCdjcmVhdGVPYmplY3RVUkwvc3JjT2JqZWN0IGJvdGggYXJlIG5vdCBzdXBwb3J0ZWQuJyk7XG4gICAgfVxufTtcblxuZXhwb3J0cy5kZWZhdWx0ID0gc2V0U3JjT2JqZWN0OyIsIid1c2Ugc3RyaWN0JztcblxuT2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFwiX19lc01vZHVsZVwiLCB7XG4gICAgdmFsdWU6IHRydWVcbn0pO1xuZXhwb3J0cy5pc1NhZmFyaSA9IGV4cG9ydHMuaXNDaHJvbWUgPSBleHBvcnRzLmlzT3BlcmEgPSBleHBvcnRzLmlzRWRnZSA9IGV4cG9ydHMuZGV0ZWN0QnJvd3NlciA9IHVuZGVmaW5lZDtcblxudmFyIF93aW5kb3cgPSByZXF1aXJlKCdnbG9iYWwvd2luZG93Jyk7XG5cbnZhciBfd2luZG93MiA9IF9pbnRlcm9wUmVxdWlyZURlZmF1bHQoX3dpbmRvdyk7XG5cbmZ1bmN0aW9uIF9pbnRlcm9wUmVxdWlyZURlZmF1bHQob2JqKSB7IHJldHVybiBvYmogJiYgb2JqLl9fZXNNb2R1bGUgPyBvYmogOiB7IGRlZmF1bHQ6IG9iaiB9OyB9XG5cbi8qKlxyXG4gKiBCcm93c2VyIGRldGVjdG9yLlxyXG4gKlxyXG4gKiBAcHJpdmF0ZVxyXG4gKiBAcmV0dXJuIHtvYmplY3R9IHJlc3VsdCBjb250YWluaW5nIGJyb3dzZXIsIHZlcnNpb24gYW5kIG1pblZlcnNpb25cclxuICogICAgIHByb3BlcnRpZXMuXHJcbiAqL1xudmFyIGRldGVjdEJyb3dzZXIgPSBmdW5jdGlvbiBkZXRlY3RCcm93c2VyKCkge1xuICAgIC8vIHJldHVybmVkIHJlc3VsdCBvYmplY3RcbiAgICB2YXIgcmVzdWx0ID0ge307XG4gICAgcmVzdWx0LmJyb3dzZXIgPSBudWxsO1xuICAgIHJlc3VsdC52ZXJzaW9uID0gbnVsbDtcbiAgICByZXN1bHQubWluVmVyc2lvbiA9IG51bGw7XG5cbiAgICAvLyBmYWlsIGVhcmx5IGlmIGl0J3Mgbm90IGEgYnJvd3NlclxuICAgIGlmICh0eXBlb2YgX3dpbmRvdzIuZGVmYXVsdCA9PT0gJ3VuZGVmaW5lZCcgfHwgIV93aW5kb3cyLmRlZmF1bHQubmF2aWdhdG9yKSB7XG4gICAgICAgIHJlc3VsdC5icm93c2VyID0gJ05vdCBhIHN1cHBvcnRlZCBicm93c2VyLic7XG4gICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgfVxuXG4gICAgLy8gRmlyZWZveFxuICAgIGlmIChuYXZpZ2F0b3IubW96R2V0VXNlck1lZGlhKSB7XG4gICAgICAgIHJlc3VsdC5icm93c2VyID0gJ2ZpcmVmb3gnO1xuICAgICAgICByZXN1bHQudmVyc2lvbiA9IGV4dHJhY3RWZXJzaW9uKG5hdmlnYXRvci51c2VyQWdlbnQsIC9GaXJlZm94XFwvKFxcZCspXFwuLywgMSk7XG4gICAgICAgIHJlc3VsdC5taW5WZXJzaW9uID0gMzE7XG4gICAgfSBlbHNlIGlmIChuYXZpZ2F0b3Iud2Via2l0R2V0VXNlck1lZGlhKSB7XG4gICAgICAgIC8vIENocm9tZSwgQ2hyb21pdW0sIFdlYnZpZXcsIE9wZXJhXG4gICAgICAgIGlmIChfd2luZG93Mi5kZWZhdWx0LndlYmtpdFJUQ1BlZXJDb25uZWN0aW9uKSB7XG4gICAgICAgICAgICByZXN1bHQuYnJvd3NlciA9ICdjaHJvbWUnO1xuICAgICAgICAgICAgcmVzdWx0LnZlcnNpb24gPSBleHRyYWN0VmVyc2lvbihuYXZpZ2F0b3IudXNlckFnZW50LCAvQ2hyb20oZXxpdW0pXFwvKFxcZCspXFwuLywgMik7XG4gICAgICAgICAgICByZXN1bHQubWluVmVyc2lvbiA9IDM4O1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgLy8gU2FmYXJpIChpbiBhbiB1bnB1Ymxpc2hlZCB2ZXJzaW9uKSBvciB1bmtub3duIHdlYmtpdC1iYXNlZC5cbiAgICAgICAgICAgIGlmIChuYXZpZ2F0b3IudXNlckFnZW50Lm1hdGNoKC9WZXJzaW9uXFwvKFxcZCspLihcXGQrKS8pKSB7XG4gICAgICAgICAgICAgICAgcmVzdWx0LmJyb3dzZXIgPSAnc2FmYXJpJztcbiAgICAgICAgICAgICAgICByZXN1bHQudmVyc2lvbiA9IGV4dHJhY3RWZXJzaW9uKG5hdmlnYXRvci51c2VyQWdlbnQsIC9BcHBsZVdlYktpdFxcLyhcXGQrKVxcLi8sIDEpO1xuICAgICAgICAgICAgICAgIHJlc3VsdC5taW5WZXJzaW9uID0gMTE7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIC8vIHVua25vd24gd2Via2l0LWJhc2VkIGJyb3dzZXIuXG4gICAgICAgICAgICAgICAgcmVzdWx0LmJyb3dzZXIgPSAnVW5zdXBwb3J0ZWQgd2Via2l0LWJhc2VkIGJyb3dzZXIgJyArICd3aXRoIEdVTSBzdXBwb3J0IGJ1dCBubyBXZWJSVEMgc3VwcG9ydC4nO1xuICAgICAgICAgICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgLy8gRWRnZVxuICAgIH0gZWxzZSBpZiAobmF2aWdhdG9yLm1lZGlhRGV2aWNlcyAmJiBuYXZpZ2F0b3IudXNlckFnZW50Lm1hdGNoKC9FZGdlXFwvKFxcZCspLihcXGQrKSQvKSkge1xuICAgICAgICByZXN1bHQuYnJvd3NlciA9ICdlZGdlJztcbiAgICAgICAgcmVzdWx0LnZlcnNpb24gPSBleHRyYWN0VmVyc2lvbihuYXZpZ2F0b3IudXNlckFnZW50LCAvRWRnZVxcLyhcXGQrKS4oXFxkKykkLywgMik7XG4gICAgICAgIHJlc3VsdC5taW5WZXJzaW9uID0gMTA1NDc7XG4gICAgfSBlbHNlIGlmIChuYXZpZ2F0b3IubWVkaWFEZXZpY2VzICYmIG5hdmlnYXRvci51c2VyQWdlbnQubWF0Y2goL0FwcGxlV2ViS2l0XFwvKFxcZCspXFwuLykpIHtcbiAgICAgICAgLy8gU2FmYXJpLCB3aXRoIHdlYmtpdEdldFVzZXJNZWRpYSByZW1vdmVkLlxuICAgICAgICByZXN1bHQuYnJvd3NlciA9ICdzYWZhcmknO1xuICAgICAgICByZXN1bHQudmVyc2lvbiA9IGV4dHJhY3RWZXJzaW9uKG5hdmlnYXRvci51c2VyQWdlbnQsIC9BcHBsZVdlYktpdFxcLyhcXGQrKVxcLi8sIDEpO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIC8vIGRlZmF1bHQgZmFsbHRocm91Z2g6IG5vdCBzdXBwb3J0ZWQuXG4gICAgICAgIHJlc3VsdC5icm93c2VyID0gJ05vdCBhIHN1cHBvcnRlZCBicm93c2VyLic7XG4gICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgfVxuXG4gICAgcmV0dXJuIHJlc3VsdDtcbn07XG5cbi8qKlxyXG4gKiBFeHRyYWN0IGJyb3dzZXIgdmVyc2lvbiBvdXQgb2YgdGhlIHByb3ZpZGVkIHVzZXIgYWdlbnQgc3RyaW5nLlxyXG4gKlxyXG4gKiBAcHJpdmF0ZVxyXG4gKiBAcGFyYW0geyFzdHJpbmd9IHVhc3RyaW5nIC0gdXNlckFnZW50IHN0cmluZy5cclxuICogQHBhcmFtIHshc3RyaW5nfSBleHByIC0gUmVndWxhciBleHByZXNzaW9uIHVzZWQgYXMgbWF0Y2ggY3JpdGVyaWEuXHJcbiAqIEBwYXJhbSB7IW51bWJlcn0gcG9zIC0gcG9zaXRpb24gaW4gdGhlIHZlcnNpb24gc3RyaW5nIHRvIGJlXHJcbiAqICAgICByZXR1cm5lZC5cclxuICogQHJldHVybiB7IW51bWJlcn0gYnJvd3NlciB2ZXJzaW9uLlxyXG4gKi9cbi8qKlxyXG4gKiBAZmlsZSBkZXRlY3QtYnJvd3Nlci5qc1xyXG4gKiBAc2luY2UgMi4wLjBcclxuICovXG5cbnZhciBleHRyYWN0VmVyc2lvbiA9IGZ1bmN0aW9uIGV4dHJhY3RWZXJzaW9uKHVhc3RyaW5nLCBleHByLCBwb3MpIHtcbiAgICB2YXIgbWF0Y2ggPSB1YXN0cmluZy5tYXRjaChleHByKTtcbiAgICByZXR1cm4gbWF0Y2ggJiYgbWF0Y2gubGVuZ3RoID49IHBvcyAmJiBwYXJzZUludChtYXRjaFtwb3NdLCAxMCk7XG59O1xuXG52YXIgaXNFZGdlID0gZnVuY3Rpb24gaXNFZGdlKCkge1xuICAgIHJldHVybiBkZXRlY3RCcm93c2VyKCkuYnJvd3NlciA9PT0gJ2VkZ2UnO1xufTtcblxudmFyIGlzU2FmYXJpID0gZnVuY3Rpb24gaXNTYWZhcmkoKSB7XG4gICAgcmV0dXJuIGRldGVjdEJyb3dzZXIoKS5icm93c2VyID09PSAnc2FmYXJpJztcbn07XG5cbnZhciBpc09wZXJhID0gZnVuY3Rpb24gaXNPcGVyYSgpIHtcbiAgICByZXR1cm4gISFfd2luZG93Mi5kZWZhdWx0Lm9wZXJhIHx8IG5hdmlnYXRvci51c2VyQWdlbnQuaW5kZXhPZignT1BSLycpICE9PSAtMTtcbn07XG5cbnZhciBpc0Nocm9tZSA9IGZ1bmN0aW9uIGlzQ2hyb21lKCkge1xuICAgIHJldHVybiBkZXRlY3RCcm93c2VyKCkuYnJvd3NlciA9PT0gJ2Nocm9tZSc7XG59O1xuXG5leHBvcnRzLmRldGVjdEJyb3dzZXIgPSBkZXRlY3RCcm93c2VyO1xuZXhwb3J0cy5pc0VkZ2UgPSBpc0VkZ2U7XG5leHBvcnRzLmlzT3BlcmEgPSBpc09wZXJhO1xuZXhwb3J0cy5pc0Nocm9tZSA9IGlzQ2hyb21lO1xuZXhwb3J0cy5pc1NhZmFyaSA9IGlzU2FmYXJpOyIsIid1c2Ugc3RyaWN0JztcblxuT2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFwiX19lc01vZHVsZVwiLCB7XG4gICAgdmFsdWU6IHRydWVcbn0pO1xuLyoqXHJcbiAqIEBmaWxlIGZvcm1hdC10aW1lLmpzXHJcbiAqIEBzaW5jZSAyLjAuMFxyXG4gKi9cblxuLyoqXHJcbiAqIEZvcm1hdCBzZWNvbmRzIGFzIGEgdGltZSBzdHJpbmcsIEg6TU06U1MsIE06U1Mgb3IgTTpTUzpNTU0uXHJcbiAqXHJcbiAqIFN1cHBseWluZyBhIGd1aWRlIChpbiBzZWNvbmRzKSB3aWxsIGZvcmNlIGEgbnVtYmVyIG9mIGxlYWRpbmcgemVyb3NcclxuICogdG8gY292ZXIgdGhlIGxlbmd0aCBvZiB0aGUgZ3VpZGUuXHJcbiAqXHJcbiAqIEBwYXJhbSB7bnVtYmVyfSBzZWNvbmRzIC0gTnVtYmVyIG9mIHNlY29uZHMgdG8gYmUgdHVybmVkIGludG8gYVxyXG4gKiAgICAgc3RyaW5nLlxyXG4gKiBAcGFyYW0ge251bWJlcn0gZ3VpZGUgLSBOdW1iZXIgKGluIHNlY29uZHMpIHRvIG1vZGVsIHRoZSBzdHJpbmdcclxuICogICAgIGFmdGVyLlxyXG4gKiBAcGFyYW0ge251bWJlcn0gbXNEaXNwbGF5TWF4IC0gTnVtYmVyIChpbiBtaWxsaXNlY29uZHMpIHRvIG1vZGVsIHRoZSBzdHJpbmdcclxuICogICAgIGFmdGVyLlxyXG4gKiBAcmV0dXJuIHtzdHJpbmd9IFRpbWUgZm9ybWF0dGVkIGFzIEg6TU06U1MsIE06U1Mgb3IgTTpTUzpNTU0sIGUuZy5cclxuICogICAgIDA6MDA6MTIuXHJcbiAqIEBwcml2YXRlXHJcbiAqL1xudmFyIGZvcm1hdFRpbWUgPSBmdW5jdGlvbiBmb3JtYXRUaW1lKHNlY29uZHMsIGd1aWRlLCBtc0Rpc3BsYXlNYXgpIHtcbiAgICAvLyBEZWZhdWx0IHRvIHVzaW5nIHNlY29uZHMgYXMgZ3VpZGVcbiAgICBzZWNvbmRzID0gc2Vjb25kcyA8IDAgPyAwIDogc2Vjb25kcztcbiAgICBndWlkZSA9IGd1aWRlIHx8IHNlY29uZHM7XG4gICAgdmFyIHMgPSBNYXRoLmZsb29yKHNlY29uZHMgJSA2MCksXG4gICAgICAgIG0gPSBNYXRoLmZsb29yKHNlY29uZHMgLyA2MCAlIDYwKSxcbiAgICAgICAgaCA9IE1hdGguZmxvb3Ioc2Vjb25kcyAvIDM2MDApLFxuICAgICAgICBnbSA9IE1hdGguZmxvb3IoZ3VpZGUgLyA2MCAlIDYwKSxcbiAgICAgICAgZ2ggPSBNYXRoLmZsb29yKGd1aWRlIC8gMzYwMCksXG4gICAgICAgIG1zID0gTWF0aC5mbG9vcigoc2Vjb25kcyAtIHMpICogMTAwMCk7XG5cbiAgICAvLyBoYW5kbGUgaW52YWxpZCB0aW1lc1xuICAgIGlmIChpc05hTihzZWNvbmRzKSB8fCBzZWNvbmRzID09PSBJbmZpbml0eSkge1xuICAgICAgICAvLyAnLScgaXMgZmFsc2UgZm9yIGFsbCByZWxhdGlvbmFsIG9wZXJhdG9ycyAoZS5nLiA8LCA+PSkgc28gdGhpc1xuICAgICAgICAvLyBzZXR0aW5nIHdpbGwgYWRkIHRoZSBtaW5pbXVtIG51bWJlciBvZiBmaWVsZHMgc3BlY2lmaWVkIGJ5IHRoZVxuICAgICAgICAvLyBndWlkZVxuICAgICAgICBoID0gbSA9IHMgPSBtcyA9ICctJztcbiAgICB9XG5cbiAgICAvLyBDaGVjayBpZiB3ZSBuZWVkIHRvIHNob3cgbWlsbGlzZWNvbmRzXG4gICAgaWYgKGd1aWRlID4gMCAmJiBndWlkZSA8IG1zRGlzcGxheU1heCkge1xuICAgICAgICBpZiAobXMgPCAxMDApIHtcbiAgICAgICAgICAgIGlmIChtcyA8IDEwKSB7XG4gICAgICAgICAgICAgICAgbXMgPSAnMDAnICsgbXM7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIG1zID0gJzAnICsgbXM7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgbXMgPSAnOicgKyBtcztcbiAgICB9IGVsc2Uge1xuICAgICAgICBtcyA9ICcnO1xuICAgIH1cblxuICAgIC8vIENoZWNrIGlmIHdlIG5lZWQgdG8gc2hvdyBob3Vyc1xuICAgIGggPSBoID4gMCB8fCBnaCA+IDAgPyBoICsgJzonIDogJyc7XG5cbiAgICAvLyBJZiBob3VycyBhcmUgc2hvd2luZywgd2UgbWF5IG5lZWQgdG8gYWRkIGEgbGVhZGluZyB6ZXJvLlxuICAgIC8vIEFsd2F5cyBzaG93IGF0IGxlYXN0IG9uZSBkaWdpdCBvZiBtaW51dGVzLlxuICAgIG0gPSAoKGggfHwgZ20gPj0gMTApICYmIG0gPCAxMCA/ICcwJyArIG0gOiBtKSArICc6JztcblxuICAgIC8vIENoZWNrIGlmIGxlYWRpbmcgemVybyBpcyBuZWVkIGZvciBzZWNvbmRzXG4gICAgcyA9IHMgPCAxMCA/ICcwJyArIHMgOiBzO1xuXG4gICAgcmV0dXJuIGggKyBtICsgcyArIG1zO1xufTtcblxuZXhwb3J0cy5kZWZhdWx0ID0gZm9ybWF0VGltZTsiLCJ2YXIgd2luO1xuXG5pZiAodHlwZW9mIHdpbmRvdyAhPT0gXCJ1bmRlZmluZWRcIikge1xuICAgIHdpbiA9IHdpbmRvdztcbn0gZWxzZSBpZiAodHlwZW9mIGdsb2JhbCAhPT0gXCJ1bmRlZmluZWRcIikge1xuICAgIHdpbiA9IGdsb2JhbDtcbn0gZWxzZSBpZiAodHlwZW9mIHNlbGYgIT09IFwidW5kZWZpbmVkXCIpe1xuICAgIHdpbiA9IHNlbGY7XG59IGVsc2Uge1xuICAgIHdpbiA9IHt9O1xufVxuXG5tb2R1bGUuZXhwb3J0cyA9IHdpbjtcbiJdfQ==
